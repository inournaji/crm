<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Source */
?>
<div class="source-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
