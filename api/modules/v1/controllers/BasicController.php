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
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\Response;
use Yii;

class BasicController extends ActiveController
{
    public $modelClass = 'common\models\Deal';

    public function actionGetBasicInfo()
    {
        $data["brands"] = VehicleBrand::find()->all();
        $data["sources"] = Source::find()->all();
        return $data;
    }

    public function actions()
    {
        $actions[] = [
            'get-basic-info' => [
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
        ];

        return $actions;
    }

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => ['application/json' => Response::FORMAT_JSON]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get-basic-info' => ['get'],
                ]
            ]
        ];
    }

}