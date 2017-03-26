<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'seller_id') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'vehicle_age_id') ?>

    <?php // echo $form->field($model, 'kw') ?>

    <?php // echo $form->field($model, 'ps') ?>

    <?php // echo $form->field($model, 'transmission_id') ?>

    <?php // echo $form->field($model, 'fuel_type_id') ?>

    <?php // echo $form->field($model, 'highlight1') ?>

    <?php // echo $form->field($model, 'highlight2') ?>

    <?php // echo $form->field($model, 'highlight3') ?>

    <?php // echo $form->field($model, 'highlight4') ?>

    <?php // echo $form->field($model, 'motorization') ?>

    <?php // echo $form->field($model, 'equipment_line') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'available_color1') ?>

    <?php // echo $form->field($model, 'available_color2') ?>

    <?php // echo $form->field($model, 'available_color3') ?>

    <?php // echo $form->field($model, 'other_colors_available') ?>

    <?php // echo $form->field($model, 'color_interior') ?>

    <?php // echo $form->field($model, 'picture1') ?>

    <?php // echo $form->field($model, 'picture2') ?>

    <?php // echo $form->field($model, 'picture3') ?>

    <?php // echo $form->field($model, 'picture4') ?>

    <?php // echo $form->field($model, 'consumption_in_town') ?>

    <?php // echo $form->field($model, 'consumption_outside') ?>

    <?php // echo $form->field($model, 'consumption') ?>

    <?php // echo $form->field($model, 'co2_emmission_komb') ?>

    <?php // echo $form->field($model, 'pollutant_class_id') ?>

    <?php // echo $form->field($model, 'jw_year') ?>

    <?php // echo $form->field($model, 'jw_kilometers') ?>

    <?php // echo $form->field($model, 'offer_for_business_customers') ?>

    <?php // echo $form->field($model, 'offer_for_private_customers') ?>

    <?php // echo $form->field($model, 'is_vehicle_in_stock') ?>

    <?php // echo $form->field($model, 'change_to_config_possible') ?>

    <?php // echo $form->field($model, 'pickup_ex_works_possible') ?>

    <?php // echo $form->field($model, 'leasing_type_id') ?>

    <?php // echo $form->field($model, 'price_per_kilometer') ?>

    <?php // echo $form->field($model, 'short_term') ?>

    <?php // echo $form->field($model, 'features') ?>

    <?php // echo $form->field($model, 'list_price_net') ?>

    <?php // echo $form->field($model, 'available_amount') ?>

    <?php // echo $form->field($model, 'transfer_cost_of_car_house') ?>

    <?php // echo $form->field($model, 'provision_ex_factory') ?>

    <?php // echo $form->field($model, 'maintenance_and_wear') ?>

    <?php // echo $form->field($model, 'insurance') ?>

    <?php // echo $form->field($model, 'nationwide_delivery') ?>

    <?php // echo $form->field($model, 'admission_costs') ?>

    <?php // echo $form->field($model, 'interest_rate') ?>

    <?php // echo $form->field($model, 'effective_interest_rate') ?>

    <?php // echo $form->field($model, 'net_loan_amount') ?>

    <?php // echo $form->field($model, 'total_amount') ?>

    <?php // echo $form->field($model, 'same_prices_for_business_private') ?>

    <?php // echo $form->field($model, 'runtime_id1') ?>

    <?php // echo $form->field($model, 'down_payment1') ?>

    <?php // echo $form->field($model, 'kilometer_id1') ?>

    <?php // echo $form->field($model, 'lease_rate1') ?>

    <?php // echo $form->field($model, 'runtime_id2') ?>

    <?php // echo $form->field($model, 'down_payment2') ?>

    <?php // echo $form->field($model, 'kilometer_id2') ?>

    <?php // echo $form->field($model, 'lease_rate2') ?>

    <?php // echo $form->field($model, 'runtime_id3') ?>

    <?php // echo $form->field($model, 'down_payment3') ?>

    <?php // echo $form->field($model, 'kilometer_id3') ?>

    <?php // echo $form->field($model, 'lease_rate3') ?>

    <?php // echo $form->field($model, 'runtime_id4') ?>

    <?php // echo $form->field($model, 'down_payment4') ?>

    <?php // echo $form->field($model, 'kilometer_id4') ?>

    <?php // echo $form->field($model, 'lease_rate4') ?>

    <?php // echo $form->field($model, 'private_runtime_id1') ?>

    <?php // echo $form->field($model, 'private_deposit1') ?>

    <?php // echo $form->field($model, 'private_kilometer_id1') ?>

    <?php // echo $form->field($model, 'private_lease_rate1') ?>

    <?php // echo $form->field($model, 'private_runtime_id2') ?>

    <?php // echo $form->field($model, 'private_deposit2') ?>

    <?php // echo $form->field($model, 'private_kilometer_id2') ?>

    <?php // echo $form->field($model, 'private_lease_rate2') ?>

    <?php // echo $form->field($model, 'private_runtime_id3') ?>

    <?php // echo $form->field($model, 'private_advance_payment3') ?>

    <?php // echo $form->field($model, 'private_kilometer_id3') ?>

    <?php // echo $form->field($model, 'private_lease_rate3') ?>

    <?php // echo $form->field($model, 'private_runtime_id4') ?>

    <?php // echo $form->field($model, 'private_advance_payment4') ?>

    <?php // echo $form->field($model, 'private_kilometer_id4') ?>

    <?php // echo $form->field($model, 'private_lease_rate4') ?>

    <?php // echo $form->field($model, 'special_text') ?>

    <?php // echo $form->field($model, 'private_special_text') ?>

    <?php // echo $form->field($model, 'business_special_text') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
