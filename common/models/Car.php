<?php

namespace common\models;

use common\helpers\Constants;
use common\helpers\GeneralHelper;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "car".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $seller_id
 * @property string $model
 * @property integer $vehicle_age_id
 * @property string $kw
 * @property string $ps
 * @property integer $transmission_id
 * @property integer $fuel_type_id
 * @property string $highlight1
 * @property string $highlight2
 * @property string $highlight3
 * @property string $highlight4
 * @property string $motorization
 * @property string $equipment_line
 * @property string $description
 * @property string $available_color1
 * @property string $available_color2
 * @property string $available_color3
 * @property integer $other_colors_available
 * @property string $color_interior
 * @property string $picture1
 * @property string $picture2
 * @property string $picture3
 * @property string $picture4
 * @property double $consumption_in_town
 * @property double $consumption_outside
 * @property double $consumption
 * @property double $co2_emmission_komb
 * @property integer $pollutant_class_id
 * @property string $jw_year
 * @property double $jw_kilometers
 * @property integer $offer_for_business_customers
 * @property integer $offer_for_private_customers
 * @property integer $is_vehicle_in_stock
 * @property integer $change_to_config_possible
 * @property integer $pickup_ex_works_possible
 * @property integer $leasing_type_id
 * @property double $price_per_kilometer
 * @property double $short_term
 * @property string $features
 * @property double $list_price_net
 * @property integer $available_amount
 * @property integer $transfer_cost_of_car_house
 * @property integer $provision_ex_factory
 * @property integer $maintenance_and_wear
 * @property double $insurance
 * @property integer $nationwide_delivery
 * @property integer $admission_costs
 * @property double $interest_rate
 * @property double $effective_interest_rate
 * @property double $net_loan_amount
 * @property double $total_amount
 * @property integer $same_prices_for_business_private
 * @property integer $runtime_id1
 * @property integer $down_payment1
 * @property integer $kilometer_id1
 * @property integer $lease_rate1
 * @property integer $runtime_id2
 * @property integer $down_payment2
 * @property integer $kilometer_id2
 * @property integer $lease_rate2
 * @property integer $runtime_id3
 * @property integer $down_payment3
 * @property integer $kilometer_id3
 * @property integer $lease_rate3
 * @property integer $runtime_id4
 * @property integer $down_payment4
 * @property integer $kilometer_id4
 * @property integer $lease_rate4
 * @property integer $private_runtime_id1
 * @property integer $private_deposit1
 * @property integer $private_kilometer_id1
 * @property integer $private_lease_rate1
 * @property integer $private_runtime_id2
 * @property integer $private_deposit2
 * @property integer $private_kilometer_id2
 * @property integer $private_lease_rate2
 * @property integer $private_runtime_id3
 * @property integer $private_advance_payment3
 * @property integer $private_kilometer_id3
 * @property integer $private_lease_rate3
 * @property integer $private_runtime_id4
 * @property integer $private_advance_payment4
 * @property integer $private_kilometer_id4
 * @property integer $private_lease_rate4
 * @property string $special_text
 * @property string $private_special_text
 * @property string $business_special_text
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Company $company
 * @property FuelType $fuelType
 * @property KilometerConfig $kilometerId1
 * @property KilometerConfig $kilometerId2
 * @property KilometerConfig $kilometerId3
 * @property KilometerConfig $kilometerId4
 * @property LeasingType $leasingType
 * @property PollutantClass $pollutantClass
 * @property KilometerConfig $privateKilometerId1
 * @property KilometerConfig $privateKilometerId2
 * @property KilometerConfig $privateKilometerId3
 * @property KilometerConfig $privateKilometerId4
 * @property RuntimeConfig $privateRuntimeId1
 * @property RuntimeConfig $privateRuntimeId2
 * @property RuntimeConfig $privateRuntimeId3
 * @property RuntimeConfig $privateRuntimeId4
 * @property RuntimeConfig $runtimeId1
 * @property RuntimeConfig $runtimeId2
 * @property RuntimeConfig $runtimeId3
 * @property RuntimeConfig $runtimeId4
 * @property User $seller
 * @property Transmission $transmission
 * @property VehicleAge $vehicleAge
 */
