<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\AuthItem::find()->all(), 'name', 'name'),
        'options' => ['placeholder' => 'Select Role'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Select User'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
