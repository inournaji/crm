<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthRule */
?>
<div class="auth-rule-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'data:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
