<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deal".
 *
 * @property integer $id
 * @property integer $car
 * @property string $description
 * @property string $km
 * @property string $operation_date
 * @property double $deposit
 * @property string $price
 * @property string $validity
 * @property string $type
 * @property string $link
 * @property string $features
 * @property integer $attachment
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Attachment $attachment0
 * @property Car $car0
 */
class Deal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car', 'km', 'operation_date', 'validity', 'type', 'attachment', 'created_at', 'updated_at'], 'integer'],
            [['description', 'features'], 'string'],
            [['deposit', 'price'], 'number'],
            [['link'], 'string', 'max' => 255],
            [['attachment'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::className(), 'targetAttribute' => ['attachment' => 'id']],
            [['car'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'car' => Yii::t('app', 'Car'),
            'description' => Yii::t('app', 'Description'),
            'km' => Yii::t('app', 'Km'),
            'operation_date' => Yii::t('app', 'Operation Date'),
            'deposit' => Yii::t('app', 'Deposit'),
            'price' => Yii::t('app', 'Price'),
            'validity' => Yii::t('app', 'Validity'),
            'type' => Yii::t('app', 'Type'),
            'link' => Yii::t('app', 'Link'),
            'features' => Yii::t('app', 'Features'),
            'attachment' => Yii::t('app', 'Attachment'),
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
    public function getCar0()
    {
        return $this->hasOne(Car::className(), ['id' => 'car']);
    }

    /**
     * @inheritdoc
     * @return DealQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DealQuery(get_called_class());
    }
}
