<?php
/**
 * Created by PhpStorm.
 * User: Amaney-kht
 * Date: 24/03/2017
 * Time: 07:01 م
 */

namespace backend\models;

use common\helpers\Constants;
use common\models\User;
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

        parent::afterSave($insert, $changedAttributes);
    }
}