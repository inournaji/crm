<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;


/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property string $tmp_password
 * @property string $first_name
 * @property string $last_name
 * @property string $tel
 * @property string $fax
 * @property string $houseno
 * @property string $postal
 * @property string $city
 * @property string $company
 * @property string $short_id
 * @property string $logo
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 10;
    public $tmp_logo;
    public $tmp_password;
    public $role;

    const SCENARIO_NO_PASSWORD = "no_passowrd";

    public $password_repeat;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['username', 'email', 'created_at', 'updated_at', 'first_name', 'last_name', 'tel', 'houseno' ,'role'], 'required'],
            [['status', 'created_at', 'updated_at', 'short_id'], 'integer'],
            [[ 'contact_content','leasingbank_text'] , 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'houseno', 'company_id'], 'string', 'max' => 255],
            [['tmp_password','first_name', 'last_name', 'tel', 'fax', 'postal', 'city'], 'string', 'max' => 50],
            [['username', 'email', 'password_reset_token'], 'unique', 'on' => self::SCENARIO_NO_PASSWORD],
            ['password_repeat', 'compare', 'compareAttribute' => 'tmp_password', 'message' => "Passwords don't match"],
        ];
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public function getRoles()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    public function setRole($r_name)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($r_name);
        $roles = Yii::$app->authManager->getRolesByUser($this->id);
        if(!is_null($role)) {
            if (!isset($roles[$r_name])) {
                $auth->assign($role, $this->id);
            } else {
                $auth->revokeAll($this->id);
                $auth->assign($role, $this->id);
            }
        }
        return;
    }

    /*
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'tel' => Yii::t('app', 'Tel'),
            'fax' => Yii::t('app', 'Fax'),
            'houseno' => Yii::t('app', 'Houseno'),
            'postal' => Yii::t('app', 'Postal'),
            'city' => Yii::t('app', 'City'),
            'company_id' => Yii::t('app', 'Company'),
            'company.name' => Yii::t('app', 'Company'),
            'short_id' => Yii::t('app', 'Short ID'),
            'logo' => Yii::t('app', 'Logo'),
            'tmp_password' => Yii::t('app', 'Password'),
        ];
    }

    public function uploadImage($image)
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $tmpimage = UploadedFile::getInstance($this, $image);

        //$this->$image = $tmpimage;

        // if no image was uploaded abort the upload
        if (empty($tmpimage)) {
            return false;
        }

        // store the source file name
        //$this->filename = $tmpimage->name;
        $ext = end((explode(".", $tmpimage->name)));

        // generate a unique file name
        $tmpimage->name = Yii::$app->security->generateRandomString() . ".{$ext}";

        // the uploaded image instance
        return $tmpimage;
    }

    public function getImageFile($image)
    {
        return Yii::$app->params['upload_dir'] . $image->name;
    }

    public function saveImage($image)
    {
        $tmp = $this->uploadImage($image);
        $path = $this->getImageFile($tmp);
        $tmp->saveAs($path);
        return $tmp->name;

    }

    public function beforeValidate()
    {

        if ($this->isNewRecord) {
            $this->created_at = $this->updated_at = strtotime('now');
            $this->username = $this->email;
        } else {
            $this->updated_at = strtotime('now');
        }
        if($this->tmp_password){
            $this->setPassword($this->tmp_password);
            $this->generateAuthKey();
        }
        if (isset($_FILES['User']['name'])) {
            $files = $_FILES['User']['name'];
            if ($files['tmp_logo'] != "") {
                $this->logo = $this->saveImage('tmp_logo');
            }
        }
        return Parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if ($this->scenario == self::SCENARIO_NO_PASSWORD) {
            $this->password_hash = $this->password_repeat = "123456";
            $this->setPassword($this->password_hash);
            $this->status = self::STATUS_INACTIVE;
        }
        return Parent::beforeSave($insert);
    }

    public function getStatusList() {
        return [
            self::STATUS_ACTIVE => "Active",
            self::STATUS_INACTIVE => "Inactive"
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->setRole($this->role);
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function getUserRole()
    {
        $roles = Yii::$app->authManager->getRolesByUser($this->id);
        if ($roles != null) {
            $key = key($roles);
            return $roles[$key]->name;
        }
        return "";
    }

    public function afterFind()
    {
        $this->role = $this->getUserRole();
        parent::afterFind(); // TODO: Change the autogenerated stub
    }
}
