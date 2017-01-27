<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Attachment */
?>
<div class="attachment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'file',
            'type',
        ],
    ]) ?>

</div>
