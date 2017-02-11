<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ViechleBrand */
?>
<div class="viechle-brand-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'status',
        ],
    ]) ?>

</div>
