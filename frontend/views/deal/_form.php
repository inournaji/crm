<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Deal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deal-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'brand')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\VehicleBrand::find(['status'=>1])->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Select brand'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'km')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operation_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deposit')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'validity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'features')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attachment')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
