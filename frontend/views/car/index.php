<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\helpers\Constants;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Car'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'company.name',
                'value' => 'company.name'
            ],
            [
                'attribute' => 'seller.email',
                'value' => 'seller.email',
                'visible' => !Yii::$app->user->isGuest && Yii::$app->user->can(Constants::ADMIN)
            ],
            'model',
            [
                'attribute' => 'vehicle_age.name',
                'value' => function ($data) {
                    return ($data->vehicleAge == null) ? "" : $data->vehicleAge->name;
                },
            ],
            'kw',
            'ps',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->getStatusValue();
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=> \common\helpers\ListHelper::getCarStatus(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>''],
                'format'=>'raw'
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'active',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->getActiveValue();
                },
                'editableOptions' => [
                    'inputType' => \kartik\editable\Editable::INPUT_WIDGET,
                    'widgetClass' => 'kartik\select2\Select2',
                    'options' => [
                        'data' => \common\helpers\ListHelper::getActiveInactive(),
                        'options' => ['placeholder' => 'Select..'],
                        'pluginOptions' => [
                            'allowClear' => TRUE,
                        ],
                    ]
                    //'formOptions' => ['action' => ['/car/editActive']],
                ],
                'hAlign' => 'right',
                'vAlign' => 'middle',
                'width' => '7%',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=> \common\helpers\ListHelper::getActiveInactive(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>''],
                'format'=>'raw'
            ],
            // 'transmission_id',
            // 'fuel_type_id',
            // 'highlight1',
            // 'highlight2',
            // 'highlight3',
            // 'highlight4',
            // 'motorization',
            // 'equipment_line',
            // 'description:ntext',
            // 'available_color1',
            // 'available_color2',
            // 'available_color3',
            // 'other_colors_available',
            // 'color_interior',
            // 'picture1',
            // 'picture2',
            // 'picture3',
            // 'picture4',
            // 'consumption_in_town',
            // 'consumption_outside',
            // 'consumption',
            // 'co2_emmission_komb',
            // 'pollutant_class_id',
            // 'jw_year',
            // 'jw_kilometers',
            // 'offer_for_business_customers',
            // 'offer_for_private_customers',
            // 'is_vehicle_in_stock',
            // 'change_to_config_possible',
            // 'pickup_ex_works_possible',
            // 'leasing_type_id',
            // 'price_per_kilometer',
            // 'short_term',
            // 'features:ntext',
            // 'list_price_net',
            // 'available_amount',
            // 'transfer_cost_of_car_house',
            // 'provision_ex_factory',
            // 'maintenance_and_wear',
            // 'insurance',
            // 'nationwide_delivery',
            // 'admission_costs',
            // 'interest_rate',
            // 'effective_interest_rate',
            // 'net_loan_amount',
            // 'total_amount',
            // 'same_prices_for_business_private',
            // 'runtime_id1:datetime',
            // 'down_payment1',
            // 'kilometer_id1',
            // 'lease_rate1',
            // 'runtime_id2:datetime',
            // 'down_payment2',
            // 'kilometer_id2',
            // 'lease_rate2',
            // 'runtime_id3:datetime',
            // 'down_payment3',
            // 'kilometer_id3',
            // 'lease_rate3',
            // 'runtime_id4:datetime',
            // 'down_payment4',
            // 'kilometer_id4',
            // 'lease_rate4',
            // 'private_runtime_id1:datetime',
            // 'private_deposit1',
            // 'private_kilometer_id1',
            // 'private_lease_rate1',
            // 'private_runtime_id2:datetime',
            // 'private_deposit2',
            // 'private_kilometer_id2',
            // 'private_lease_rate2',
            // 'private_runtime_id3:datetime',
            // 'private_advance_payment3',
            // 'private_kilometer_id3',
            // 'private_lease_rate3',
            // 'private_runtime_id4:datetime',
            // 'private_advance_payment4',
            // 'private_kilometer_id4',
            // 'private_lease_rate4',
            // 'special_text:ntext',
            // 'private_special_text:ntext',
            // 'business_special_text:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
