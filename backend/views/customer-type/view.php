<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerType */
?>
<div class="customer-type-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
        ],
    ]) ?>

</div>
