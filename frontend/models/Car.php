<?php
/**
 * Created by PhpStorm.
 * User: Amaney-kht
 * Date: 24/03/2017
 * Time: 07:01 م
 */

namespace frontend\models;

use common\helpers\Constants;
use common\models\User;
use Yii;
use common\helpers\MailHelper;

class Car extends \common\models\Car
{
    public function beforeSave($insert)
    {
        if($insert) {
            $seller = User::find()->where(['id' => Yii::$app->user->id])->one();
            $this->company_id = $seller->company_id;
            $this->seller_id = Yii::$app->user->id;
            $this->status = Constants::CAR_STATUS_PENDING;
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert)
        {
            MailHelper::sendEmail($this, Yii::$app->params["adminEmail"], Yii::$app->params["adminEmail"], "CRM", "A new Car is added", "car_added");
        }

        parent::afterSave($insert, $changedAttributes);
    }
}