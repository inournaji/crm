<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Deal */
?>
<div class="deal-view">
    <table class="detail-table" cellpadding="4" cellspacing="5">
        <tr class="header-tr">
            <th>
                <div class="padding">
                    Order Info
                </div>
            </th>
            <th>
                <div class="padding">
                    Customer Info
                </div>
            </th>
        </tr>
        <tr>
            <td>
                <div class="padding">
                    <?= DetailView::widget([
                        'model' => $model,
                        //'mode' => DetailView::MODE_EDIT,
                        'attributes' => [
                            [
                                'attribute' => 'vehicle_brand_id',
                                'value' => ($model->vehicle_brand_id != null) ? $model->brand->name : "",
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
            </td>
            <td>
                <div class="padding">
                    <?= DetailView::widget([
                        'model' => $model->customer,
                        //'mode' => DetailView::MODE_EDIT,
                        'attributes' => [
                            'fname',
                            'lname',
                            'email',
                            'company',
                            'salutation',
                            'houseno',
                            'tel',
                            'mobile',
                            'fax',
                            'bank',
                            'iban',



                        ]
                    ]); ?>
                </div>
            </td>
        </tr>
    </table>


</div>
