<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */
?>
<div class="auth-item-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
        ],
    ]) ?>

</div>
