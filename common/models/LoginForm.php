<?php
namespace common\models;

use common\helpers\Constants;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser(null, Constants::ADMIN);
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login($role, $exculded_role)
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser($role, $exculded_role), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser($role, $exculded_role)
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
            if ($role != null) {
                if ($role != $this->_user->role)
                    return null;
            } else {
                if ($exculded_role != null)
                    if ($exculded_role == $this->_user->role)
                        return null;
            }
        }

        return $this->_user;
    }
}
