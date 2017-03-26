<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
$link = Yii::$app->urlManager->createAbsoluteUrl(['car/edit', 'id' => $model->id]);

?>
<div class="attahment">
    <p>Hello</p>

    <p> A new car is added</p>

    <p> Follow the link below to check it and approve:</p>

    <p><?= Html::a("Approve", $link) ?></p>
</div>
