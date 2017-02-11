<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
$attachment_link = Yii::$app->urlManager->createAbsoluteUrl(['deal/upload-attachment', 'id' => $model->id]);

?>
<div class="attahment">
    <p>Hello <?= Html::encode($model->customer->fname) ?>,</p>

    <p>Order Information</p>

    <p>Follow the link below to upload your credit card information:</p>

    <p><?= Html::a("Upload Attachment", $attachment_link) ?></p>
</div>
