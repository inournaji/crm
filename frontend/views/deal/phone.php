<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Deal */
?>
<div class="deal-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'brand',
            'model',
            'description:ntext',
            'km',
            'operation_date',
            'deposit',
            'price',
            'validity',
            'type',
            'link',
            'features:ntext',
            'attachment',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
