<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\helpers\ListHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Car */
/* @var $form yii\widgets\ActiveForm */

$class_4 = "form-group col-lg-4 col-xs-12";
$class_12 = "form-group col-lg-12 col-xs-12";
$class_6 = "form-group col-lg-6 col-xs-12";
$class_8 = "form-group col-lg-8 col-xs-12";
?>
<style>
    .form-control {
        border: 1px solid #ccc !important;
        box-shadow: none !important;
        border-radius: 4px !important;
    }

    input.form-control {
        height: 34px !important;
    }
</style>
<div class="car-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Vehicle data", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
        'options' => ['class' => 'col-12 panel']
    ]); ?>

    <?= $form->field($model, 'seller_id', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getSellerList(),
        'options' => ['placeholder' => 'Select Seller'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'model', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_age_id', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getVehicleAgeList(),
        'options' => ['placeholder' => 'Select Vehicle Age', 'onchange' => 'hideNeuwagenFields()'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'kw', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ps', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'transmission_id', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getTransmissionList(),
        'options' => ['placeholder' => 'Select Transmission'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'fuel_type_id', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getFuelTypeList(),
        'options' => ['placeholder' => 'Select Fuel Type'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'highlight1', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highlight2', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highlight3', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highlight4', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motorization', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipment_line', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Equipment", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= $form->field($model, 'description', ['options' => ['class' => $class_12]])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'available_color1', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'available_color2', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'available_color3', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_colors_available', ['options' => ['class' => $class_4]])->radioList(ListHelper::getYesNo()) ?>

    <?= $form->field($model, 'color_interior', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true]) ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Images", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>

    <?= $form->field($model, 'picture_tmp1')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
            'showUpload' => false,
            'initialPreview' => ($model->picture1 == null) ? "" : [
                Html::img(Yii::$app->homeUrl . $model->picture1, [
                    'width' => '100px',
                    'height' => '100px',])
            ],
            'overwriteInitial' => true
        ]
    ]); ?>

    <?= $form->field($model, 'picture_tmp2')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
            'showUpload' => false,

            'initialPreview' => ($model->picture2 == null) ? "" : [
                Html::img(Yii::$app->homeUrl . $model->picture2, [
                    'width' => '100px',
                    'height' => '100px',])
            ],
            'overwriteInitial' => true
        ]
    ]); ?>

    <?= $form->field($model, 'picture_tmp3')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
            'showUpload' => false,
            'initialPreview' => ($model->picture3 == null) ? "" : [

                Html::img(Yii::$app->homeUrl . $model->picture3, [
                    'width' => '100px',
                    'height' => '100px',])
            ],
            'overwriteInitial' => true
        ]
    ]); ?>

    <?= $form->field($model, 'picture_tmp4')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
            'showUpload' => false,
            'initialPreview' => ($model->picture4 == null) ? "" : [
                Html::img(Yii::$app->homeUrl . $model->picture4, [
                    'width' => '100px',
                    'height' => '100px',])
            ],
            'overwriteInitial' => true
        ]
    ]); ?>

    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Consumption Data", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= $form->field($model, 'consumption_in_town', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'consumption_outside', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'consumption', ['options' => ['class' => $class_4]])->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'co2_emmission_komb', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'pollutant_class_id', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getPollutantClassList(),
        'options' => ['placeholder' => 'Select Pollutant Class'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Additional information for year cars", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default,
        'options' => ['class' => 'panel neu']

    ]); ?>
    <?= $form->field($model, 'jw_year', ['options' => ['class' => $class_6]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jw_kilometers', ['options' => ['class' => $class_6]])->textInput() ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Offer data", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= $form->field($model, 'offer_for_business_customers', ['options' => ['class' => $class_4]])->radioList(ListHelper::getYesNo()) ?>

    <?= $form->field($model, 'offer_for_private_customers', ['options' => ['class' => $class_4]])->radioList(ListHelper::getYesNo()) ?>

    <?= $form->field($model, 'is_vehicle_in_stock', ['options' => ['class' => $class_4]])->radioList(ListHelper::getYesNo()) ?>

    <?= $form->field($model, 'change_to_config_possible', ['options' => ['class' => $class_4]])->radioList(ListHelper::getYesNo()) ?>

    <?= $form->field($model, 'pickup_ex_works_possible', ['options' => ['class' => $class_8 . " in_stock"]])->radioList(ListHelper::getYesNo()) ?>

    <?= $form->field($model, 'leasing_type_id', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getLeasingTypeList(),
        'options' => ['placeholder' => 'Select Leasing Type'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'price_per_kilometer', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'short_term', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'features', ['options' => ['class' => $class_12]])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'list_price_net', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'available_amount', ['options' => ['class' => $class_4]])->textInput() ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Additional services", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= $form->field($model, 'transfer_cost_of_car_house', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'provision_ex_factory', ['options' => ['class' => $class_4 . " in_stock pickup"]])->textInput() ?>

    <?= $form->field($model, 'maintenance_and_wear', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'insurance', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'nationwide_delivery', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'admission_costs', ['options' => ['class' => $class_4]])->textInput() ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Additional information for private customers", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default,
        'options' => ['class' => 'panel private-panel']
    ]); ?>

    <?= $form->field($model, 'interest_rate', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'effective_interest_rate', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'net_loan_amount', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'total_amount', ['options' => ['class' => $class_4]])->textInput() ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Prices", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= $form->field($model, 'same_prices_for_business_private', ['options' => ['class' => $class_12]])->radioList(ListHelper::getYesNo()) ?>

    <?= $form->field($model, 'runtime_id1', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getRuntimeList(),
        'options' => ['placeholder' => 'Select Runtime'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'down_payment1', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'kilometer_id1', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getKilometerList(),
        'options' => ['placeholder' => 'Select Kilometer'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'lease_rate1', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'runtime_id2', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getRuntimeList(),
        'options' => ['placeholder' => 'Select Runtime'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'down_payment2', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'kilometer_id2', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getKilometerList(),
        'options' => ['placeholder' => 'Select Kilometer'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'lease_rate2', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'runtime_id3', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getRuntimeList(),
        'options' => ['placeholder' => 'Select Runtime'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?= $form->field($model, 'down_payment3', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'kilometer_id3', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getKilometerList(),
        'options' => ['placeholder' => 'Select Kilometer'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'lease_rate3', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'runtime_id4', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getRuntimeList(),
        'options' => ['placeholder' => 'Select Runtime'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?= $form->field($model, 'down_payment4', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'kilometer_id4', ['options' => ['class' => $class_4]])->widget(Select2::classname(), [
        'data' => ListHelper::getKilometerList(),
        'options' => ['placeholder' => 'Select Kilometer'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'lease_rate4', ['options' => ['class' => $class_4]])->textInput() ?>

    <?= $form->field($model, 'private_runtime_id1', ['options' => ['class' => $class_4 . " private"]])->widget(Select2::classname(), [
        'data' => ListHelper::getRuntimeList(),
        'options' => ['placeholder' => 'Select Runtime'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'private_deposit1', ['options' => ['class' => $class_4 . " private"]])->textInput() ?>

    <?= $form->field($model, 'private_kilometer_id1', ['options' => ['class' => $class_4 . " private"]])->widget(Select2::classname(), [
        'data' => ListHelper::getKilometerList(),
        'options' => ['placeholder' => 'Select Kilometer'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'private_lease_rate1', ['options' => ['class' => $class_4 . " private"]])->textInput() ?>

    <?= $form->field($model, 'private_runtime_id2', ['options' => ['class' => $class_4 . " private"]])->widget(Select2::classname(), [
        'data' => ListHelper::getRuntimeList(),
        'options' => ['placeholder' => 'Select Runtime'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?= $form->field($model, 'private_deposit2', ['options' => ['class' => $class_4 . " private"]])->textInput() ?>

    <?= $form->field($model, 'private_kilometer_id2', ['options' => ['class' => $class_4 . " private"]])->widget(Select2::classname(), [
        'data' => ListHelper::getKilometerList(),
        'options' => ['placeholder' => 'Select Kilometer'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?= $form->field($model, 'private_lease_rate2', ['options' => ['class' => $class_4 . " private"]])->textInput() ?>

    <?= $form->field($model, 'private_runtime_id3', ['options' => ['class' => $class_4 . " private"]])->widget(Select2::classname(), [
        'data' => ListHelper::getRuntimeList(),
        'options' => ['placeholder' => 'Select Runtime'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?= $form->field($model, 'private_advance_payment3', ['options' => ['class' => $class_4 . " private"]])->textInput() ?>

    <?= $form->field($model, 'private_kilometer_id3', ['options' => ['class' => $class_4 . " private"]])->widget(Select2::classname(), [
        'data' => ListHelper::getKilometerList(),
        'options' => ['placeholder' => 'Select Kilometer'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?= $form->field($model, 'private_lease_rate3', ['options' => ['class' => $class_4 . " private"]])->textInput() ?>

    <?= $form->field($model, 'private_runtime_id4', ['options' => ['class' => $class_4 . " private"]])->widget(Select2::classname(), [
        'data' => ListHelper::getRuntimeList(),
        'options' => ['placeholder' => 'Select Runtime'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?= $form->field($model, 'private_advance_payment4', ['options' => ['class' => $class_4 . " private"]])->textInput() ?>

    <?= $form->field($model, 'private_kilometer_id4', ['options' => ['class' => $class_4 . " private"]])->widget(Select2::classname(), [
        'data' => ListHelper::getKilometerList(),
        'options' => ['placeholder' => 'Select Kilometer'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>
    <?= $form->field($model, 'private_lease_rate4', ['options' => ['class' => $class_4 . " private"]])->textInput() ?>
    <?php \amass\panel\Panel::end(); ?>
    <?php \amass\panel\Panel::begin([
        //'title' => true, // show header or false not showing
        'headerTitle' => "Additional Information", // Title text can use tag
        'content' => '', // some content in body
        'footer' => false, // show footer or false not showing
        'type' => true, // get style for panel \amass\panel::TYPE_DEFAULT  default
    ]); ?>
    <?= $form->field($model, 'special_text', ['options' => ['class' => 'private-no']])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'private_special_text', ['options' => ['class' => 'private-yes']])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'business_special_text', ['options' => ['class' => 'private-yes']])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operation')->hiddenInput()->label(false); ?>
    <?php \amass\panel\Panel::end(); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Approve'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php

        if (!$model->isNewRecord) {
            echo Html::submitButton(Yii::t('app', 'Decline'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'onclick' => "setOperation()"]);
        } ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="application/javascript">
    $(document).ready(function () {
        ShowHideFields();
        ShowHideFieldsOnChange();
        hideNeuwagenFields();

        // save ps as 1.36 kw
        $('#car-kw').on('input',function(e){
            var kw = jQuery('#car-kw').val();
            if(jQuery.isNumeric(kw))
                jQuery('#car-ps').val(kw * 1.36);
            else
                jQuery('#car-ps').val('');
        });
        // calculate consumtion
        jQuery('#car-consumption_outside,#car-consumption_in_town').on('input',function(e){
            var in_town = jQuery.isNumeric(jQuery('#car-consumption_in_town').val())? parseInt(jQuery('#car-consumption_in_town').val()) : 0;
            var out_side =  jQuery.isNumeric(jQuery('#car-consumption_outside').val())? parseInt(jQuery('#car-consumption_outside').val()) : 0;

            if(in_town != 0 || out_side != 0)
                jQuery('#car-consumption').val(in_town+out_side);
            else
                jQuery('#car-consumption').val('');
        });
    });

    function setOperation() {
        var dec = "<?php echo \common\helpers\Constants::CAR_STATUS_DECLINED;?>";
        $("#car-operation").val(dec);
    }

    function ShowHideFieldsOnChange() {
        $('#car-same_prices_for_business_private :radio').change(function () {
            var val = $(this).val();
            if (val == 0) {
                $(".private").show();
            }
            else
                $(".private").hide();
        });

        $('#car-is_vehicle_in_stock :radio').change(function () {
            var val = $(this).val();
            if (val == 0) {
                $(".in_stock").show();
            }
            else
                $(".in_stock").hide();
        });

        $('#car-provision_ex_factory :radio').change(function () {
            var val = $(this).val();
            if (val == 0) {
                $(".pickup").show();
            }
            else
                $(".pickup").hide();
        });

        $('#car-offer_for_private_customers :radio').change(function () {
            var val = $(this).val();
            if (val == 1) {
                $(".private-panel").show();
                $(".private-yes").show();
                $(".field-car-same_prices_for_business_private").show();
                $(".private-no").hide();
            }
            else {
                $(".private-panel").hide();
                $(".private-yes").hide();
                $(".field-car-same_prices_for_business_private").hide();
                $(".private-no").show();
            }
        });


    }


    function ShowHideFields() {
        var val = "<?php echo $model->same_prices_for_business_private ?>";
        if (val == 0) {
            $(".private").show();
        }
        else
            $(".private").hide();

        var val_is_vehicle_in_stock = "<?php echo $model->is_vehicle_in_stock ?>";

        if (val_is_vehicle_in_stock == 0) {
            $(".in_stock").show();
        }
        else
            $(".in_stock").hide();

        var val_provision_ex_factory = "<?php echo $model->provision_ex_factory ?>";

        if (val_provision_ex_factory == 0) {
            $(".pickup").show();
        }
        else
            $(".pickup").hide();


        var val_offer_for_private_customers = "<?php echo $model->offer_for_private_customers ?>";

        if (val_offer_for_private_customers == 1) {
            $(".private-panel").show();
            $(".private-yes").show();
            $(".field-car-same_prices_for_business_private").show();
            $(".private-no").hide();
        }
        else {
            $(".private-panel").hide();
            $(".private-yes").hide();
            $(".field-car-same_prices_for_business_private").hide();
            $(".private-no").show();
        }
    }

    function hideNeuwagenFields() {

        var val = $('#car-vehicle_age_id').find(":selected").val();
        if (val == 1) {
            $(".neu").hide();
        }
        else {
            $(".neu").show();
        }
    }
</script>