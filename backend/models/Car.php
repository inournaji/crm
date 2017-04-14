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
        if ($this->status == $this->oldAttributes["status"])
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
        $url = "http://dev.leasingdeal.de/wp-json/crm/v1/car";
       /* $data = [
            'verkufer' => 'verkufer',
            'aktiv' => 'aktiv',
            'marke_modell' => 'marke_modell',
            'ausstattungslinie' => 'ausstattungslinie',
            'erstzulassung' => 'erstzulassung',
            'leistung' => 'leistung',
            'kraftstoffart' => 'kraftstoffart',
            'getriebe' => 'getriebe',
            'farbe' => 'farbe',
            'verbrauch_short' => 'verbrauch_short',
            'verbrauch_short' => 'verbrauch_short',
            'fahrzeugalter' => 'fahrzeugalter',
            'kundengruppe' => 'kundengruppe',
            'leasingtyp' => 'leasingtyp',
            'listenpreis' => 'listenpreis',
            'verfuegbarkeit' => 'verfuegbarkeit',
            'lieferzeit_in_wochen' => 'lieferzeit_in_wochen',
            'ueberfhrungskosten_ab_werk' => 'ueberfhrungskosten_ab_werk',
            'ueberfhrungskosten_ab_autohaus' => 'ueberfhrungskosten_ab_autohaus',
            'wartung_verschleiss' => 'wartung_verschleiss',
            'monatliche_leasingrate_1' => 'monatliche_leasingrate_1',
            'mwst_1' => 'mwst_1',
            'laufleistung_1' => 'laufleistung_1',
            'laufzeit_1' => 'laufzeit_1',
            'anzahlung_1' => 'anzahlung_1'
        ];*/
       //             $data['erstzulassung'] = $request->get_param('erstzulassung'); // first reg date it should be date instead of time stamp
        //$data['leistung'] = $request->get_param('Ausstattungslinie');
        //             //$data['verbrauch_short'] = $request->get_param('verbrauch_short');
        //$data['Listenpreis'] = $request->get_param('Listenpreis'); // we should deal with this as currency
        //            $data['ueberfhrungskosten_ab_autohaus'] = $request->get_param('ueberfhrungskosten_ab_autohaus'); // we should deal with this as currency

        $fuel_type = FuelType::findOne(['id' => $this->fuel_type_id]);
        $transmission = Transmission::findOne(['id' => $this->transmission_id]);
        $pollutant_class = PollutantClass::findOne(['id'=> $this->pollutant_class_id]);
        $vehicle_age = VehicleAge::findOne(['id'=> $this->vehicle_age_id]);
        $leasing_type = LeasingType::findOne(['id'=> $this->leasing_type_id]);
        $run_time = RuntimeConfig::findOne(['id'=>$this->runtime_id1]);
        $kilo_meter = KilometerConfig::findOne(['id'=>$this->kilometer_id1]);
     //   $seller = User::findOne(['id'=> $this->getSeller()]);

        $data =[
            'title' => 'Car id: '.$this->id,
            'verkufer' => 'MK',
            'marke_modell' => $this->model,
            'Ausstattungslinie' => $this->equipment_line,
            'Kraftstoffart' => $fuel_type->name,
            'getriebe'=> $transmission->name,
            'farbe' => $this->available_color1,
            'co2_klasse' => $pollutant_class->name,
            'fahrzeugalter' => $vehicle_age->name,
            'leasingtyp' => $leasing_type->name,
            'verfuegbarkeit' => $this->is_vehicle_in_stock,
            'wartung_verschleiss' => $this->maintenance_and_wear,
            'monatliche_leasingrate_1' => $this->lease_rate1,
            'laufleistung_1' => $kilo_meter->value,
            'laufzeit_1' => $run_time->value,
            'anzahlung_1' => 0

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
        $err = curl_error($curl);
        curl_close($curl);

        parent::afterSave($insert, $changedAttributes);
    }
}