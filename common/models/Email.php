<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property integer $id
 * @property integer $owner
 * @property string $attachment
 * @property string $body
 * @property integer $created_at
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner', 'created_at'], 'integer'],
            [['body'], 'string'],
            [['attachment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'owner' => Yii::t('app', 'Owner'),
            'attachment' => Yii::t('app', 'Attachment'),
            'body' => Yii::t('app', 'Body'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return EmailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmailQuery(get_called_class());
    }
}
