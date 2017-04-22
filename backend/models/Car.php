<?php
/**
 * Created by PhpStorm.
 * User: Amaney-kht
 * Date: 24/03/2017
 * Time: 07:01 م
 */

namespace backend\models;

use backend\controllers\ViechleBrandController;
use common\helpers\Constants;
use common\models\User;
use common\models\FuelType;
use common\models\Transmission;
use common\models\PollutantClass;
use common\models\VehicleAge;
use common\models\LeasingType;
use common\models\RuntimeConfig;
use common\models\KilometerConfig;
use common\models\Company;
use Yii;

class Car extends \common\models\Car
{
    public $operation;

    public function rules()
    {
        return array_merge(parent::rules(),
            [
                [['operation'], 'safe']
            ]
        );
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $seller = User::find()->where(['id' => $this->seller_id])->one();
            $this->company_id = $seller->company_id;
        }
        if ($this->status == $this->getOldAttribute("status"))
            $this->status = Constants::CAR_STATUS_APPROVED;

        if ($this->operation == Constants::CAR_STATUS_DECLINED)
            $this->status = Constants::CAR_STATUS_DECLINED;
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            //Send API Request
        }
        if(! $this->wp_sent) {
            $url = "http://dev.leasingdeal.de/wp-json/crm/v1/car";
            $fuel_type = FuelType::findOne(['id' => $this->fuel_type_id]);
            $transmission = Transmission::findOne(['id' => $this->transmission_id]);
            $pollutant_class = PollutantClass::findOne(['id' => $this->pollutant_class_id]);
            $vehicle_age = VehicleAge::findOne(['id' => $this->vehicle_age_id]);
            $leasing_type = LeasingType::findOne(['id' => $this->leasing_type_id]);
            $run_time = RuntimeConfig::findOne(['id' => $this->runtime_id1]);
            $kilo_meter = KilometerConfig::findOne(['id' => $this->kilometer_id1]);
            $seller = User::findOne(['id' => $this->seller_id]);
            $company = Company::findOne(['id' => $seller->company_id]);
            $co2_emmission_komb = !empty($this->co2_emmission_komb)? 'kombiniert: '.$this->co2_emmission_komb : '';
            $consumption_in_town = !empty($this->consumption_in_town)? 'innerorts '.$this->consumption_in_town.' / ' : '';
            $consumption_outside = !empty($this->consumption_outside)? 'außerorts '.$this->consumption_outside.' / ' : '';

           // $total_consumption='Kraftstoffverbrauch, l/100 km: innerorts 6,6 / außerorts 4,7 / kombiniert 5,4, CO2-Emissionen g/km: kombiniert: {co2_komb} .';
            $total_consumption='Kraftstoffverbrauch, l/100 km: '.$consumption_in_town.' '.$consumption_outside.' '.floatval($this->consumption_in_town) + floatval($this->consumption_outside).' CO2-Emissionen g/km: '.$co2_emmission_komb.' .';
            $title = '';
            if (!is_null($company))
                $title .= $company->name . ' ';
            $title .= $this->model . ' ';
            if (!empty($this->equipment_line))
                $title .= ' | ' . $this->equipment_line;
            if (!empty($this->motorization))
                $title .= ' | ' . $this->motorization;
            $colors = [
                'farbe1' => $this->available_color1,
                'farbe2' => $this->available_color2,
                'farbe3' => $this->available_color3,
            ];
            $imagesDir = Yii::$app->params["uploadUrl"];

            $data = [
                'title' => $title,
                'content' => $this->description,
                'offer_for_business_customers' => $this->offer_for_business_customers,
                'offer_for_private_customers' => $this->offer_for_private_customers,
                'leistung' => $this->kw . ' kW / ' . $this->ps . ' PS',
                'verkufer' => $seller->first_name,
                'bild1' => $this->picture1 != null ? $imagesDir . $this->picture1 : null,
                'bild2' => $this->picture2 != null ? $imagesDir . $this->picture1 : null,
                'bild3' => $this->picture3 != null ? $imagesDir . $this->picture1 : null,
                'bild4' => $this->picture4 != null ? $imagesDir . $this->picture1 : null,
                'marke_modell' => $this->model,
                'ausstattungslinie' => $this->equipment_line,
                'kraftstoffart' => $fuel_type->name,
                'getriebe' => $transmission->name,
                'farbe' => $colors,
                'verbrauch_short' => $total_consumption,
                'co2_klasse' => !is_null($pollutant_class) ? $pollutant_class->name : null,
                'fahrzeugalter' => !is_null($vehicle_age) ? $vehicle_age->name : null,
                'leasingtyp' => !is_null($leasing_type) ? $leasing_type->name : null,
                'verfuegbarkeit' => $this->is_vehicle_in_stock,
                'wartung_verschleiss' => $this->maintenance_and_wear,
                'monatliche_leasingrate_1' => $this->lease_rate1,
                'laufleistung_1' => !is_null($kilo_meter) ? $kilo_meter->value : null,
                'laufzeit_1' => !is_null($run_time) ? $run_time->value : null,
                'anzahlung_1' => $this->down_payment1,
                'consumption_in_town' => $this->consumption_in_town,
                'consumption_outside' => $this->consumption_outside,
                'consumption' => floatval($this->consumption_in_town) + floatval($this->consumption_outside),

            ];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://dev.leasingdeal.de/wp-json/crm/v1/car",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/json",
                    "postman-token: 24c8e4c5-ea8a-e7f6-1965-4740a9fbfd3f"
                ),
            ));

            $response = curl_exec($curl);
            if(!empty($response)){
                $this->wp_sent = true;
                $this->save(false);
            }
           // $err = curl_error($curl);
            curl_close($curl);
        }

        parent::afterSave($insert, $changedAttributes);
    }
}