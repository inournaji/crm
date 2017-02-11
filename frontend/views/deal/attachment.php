<?php
/**
 * Created by PhpStorm.
 * User: Amaney
 * Date: 2/10/2017
 * Time: 7:33 PM
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Attachment */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="attachment-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($attachment, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($attachment, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
            'showUpload' => false,
            'initialPreview' => [
                Html::img(Yii::$app->homeUrl . $attachment->file, [
                    'width' => '100px',
                    'height' => '100px',])
            ],
            'overwriteInitial' => true
        ]
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Create'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>