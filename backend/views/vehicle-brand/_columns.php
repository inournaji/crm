<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use common\models\VehicleBrand;
return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',

    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>ArrayHelper::map(VehicleBrand::find()->orderBy('name')->asArray()->all(), 'id', 'name'),

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'code',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>ArrayHelper::map(VehicleBrand::find()->orderBy('name')->asArray()->all(), 'id', 'code'),

    ],
    [
        'class'=>'kartik\grid\BooleanColumn',
        'attribute'=>'status',
        'vAlign'=>'middle',
        'filterType'=>GridView::FILTER_SELECT2,

    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   