<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Email */
?>
<div class="email-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'owner',
            'attachment',
            'body:ntext',
            'created_at',
        ],
    ]) ?>

</div>
