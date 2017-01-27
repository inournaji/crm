<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string $salutation
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
 *
 * @property Attachment $attachment0
 * @property CustomerType $type0
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'email', 'salutation', 'created_at', 'updated_at'], 'required'],
            [['attachment', 'type', 'created_at', 'updated_at'], 'integer'],
            [['fname', 'lname', 'city', 'company', 'tel', 'mobile', 'fax', 'bank', 'iban', 'bic', 'account_owner'], 'string', 'max' => 50],
            [['email', 'salutation', 'houseno', 'facebook'], 'string', 'max' => 255],
            [['postal'], 'string', 'max' => 25],
            [['free_text'], 'string', 'max' => 1000],
            [['email'], 'unique'],
            [['attachment'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::className(), 'targetAttribute' => ['attachment' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerType::className(), 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fname' => Yii::t('app', 'Fname'),
            'lname' => Yii::t('app', 'Lname'),
            'email' => Yii::t('app', 'Email'),
            'salutation' => Yii::t('app', 'Salutation'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment0()
    {
        return $this->hasOne(Attachment::className(), ['id' => 'attachment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(CustomerType::className(), ['id' => 'type']);
    }

    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
