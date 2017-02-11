<?php

namespace common\models;

use common\helpers\GeneralHelper;
use Yii;
use yii\web\UploadedFile;

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
    public $photo;
    public $file_name;
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
            [['name'], 'required'],
            [['name', 'file'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['photo'], 'file', 'extensions' => 'jpg, gif, png'],
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

    public function beforeSave($insert)
    {
        $file = UploadedFile::getInstance($this, 'photo');
        if ($file != null && !empty(($file))) {
            $this->file_name = Yii::$app->security->generateRandomString() . "." . $file->extension;
            $file->saveAs(GeneralHelper::getTempFolderPath(). $this->file_name );
            $this->file = "upload/attachment/" . $this->file_name;
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($this->file_name != null)
            if (file_exists((GeneralHelper::getTempFolderPath() . $this->file_name))) {
                copy(GeneralHelper::getTempFolderPath() . $this->file_name, GeneralHelper::getUploadFolderPath() . "attachment" . DIRECTORY_SEPARATOR . $this->file_name);
                unlink(GeneralHelper::getTempFolderPath() . $this->file_name);
            }
        parent::afterSave($insert, $changedAttributes);
    }
}
