<?php

namespace common\models;

use common\helpers\Constants;
use common\models\User;
use Yii;

/**
 * This is the model class for table "deal".
 *
 * @property integer $id
 * @property integer $brand
 * @property string $model
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
 * @property ViechleBrand $brand0
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
            [['customer_id', 'user_id', 'vehicle_brand_id', 'operation_date', 'type', 'attachment_id', 'created_at', 'updated_at'], 'integer'],
            [['description', 'features', 'validity', 'km'], 'string'],
            [['deposit', 'price'], 'number'],
            [['model', 'link'], 'string', 'max' => 255],
            [['attachment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::className(), 'targetAttribute' => ['attachment_id' => 'id']],
            [['vehicle_brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleBrand::className(), 'targetAttribute' => ['vehicle_brand_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vehicle_brand_id' => Yii::t('app', 'Brand'),
            'model' => Yii::t('app', 'Model'),
            'description' => Yii::t('app', 'Description'),
            'km' => Yii::t('app', 'Km'),
            'operation_date' => Yii::t('app', 'Operation Date'),
            'deposit' => Yii::t('app', 'Deposit'),
            'price' => Yii::t('app', 'Price'),
            'validity' => Yii::t('app', 'Validity'),
            'type' => Yii::t('app', 'Type'),
            'link' => Yii::t('app', 'Link'),
            'features' => Yii::t('app', 'Features'),
            'attachment_id' => Yii::t('app', 'Attachment'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment()
    {
        return $this->hasOne(Attachment::className(), ['id' => 'attachment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(VehicleBrand::className(), ['id' => 'vehicle_brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Source::className(), ['id' => 'source_id']);
    }

    /**
     * @inheritdoc
     * @return DealQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DealQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->is_active = 1;
            $this->status = Constants::STATUS_WAITING_CUSTOMER;
            if ($this->isNewRecord) {
                $this->created_at = $this->updated_at = strtotime('now');
            } else {
                $this->updated_at = strtotime('now');
            }
        }
        return parent::beforeSave($insert);
    }

    /**
     * Generates new attachment token
     */
    public function generateAttachmentToken()
    {
        $this->attachment_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Finds out if attachment token is valid
     *
     * @return bool
     */
    public function isAttachmentTokenValid()
    {
        if (empty($this->attachment_token)) {
            return false;
        }

        $timestamp = (int)substr($this->attachment_token, strrpos($this->attachment_token, '_') + 1);
        $expire = Yii::$app->params['deal.attachment_token'];
        return $timestamp + $expire >= time();
    }

    /**
     * get the icon of the deal by its status, the color of the icon will depend on the status of the deal
     * @param $status
     */
    public function getDealStatusIcon($status, &$enabled = false)
    {
        $status_icon_name = "";
        switch ($status) {
            case Constants::STATUS_WAITING_CUSTOMER:
                $status_icon_name = "email";
                break;
            case Constants::STATUS_WAITING_CREDIT_CARD:
                $status_icon_name = "credit";
                break;
            case Constants::STATUS_WAITING_BANK:
                $status_icon_name = "bank";
                break;
            case Constants::STATUS_WAITING_CONTRACT:
                $status_icon_name = "customer";
                break;
        }
        $color = "blue";

        if (!$this->is_active && $this->status == $status)
            $color = "red";
        else {
            if ($this->status == $status) {
                $color = "orange";
                $enabled = true;
            } else {
                if (in_array($this->status, $this->getStatusListAfterSpecifiedStatus($status)))
                    $color = "green";
            }
        }
        return $status_icon_name . "-" . $color . ".png";
    }

    public function getStatusListAfterSpecifiedStatus($status)
    {
        switch ($status) {
            case Constants::STATUS_WAITING_CUSTOMER:
                return [
                    Constants::STATUS_WAITING_CREDIT_CARD,
                    Constants::STATUS_WAITING_BANK,
                    Constants::STATUS_WAITING_CONTRACT,
                    Constants::STATUS_Done
                ];
            case Constants::STATUS_WAITING_CREDIT_CARD:
                return [
                    Constants::STATUS_WAITING_BANK,
                    Constants::STATUS_WAITING_CONTRACT,
                    Constants::STATUS_Done
                ];
            case Constants::STATUS_WAITING_BANK:
                return [
                    Constants::STATUS_WAITING_CONTRACT,
                    Constants::STATUS_Done
                ];
            case Constants::STATUS_WAITING_CONTRACT:
                return [
                    Constants::STATUS_Done
                ];
        }
    }

    public function getAllowedStatus($status)
    {
        switch ($status) {
            case Constants::STATUS_WAITING_CUSTOMER:
                return [
                    $this->id . "_" . Constants::STATUS_WAITING_CREDIT_CARD => Constants::STATUS_WAITING_CREDIT_CARD_STR,
                ];
            case Constants::STATUS_WAITING_CREDIT_CARD:
                return [
                    $this->id . "_" . Constants::STATUS_WAITING_BANK => Constants::STATUS_WAITING_BANK_STR,
                    $this->id . "_" . Constants::STATUS_WAITING_CUSTOMER => Constants::STATUS_WAITING_CUSTOMER_STR,
                ];
            case Constants::STATUS_WAITING_BANK:
                return [
                    $this->id . "_" . Constants::STATUS_WAITING_CREDIT_CARD => Constants::STATUS_WAITING_CREDIT_CARD_STR,
                    $this->id . "_" . Constants::STATUS_WAITING_CONTRACT => Constants::STATUS_WAITING_CONTRACT_STR,
                ];
            case Constants::STATUS_WAITING_CONTRACT:
                return [
                    $this->id . "_" . Constants::STATUS_WAITING_BANK => Constants::STATUS_WAITING_BANK_STR,
                    $this->id . "_" . Constants::STATUS_Done => Constants::STATUS_Done_STR
                ];
            case Constants::STATUS_Done:
                return [

                ];
        }
    }

    public function getStatusName()
    {
        switch ($this->status) {
            case Constants::STATUS_WAITING_CUSTOMER:
                return Constants::STATUS_WAITING_CUSTOMER_STR;
            case Constants::STATUS_WAITING_CREDIT_CARD:
                return Constants::STATUS_WAITING_CREDIT_CARD_STR;
            case Constants::STATUS_WAITING_BANK:
                return Constants::STATUS_WAITING_BANK_STR;
            case Constants::STATUS_WAITING_CONTRACT:
                return Constants::STATUS_WAITING_CONTRACT_STR;
            case Constants::STATUS_Done:
                return Constants::STATUS_Done_STR;
        }
    }

    public function getBrandInfo($brand)
    {
        $brand_model = VehicleBrand::find()->where(['name' => $brand])->one();
        if ($brand_model == null) {
            $brand_model = new VehicleBrand();
            $brand_model->name = $brand;
            $brand_model->save();
        }
        return $brand_model->id;
    }

    public function getSourceInfo($source)
    {
        $source_model = Source::find()->where(['name' => $source])->one();
        if ($source_model == null) {
            $source_model = new Source();
            $source_model->name = $source;
            $source_model->save();
        }
        return $source_model->id;
    }

}
