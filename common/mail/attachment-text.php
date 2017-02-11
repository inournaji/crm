<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $user common\models\User */

$attachment_link = Yii::$app->urlManager->createAbsoluteUrl(['deal/upload-attachment', 'id' => $model->id]);

?>
    Hello <?= Html::encode($model->customer->fname) ?>,

    Order Information

    Follow the link below to upload your credit card information:

    <?= Html::a("Upload Attachment", $attachment_link) ?>
