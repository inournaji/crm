<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "attachment".
 *
 * @property integer $id
 * @property string $name
 * @property string $file
 * @property string $type
 *
 * @property Customer[] $customers
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'file'], 'required'],
            [['name', 'file'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['name'], 'unique'],
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
            'file' => Yii::t('app', 'File'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['attachment' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AttachmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttachmentQuery(get_called_class());
    }
}