class Car extends \yii\db\ActiveRecord
{
    public $picture_tmp1;
    public $file_name1;

    public $picture_tmp2;
    public $file_name2;

    public $picture_tmp3;
    public $file_name3;

    public $picture_tmp4;
    public $file_name4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_age_id', 'transmission_id', 'fuel_type_id', 'model'], 'required'],
            [['active'], 'safe'],
            [['status', 'company_id', 'seller_id', 'vehicle_age_id', 'transmission_id', 'fuel_type_id', 'other_colors_available', 'pollutant_class_id', 'offer_for_business_customers', 'offer_for_private_customers', 'is_vehicle_in_stock', 'change_to_config_possible', 'pickup_ex_works_possible', 'leasing_type_id', 'available_amount', 'transfer_cost_of_car_house', 'provision_ex_factory', 'maintenance_and_wear', 'nationwide_delivery', 'admission_costs', 'same_prices_for_business_private', 'runtime_id1', 'down_payment1', 'kilometer_id1', 'lease_rate1', 'runtime_id2', 'down_payment2', 'kilometer_id2', 'lease_rate2', 'runtime_id3', 'down_payment3', 'kilometer_id3', 'lease_rate3', 'runtime_id4', 'down_payment4', 'kilometer_id4', 'lease_rate4', 'private_runtime_id1', 'private_deposit1', 'private_kilometer_id1', 'private_lease_rate1', 'private_runtime_id2', 'private_deposit2', 'private_kilometer_id2', 'private_lease_rate2', 'private_runtime_id3', 'private_advance_payment3', 'private_kilometer_id3', 'private_lease_rate3', 'private_runtime_id4', 'private_advance_payment4', 'private_kilometer_id4', 'private_lease_rate4', 'created_at', 'updated_at'], 'integer'],
            [['description', 'features', 'special_text', 'private_special_text', 'business_special_text'], 'string'],
            [['consumption_in_town', 'consumption_outside', 'consumption', 'co2_emmission_komb', 'jw_kilometers', 'price_per_kilometer', 'short_term', 'list_price_net', 'insurance', 'interest_rate', 'effective_interest_rate', 'net_loan_amount', 'total_amount'], 'number'],
            [['model', 'kw', 'ps'], 'string', 'max' => 45],
            [['highlight1', 'highlight2', 'highlight3', 'highlight4', 'picture1', 'picture2', 'picture3', 'picture4'], 'string', 'max' => 255],
            [['motorization'], 'string', 'max' => 150],
            [['equipment_line'], 'string', 'max' => 50],
            [['available_color1', 'available_color2', 'available_color3', 'color_interior'], 'string', 'max' => 20],
            [['jw_year'], 'string', 'max' => 25],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['fuel_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FuelType::className(), 'targetAttribute' => ['fuel_type_id' => 'id']],
            [['kilometer_id1'], 'exist', 'skipOnError' => true, 'targetClass' => KilometerConfig::className(), 'targetAttribute' => ['kilometer_id1' => 'id']],
            [['kilometer_id2'], 'exist', 'skipOnError' => true, 'targetClass' => KilometerConfig::className(), 'targetAttribute' => ['kilometer_id2' => 'id']],
            [['kilometer_id3'], 'exist', 'skipOnError' => true, 'targetClass' => KilometerConfig::className(), 'targetAttribute' => ['kilometer_id3' => 'id']],
            [['kilometer_id4'], 'exist', 'skipOnError' => true, 'targetClass' => KilometerConfig::className(), 'targetAttribute' => ['kilometer_id4' => 'id']],
            [['leasing_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeasingType::className(), 'targetAttribute' => ['leasing_type_id' => 'id']],
            [['pollutant_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => PollutantClass::className(), 'targetAttribute' => ['pollutant_class_id' => 'id']],
            [['private_kilometer_id1'], 'exist', 'skipOnError' => true, 'targetClass' => KilometerConfig::className(), 'targetAttribute' => ['private_kilometer_id1' => 'id']],
            [['private_kilometer_id2'], 'exist', 'skipOnError' => true, 'targetClass' => KilometerConfig::className(), 'targetAttribute' => ['private_kilometer_id2' => 'id']],
            [['private_kilometer_id3'], 'exist', 'skipOnError' => true, 'targetClass' => KilometerConfig::className(), 'targetAttribute' => ['private_kilometer_id3' => 'id']],
            [['private_kilometer_id4'], 'exist', 'skipOnError' => true, 'targetClass' => KilometerConfig::className(), 'targetAttribute' => ['private_kilometer_id4' => 'id']],
            [['private_runtime_id1'], 'exist', 'skipOnError' => true, 'targetClass' => RuntimeConfig::className(), 'targetAttribute' => ['private_runtime_id1' => 'id']],
            [['private_runtime_id2'], 'exist', 'skipOnError' => true, 'targetClass' => RuntimeConfig::className(), 'targetAttribute' => ['private_runtime_id2' => 'id']],
            [['private_runtime_id3'], 'exist', 'skipOnError' => true, 'targetClass' => RuntimeConfig::className(), 'targetAttribute' => ['private_runtime_id3' => 'id']],
            [['private_runtime_id4'], 'exist', 'skipOnError' => true, 'targetClass' => RuntimeConfig::className(), 'targetAttribute' => ['private_runtime_id4' => 'id']],
            [['runtime_id1'], 'exist', 'skipOnError' => true, 'targetClass' => RuntimeConfig::className(), 'targetAttribute' => ['runtime_id1' => 'id']],
            [['runtime_id2'], 'exist', 'skipOnError' => true, 'targetClass' => RuntimeConfig::className(), 'targetAttribute' => ['runtime_id2' => 'id']],
            [['runtime_id3'], 'exist', 'skipOnError' => true, 'targetClass' => RuntimeConfig::className(), 'targetAttribute' => ['runtime_id3' => 'id']],
            [['runtime_id4'], 'exist', 'skipOnError' => true, 'targetClass' => RuntimeConfig::className(), 'targetAttribute' => ['runtime_id4' => 'id']],
            [['seller_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['seller_id' => 'id']],
            [['transmission_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transmission::className(), 'targetAttribute' => ['transmission_id' => 'id']],
            [['vehicle_age_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleAge::className(), 'targetAttribute' => ['vehicle_age_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Company'),
            'seller_id' => Yii::t('app', 'Seller'),
            'company.name' => Yii::t('app', 'Company'),
            'seller.email' => Yii::t('app', 'Seller'),
            'model' => Yii::t('app', 'Model'),
            'vehicle_age_id' => Yii::t('app', 'Vehicle Age'),
            'vehicle_age.name' => Yii::t('app', 'Vehicle Age'),
            'kw' => Yii::t('app', 'Kw'),
            'ps' => Yii::t('app', 'Ps'),
            'transmission_id' => Yii::t('app', 'Transmission'),
            'fuel_type_id' => Yii::t('app', 'Fuel Type'),
            'highlight1' => Yii::t('app', 'Highlight1'),
            'highlight2' => Yii::t('app', 'Highlight2'),
            'highlight3' => Yii::t('app', 'Highlight3'),
            'highlight4' => Yii::t('app', 'Highlight4'),
            'motorization' => Yii::t('app', 'Motorization'),
            'equipment_line' => Yii::t('app', 'Equipment Line'),
            'description' => Yii::t('app', 'Description'),
            'available_color1' => Yii::t('app', 'Available Color1'),
            'available_color2' => Yii::t('app', 'Available Color2'),
            'available_color3' => Yii::t('app', 'Available Color3'),
            'other_colors_available' => Yii::t('app', 'Other Colors Available'),
            'color_interior' => Yii::t('app', 'Color Interior'),
            'picture1' => Yii::t('app', 'Picture1'),
            'picture2' => Yii::t('app', 'Picture2'),
            'picture3' => Yii::t('app', 'Picture3'),
            'picture4' => Yii::t('app', 'Picture4'),
            'picture_tmp1' => Yii::t('app', 'Picture1'),
            'picture_tmp2' => Yii::t('app', 'Picture2'),
            'picture_tmp3' => Yii::t('app', 'Picture3'),
            'picture_tmp4' => Yii::t('app', 'Picture4'),
            'consumption_in_town' => Yii::t('app', 'Consumption In Town'),
            'consumption_outside' => Yii::t('app', 'Consumption Outside'),
            'consumption' => Yii::t('app', 'Consumption'),
            'co2_emmission_komb' => Yii::t('app', 'Co2 Emmission Komb'),
            'pollutant_class_id' => Yii::t('app', 'Pollutant Class'),
            'jw_year' => Yii::t('app', 'Jw Year'),
            'jw_kilometers' => Yii::t('app', 'Jw Kilometers'),
            'offer_for_business_customers' => Yii::t('app', 'Offer For Business Customers'),
            'offer_for_private_customers' => Yii::t('app', 'Offer For Private Customers'),
            'is_vehicle_in_stock' => Yii::t('app', 'Is Vehicle In Stock'),
            'change_to_config_possible' => Yii::t('app', 'Change To Config Possible'),
            'pickup_ex_works_possible' => Yii::t('app', 'Pickup Ex Works Possible'),
            'leasing_type_id' => Yii::t('app', 'Leasing Type'),
            'price_per_kilometer' => Yii::t('app', 'Price Per Kilometer'),
            'short_term' => Yii::t('app', 'Short Term'),
            'features' => Yii::t('app', 'Features'),
            'list_price_net' => Yii::t('app', 'List Price Net'),
            'available_amount' => Yii::t('app', 'Available Amount'),
            'transfer_cost_of_car_house' => Yii::t('app', 'Transfer Cost Of Car House'),
            'provision_ex_factory' => Yii::t('app', 'Provision Ex Factory'),
            'maintenance_and_wear' => Yii::t('app', 'Maintenance And Wear'),
            'insurance' => Yii::t('app', 'Insurance'),
            'nationwide_delivery' => Yii::t('app', 'Nationwide Delivery'),
            'admission_costs' => Yii::t('app', 'Admission Costs'),
            'interest_rate' => Yii::t('app', 'Interest Rate'),
            'effective_interest_rate' => Yii::t('app', 'Effective Interest Rate'),
            'net_loan_amount' => Yii::t('app', 'Net Loan Amount'),
            'total_amount' => Yii::t('app', 'Total Amount'),
            'same_prices_for_business_private' => Yii::t('app', 'Same Prices For Business Private'),
            'runtime_id1' => Yii::t('app', 'Runtime 1'),
            'down_payment1' => Yii::t('app', 'Down Payment 1'),
            'kilometer_id1' => Yii::t('app', 'Kilometer 1'),
            'lease_rate1' => Yii::t('app', 'Lease Rate 1'),
            'runtime_id2' => Yii::t('app', 'Runtime 2'),
            'down_payment2' => Yii::t('app', 'Down Payment 2'),
            'kilometer_id2' => Yii::t('app', 'Kilometer 2'),
            'lease_rate2' => Yii::t('app', 'Lease Rate 2'),
            'runtime_id3' => Yii::t('app', 'Runtime 3'),
            'down_payment3' => Yii::t('app', 'Down Payment 3'),
            'kilometer_id3' => Yii::t('app', 'Kilometer 3'),
            'lease_rate3' => Yii::t('app', 'Lease Rate 3'),
            'runtime_id4' => Yii::t('app', 'Runtime 4'),
            'down_payment4' => Yii::t('app', 'Down Payment 4'),
            'kilometer_id4' => Yii::t('app', 'Kilometer 4'),
            'lease_rate4' => Yii::t('app', 'Lease Rate 4'),
            'private_runtime_id1' => Yii::t('app', 'Private Runtime 1'),
            'private_deposit1' => Yii::t('app', 'Private Deposit 1'),
            'private_kilometer_id1' => Yii::t('app', 'Private Kilometer 1'),
            'private_lease_rate1' => Yii::t('app', 'Private Lease Rate 1'),
            'private_runtime_id2' => Yii::t('app', 'Private Runtime 2'),
            'private_deposit2' => Yii::t('app', 'Private Deposit 2'),
            'private_kilometer_id2' => Yii::t('app', 'Private Kilometer 2'),
            'private_lease_rate2' => Yii::t('app', 'Private Lease Rate 2'),
            'private_runtime_id3' => Yii::t('app', 'Private Runtime 3'),
            'private_advance_payment3' => Yii::t('app', 'Private Advance Payment 3'),
            'private_kilometer_id3' => Yii::t('app', 'Private Kilometer 3'),
            'private_lease_rate3' => Yii::t('app', 'Private Lease Rate 3'),
            'private_runtime_id4' => Yii::t('app', 'Private Runtime 4'),
            'private_advance_payment4' => Yii::t('app', 'Private Advance Payment 4'),
            'private_kilometer_id4' => Yii::t('app', 'Private Kilometer 4'),
            'private_lease_rate4' => Yii::t('app', 'Private Lease Rate 4'),
            'special_text' => Yii::t('app', 'Special Text'),
            'private_special_text' => Yii::t('app', 'Private Special Text'),
            'business_special_text' => Yii::t('app', 'Business Special Text'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuelType()
    {
        return $this->hasOne(FuelType::className(), ['id' => 'fuel_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKilometerId1()
    {
        return $this->hasOne(KilometerConfig::className(), ['id' => 'kilometer_id1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKilometerId2()
    {
        return $this->hasOne(KilometerConfig::className(), ['id' => 'kilometer_id2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKilometerId3()
    {
        return $this->hasOne(KilometerConfig::className(), ['id' => 'kilometer_id3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKilometerId4()
    {
        return $this->hasOne(KilometerConfig::className(), ['id' => 'kilometer_id4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeasingType()
    {
        return $this->hasOne(LeasingType::className(), ['id' => 'leasing_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollutantClass()
    {
        return $this->hasOne(PollutantClass::className(), ['id' => 'pollutant_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateKilometerId1()
    {
        return $this->hasOne(KilometerConfig::className(), ['id' => 'private_kilometer_id1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateKilometerId2()
    {
        return $this->hasOne(KilometerConfig::className(), ['id' => 'private_kilometer_id2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateKilometerId3()
    {
        return $this->hasOne(KilometerConfig::className(), ['id' => 'private_kilometer_id3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateKilometerId4()
    {
        return $this->hasOne(KilometerConfig::className(), ['id' => 'private_kilometer_id4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateRuntimeId1()
    {
        return $this->hasOne(RuntimeConfig::className(), ['id' => 'private_runtime_id1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateRuntimeId2()
    {
        return $this->hasOne(RuntimeConfig::className(), ['id' => 'private_runtime_id2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateRuntimeId3()
    {
        return $this->hasOne(RuntimeConfig::className(), ['id' => 'private_runtime_id3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateRuntimeId4()
    {
        return $this->hasOne(RuntimeConfig::className(), ['id' => 'private_runtime_id4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuntimeId1()
    {
        return $this->hasOne(RuntimeConfig::className(), ['id' => 'runtime_id1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuntimeId2()
    {
        return $this->hasOne(RuntimeConfig::className(), ['id' => 'runtime_id2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuntimeId3()
    {
        return $this->hasOne(RuntimeConfig::className(), ['id' => 'runtime_id3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuntimeId4()
    {
        return $this->hasOne(RuntimeConfig::className(), ['id' => 'runtime_id4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(User::className(), ['id' => 'seller_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransmission()
    {
        return $this->hasOne(Transmission::className(), ['id' => 'transmission_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleAge()
    {
        return $this->hasOne(VehicleAge::className(), ['id' => 'vehicle_age_id']);
    }

    public function beforeSave($insert)
    {
        if ($insert)
            $this->active = Constants::ACTIVE;
        $file = UploadedFile::getInstance($this, 'picture_tmp1');
        if ($file != null && !empty(($file))) {
            $this->file_name1 = Yii::$app->security->generateRandomString() . "1." . $file->extension;
            $file->saveAs(GeneralHelper::getTempFolderPath() . $this->file_name1);
            $this->picture1 = "upload/car/" . $this->file_name1;
        }

        $file = UploadedFile::getInstance($this, 'picture_tmp2');
        if ($file != null && !empty(($file))) {
            $this->file_name2 = Yii::$app->security->generateRandomString() . "2." . $file->extension;
            $file->saveAs(GeneralHelper::getTempFolderPath() . $this->file_name2);
            $this->picture2 = "upload/car/" . $this->file_name2;
        }

        $file = UploadedFile::getInstance($this, 'picture_tmp3');
        if ($file != null && !empty(($file))) {
            $this->file_name3 = Yii::$app->security->generateRandomString() . "3." . $file->extension;
            $file->saveAs(GeneralHelper::getTempFolderPath() . $this->file_name3);
            $this->picture3 = "upload/car/" . $this->file_name3;
        }

        $file = UploadedFile::getInstance($this, 'picture_tmp4');
        if ($file != null && !empty(($file))) {
            $this->file_name4 = Yii::$app->security->generateRandomString() . "4." . $file->extension;
            $file->saveAs(GeneralHelper::getTempFolderPath() . $this->file_name4);
            $this->picture4 = "upload/car/" . $this->file_name4;
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($this->file_name1 != null)
            if (file_exists((GeneralHelper::getTempFolderPath() . $this->file_name1))) {
                copy(GeneralHelper::getTempFolderPath() . $this->file_name1, GeneralHelper::getUploadFolderPath() . "car" . DIRECTORY_SEPARATOR . $this->file_name1);
                unlink(GeneralHelper::getTempFolderPath() . $this->file_name1);
            }

        if ($this->file_name2 != null)
            if (file_exists((GeneralHelper::getTempFolderPath() . $this->file_name2))) {
                copy(GeneralHelper::getTempFolderPath() . $this->file_name2, GeneralHelper::getUploadFolderPath() . "car" . DIRECTORY_SEPARATOR . $this->file_name2);
                unlink(GeneralHelper::getTempFolderPath() . $this->file_name2);
            }

        if ($this->file_name3 != null)
            if (file_exists((GeneralHelper::getTempFolderPath() . $this->file_name3))) {
                copy(GeneralHelper::getTempFolderPath() . $this->file_name3, GeneralHelper::getUploadFolderPath() . "car" . DIRECTORY_SEPARATOR . $this->file_name3);
                unlink(GeneralHelper::getTempFolderPath() . $this->file_name3);
            }

        if ($this->file_name4 != null)
            if (file_exists((GeneralHelper::getTempFolderPath() . $this->file_name4))) {
                copy(GeneralHelper::getTempFolderPath() . $this->file_name4, GeneralHelper::getUploadFolderPath() . "car" . DIRECTORY_SEPARATOR . $this->file_name4);
                unlink(GeneralHelper::getTempFolderPath() . $this->file_name4);
            }
        parent::afterSave($insert, $changedAttributes);
    }
}
