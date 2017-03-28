<?php
namespace backend\models;

use common\helpers\Constants;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends \common\models\LoginForm
{
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
            $user = $this->getUser(Constants::ADMIN, null);
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }else {
                $roles = Yii::$app->authManager->getRolesByUser($user->id);
                if (!isset($roles["admin"])) {
                    throw new \yii\web\HttpException(403, 'You are not authorized to login please contact the website administrator');
                }
            }
        }
    }

}
