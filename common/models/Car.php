<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property integer $id
 * @property integer $brand
 * @property string $model
 * @property integer $owner
 * @property string $houseno
 * @property string $postal
 * @property string $city
 * @property string $company
 * @property string $tel
 * @property string $mobile
 * @property string $fax
 * @property string $free_text
 * @property string $bank
 * @property string $iban
 * @property string $bic
 * @property string $account_owner
 * @property string $facebook
 * @property integer $attachment
 * @property integer $type
 * @property integer $created_at
 * @property integer $updated_at
 */
class Car extends \yii\db\ActiveRecord
{
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
            [['brand', 'owner', 'attachment', 'type', 'created_at', 'updated_at'], 'integer'],
            [['model'], 'required'],
            [['model', 'city', 'company', 'tel', 'mobile', 'fax', 'bank', 'iban', 'bic', 'account_owner'], 'string', 'max' => 50],
            [['houseno', 'facebook'], 'string', 'max' => 255],
            [['postal'], 'string', 'max' => 25],
            [['free_text'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'brand' => Yii::t('app', 'Brand'),
            'model' => Yii::t('app', 'Model'),
            'owner' => Yii::t('app', 'Owner'),
            'houseno' => Yii::t('app', 'Houseno'),
            'postal' => Yii::t('app', 'Postal'),
            'city' => Yii::t('app', 'City'),
            'company' => Yii::t('app', 'Company'),
            'tel' => Yii::t('app', 'Tel'),
            'mobile' => Yii::t('app', 'Mobile'),
            'fax' => Yii::t('app', 'Fax'),
            'free_text' => Yii::t('app', 'Free Text'),
            'bank' => Yii::t('app', 'Bank'),
            'iban' => Yii::t('app', 'Iban'),
            'bic' => Yii::t('app', 'Bic'),
            'account_owner' => Yii::t('app', 'Account Owner'),
            'facebook' => Yii::t('app', 'Facebook'),
            'attachment' => Yii::t('app', 'Attachment'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return CarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarQuery(get_called_class());
    }
}
