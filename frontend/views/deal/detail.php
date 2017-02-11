<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Deal */
?>
<div class="deal-view">

    <?= DetailView::widget([
        'model' => $model,
        //'mode' => DetailView::MODE_EDIT,
        'attributes' => [
            [
                'attribute' => 'status',
                'displayOnly' => true,
            ],
            'description:ntext',
            'km',
            'operation_date',
            'deposit',
            'price',
            'validity',
            'type',
            'link',
            'features:ntext',
            [
                'attribute' => 'status',
                'value' => \kartik\editable\Editable::widget([
                    'name' => "status",
                    'value' => $model->status,
                    'displayValue' => $model->getStatusName(),
                    'asPopover' => false,
                    'submitOnEnter' => false,
                    'valueIfNull' => '-',
                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                    'data' => $model->getAllowedStatus($model->status),
                ]),
                'format' => "raw",
            ],

        ],
    ]) ?>

</div>
