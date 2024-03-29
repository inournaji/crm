<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Car */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Car',
]) . $model->model;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
