<?php
/**
 * Created by PhpStorm.
 * User: Amaney-kht
 * Date: 25/03/2017
 * Time: 10:06 ص
 */

namespace common\helpers;


use common\models\Company;
use common\models\FuelType;
use common\models\KilometerConfig;
use common\models\LeasingType;
use common\models\PollutantClass;
use common\models\RuntimeConfig;
use common\models\Transmission;
use common\models\User;
use common\models\VehicleAge;
use yii\helpers\ArrayHelper;

class ListHelper
{
    public static function getCompanyList()
    {
        return ArrayHelper::map(Company::find()->all(), 'id', 'name');
    }

    public static function getVehicleAgeList()
    {
        return ArrayHelper::map(VehicleAge::find()->all(), 'id', 'name');
    }

    public static function getTransmissionList()
    {
        return ArrayHelper::map(Transmission::find()->all(), 'id', 'name');
    }

    public static function getFuelTypeList()
    {
        return ArrayHelper::map(FuelType::find()->all(), 'id', 'name');
    }

    public static function getLeasingTypeList()
    {
        return ArrayHelper::map(LeasingType::find()->all(), 'id', 'name');
    }

    public static function getRuntimeList()
    {
        return ArrayHelper::map(RuntimeConfig::find()->all(), 'id', 'value');
    }

    public static function getKilometerList()
    {
        return ArrayHelper::map(KilometerConfig::find()->all(), 'id', 'value');
    }

    public static function getSellerList()
    {
        $sellers = User::find()->joinWith(['roles' => function ($query) {
            $query->where(['item_name' => Constants::SELLER]);
        }])->all();
        return ArrayHelper::map($sellers, 'id', 'email');
    }

    public static function getPollutantClassList()
    {
        return ArrayHelper::map(PollutantClass::find()->all(), 'id', 'name');
    }

    public static function getYesNo()
    {
        return [
            '1' => "Yes",
            '0' => "No",
        ];
    }

    public static function getActiveInactive()
    {
        return [
            Constants::ACTIVE => Constants::ACTIVE_STR,
            Constants::IN_ACTIVE => Constants::IN_ACTIVE_STR,
        ];
    }

    public static function getCarStatus()
    {
        return [
            Constants::CAR_STATUS_PENDING => Constants::CAR_STATUS_PENDING_STR,
            Constants::CAR_STATUS_APPROVED => Constants::CAR_STATUS_APPROVED_STR,
            Constants::CAR_STATUS_DECLINED => Constants::CAR_STATUS_DECLINED_STR
        ];
    }

    public static function getRoleList()
    {
        return [
            Constants::ADMIN => Constants::ADMIN,
            Constants::SELLER => Constants::SELLER,
        ];
    }
}