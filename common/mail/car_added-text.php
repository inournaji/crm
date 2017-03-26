<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $user common\models\User */

$link = Yii::$app->urlManager->createAbsoluteUrl(['car/edit', 'id' => $model->id]);

?>
    Hello,

    A new car is added

    Follow the link below to check it and approve:

    <?= Html::a("Approve", $link) ?>
