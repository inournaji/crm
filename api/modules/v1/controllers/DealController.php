<?php
/**
 * Created by PhpStorm.
 * User: amane
 * Date: 5/15/2016
 * Time: 3:25 PM
 */

namespace api\modules\v1\controllers;

use common\models\Customer;
use common\models\Deal;
use common\models\Source;
use common\models\User;
use common\models\VehicleBrand;
use yii\bootstrap\Html;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Response;
use Yii;

class DealController extends ActiveController
{
    public $modelClass = 'common\models\Deal';

    public function actionCreateDeal()
    {
        $is_error_exist = false;
        $error_message = "";
        $headers = Yii::$app->getRequest()->getHeaders();
        $data = \Yii::$app->getRequest()->getBodyParams();

        $transaction = Yii::$app->db->beginTransaction();
        if (isset($data['customer']) && isset($data['seller']) && isset($data['deal'])) {
            //Check if the system already has a record for the user
            if (isset($data['seller']['email'])) {
                $user = User::find()->where(['email' => $data['seller']['email']])->one();
                if ($user == null) {
                    //If the user doesn't exist, then create it with default password and the status inactive
                    $user = new User();
                    $user->load($data['seller'], "");
                    $user->scenario = User::SCENARIO_NO_PASSWORD;

                    if (!$user->save()) {
                        $is_error_exist = true;
                        $error_message = Html::errorSummary($user);
                    }else{
                        $user->setRole('seller');
                    }
                }
            }
            if (!$is_error_exist) {
                //Check if the system already has a record for the customer, Get the record
                $customer = Customer::find()->where(['email' => $data['customer']['email']])->one();
                if ($customer == null) {
                    //if the customer doesn't exist, we need to create a record for it
                    $customer = new Customer();
                    $customer->load($data['customer'], "");
                    if (!$customer->save()) {
                        $is_error_exist = true;
                        $error_message = Html::errorSummary($customer);
                    }
                }

                if (!$is_error_exist) {
                    $deal = new Deal();
                    $deal->load($data['deal'], "");
                    $source = $data['deal']['source'];
                    $brand = $data['deal']['brand'];
                    $deal->getBrandInfo($brand);
                    $deal->getSourceInfo($source);
                    $deal->user_id = $user->id;
                    $deal->customer_id = $customer->id;
                    if (!$deal->save()) {
                        $error_message = Html::errorSummary($deal);
                    } else
                    {
                        $transaction->commit();
                        return $deal;
                    }
                }
            }

            $transaction->rollBack();
            return ['error_message' => $error_message];
        }
        return ['error_message' => 'Please provide a valid information'];
    }

    public function actions()
    {
        $actions[] = [
            'create-deal' => [
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
        ];

        return $actions;
    }

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(), [
                'authenticator' => [
                    'class' => CompositeAuth::className(),
                    'except' => ['index'],
                    'authMethods' => [
                        HttpBearerAuth::className(),
                    ],
                ],
            ]
        );
    }

}