<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "viechle_brand".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $status
 */
class VehicleBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name', 'code'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return ViechleBrandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VehicleBrandQuery(get_called_class());
    }
}
