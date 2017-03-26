<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kilometer_config".
 *
 * @property integer $id
 * @property integer $value
 *
 * @property Car[] $cars
 * @property Car[] $cars0
 * @property Car[] $cars1
 * @property Car[] $cars2
 * @property Car[] $cars3
 * @property Car[] $cars4
 * @property Car[] $cars5
 * @property Car[] $cars6
 */
class KilometerConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kilometer_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['kilometer_id1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars0()
    {
        return $this->hasMany(Car::className(), ['kilometer_id2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars1()
    {
        return $this->hasMany(Car::className(), ['kilometer_id3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars2()
    {
        return $this->hasMany(Car::className(), ['kilometer_id4' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars3()
    {
        return $this->hasMany(Car::className(), ['private_kilometer_id1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars4()
    {
        return $this->hasMany(Car::className(), ['private_kilometer_id2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars5()
    {
        return $this->hasMany(Car::className(), ['private_kilometer_id3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars6()
    {
        return $this->hasMany(Car::className(), ['private_kilometer_id4' => 'id']);
    }
}
