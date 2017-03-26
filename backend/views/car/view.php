<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\Constants;
/* @var $this yii\web\View */
/* @var $model common\models\Car */

$this->title = $model->model;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Vehicle data", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
        'options' => ['class' => 'col-12 panel']
    ]); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'company_id',
                'value' => ($model->company_id == null) ? "" : $model->company->name
            ],
            [
                'attribute' => 'seller_id',
                'value' => ($model->seller_id == null) ? "" : $model->seller->email
            ],
            'model',
            [
                'attribute' => 'vehicle_age_id',
                'value' => ($model->vehicle_age_id == null) ? "" : $model->vehicleAge->name
            ],
            'kw',
            'ps',
            [
                'attribute' => 'transmission_id',
                'value' => ($model->transmission_id == null) ? "" : $model->transmission->name
            ],
            [
                'attribute' => 'fuel_type_id',
                'value' => ($model->fuel_type_id == null) ? "" : $model->fuelType->name
            ],
            [
                'attribute' => 'status',
                'value' => ($model->status == Constants::CAR_STATUS_PENDING) ? Constants::CAR_STATUS_PENDING_STR : Constants::CAR_STATUS_APPROVED_STR
            ],
            'highlight1',
            'highlight2',
            'highlight3',
            'highlight4',
            'motorization',
            'equipment_line',
        ],
    ]) ?>

    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Equipment", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'description:ntext',
            'available_color1',
            'available_color2',
            'available_color3',
            'other_colors_available',
            'color_interior',
        ],
    ]) ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Images", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'picture1',
                'value' => Yii::$app->homeUrl . $model->picture1,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
            [
                'attribute' => 'picture2',
                'value' => Yii::$app->homeUrl . $model->picture2,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
            [
                'attribute' => 'picture3',
                'value' => Yii::$app->homeUrl . $model->picture3,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
            [
                'attribute' => 'picture4',
                'value' => Yii::$app->homeUrl . $model->picture4,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
        ],
    ]) ?>


    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Consumption Data", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'consumption_in_town',
            'consumption_outside',
            'consumption',
            'co2_emmission_komb',
            [
                'attribute' => 'pollutant_class_id',
                'value' => ($model->pollutant_class_id == null) ? "" : $model->pollutantClass->name
            ],

        ],
    ]) ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Additional information for year cars", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jw_year',
            'jw_kilometers',
        ],
    ]) ?>

    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Offer data", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'offer_for_business_customers',
            'offer_for_private_customers',
            'is_vehicle_in_stock',
            'change_to_config_possible',
            'pickup_ex_works_possible',
            [
                'attribute' => 'leasing_type_id',
                'value' => ($model->leasing_type_id == null) ? "" : $model->leasingType->name
            ],
            'price_per_kilometer',
            'short_term',
            'features:ntext',
            'list_price_net',
            'available_amount',

        ],
    ]) ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Additional services", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'transfer_cost_of_car_house',
            'provision_ex_factory',
            'maintenance_and_wear',
            'insurance',
            'nationwide_delivery',
            'admission_costs',
        ],
    ]) ?>

    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Additional information for private customers", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default,
        'options' => ['class' => 'panel private-panel']
    ]); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'interest_rate',
            'effective_interest_rate',
            'net_loan_amount',
            'total_amount',

        ],
    ]) ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Prices", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'same_prices_for_business_private',
            [
                'attribute' => 'runtime_id1',
                'value' => ($model->runtime_id1 == null) ? "" : $model->runtimeId1->value
            ],
            'down_payment1',
            [
                'attribute' => 'kilometer_id1',
                'value' => ($model->kilometer_id1 == null) ? "" : $model->kilometerId1->value
            ],
            'lease_rate1',
            [
                'attribute' => 'runtime_id2',
                'value' => ($model->runtime_id2 == null) ? "" : $model->runtimeId2->value
            ],
            'down_payment2',
            [
                'attribute' => 'kilometer_id2',
                'value' => ($model->kilometer_id2 == null) ? "" : $model->kilometerId2->value
            ],
            'lease_rate2',
            [
                'attribute' => 'runtime_id3',
                'value' => ($model->runtime_id3 == null) ? "" : $model->runtimeId3->value
            ],
            'down_payment3',
            [
                'attribute' => 'kilometer_id3',
                'value' => ($model->kilometer_id3 == null) ? "" : $model->kilometerId3->value
            ],
            'lease_rate3',
            [
                'attribute' => 'runtime_id4',
                'value' => ($model->runtime_id4 == null) ? "" : $model->runtimeId4->value
            ],
            'down_payment4',
            [
                'attribute' => 'kilometer_id4',
                'value' => ($model->kilometer_id4 == null) ? "" : $model->kilometerId4->value
            ],
            'lease_rate4',
            [
                'attribute' => 'private_runtime_id1',
                'value' => ($model->private_runtime_id1 == null) ? "" : $model->privateRuntimeId1->value
            ],
            'private_deposit1',
            [
                'attribute' => 'private_kilometer_id1',
                'value' => ($model->private_kilometer_id1 == null) ? "" : $model->privateKilometerId1->value
            ],
            'private_lease_rate1',
            [
                'attribute' => 'private_runtime_id2',
                'value' => ($model->private_runtime_id2 == null) ? "" : $model->privateRuntimeId2->value
            ],
            'private_deposit2',
            [
                'attribute' => 'private_kilometer_id2',
                'value' => ($model->private_kilometer_id2 == null) ? "" : $model->privateKilometerId2->value
            ],
            'private_lease_rate2',
            [
                'attribute' => 'private_runtime_id3',
                'value' => ($model->private_runtime_id3 == null) ? "" : $model->privateRuntimeId3->value
            ],
            'private_advance_payment3',
            'private_kilometer_id3',
            'private_lease_rate3',
            [
                'attribute' => 'private_runtime_id4',
                'value' => ($model->private_runtime_id4 == null) ? "" : $model->privateRuntimeId4->value
            ],
            'private_advance_payment4',
            [
                'attribute' => 'private_kilometer_id4',
                'value' => ($model->private_kilometer_id4 == null) ? "" : $model->privateKilometerId4->value
            ],
            'private_lease_rate4',

        ],
    ]) ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Additional Information", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'special_text:ntext',
            'private_special_text:ntext',
            'business_special_text:ntext',

        ],
    ]) ?>
    <?php \amass\panel\Panel::end(); ?>

</div>
