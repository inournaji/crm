<?php

use yii\widgets\DetailView;
use yii\bootstrap\Modal;

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
                <div id=<?php echo "deal-".$model->id."-".$model->customer_id ?> class="padding">
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
                            [
                                'attribute' => 'attachment_id',
                                'format' => "raw",
                                'value' => ($model->attachment_id != null) ?
                                     \yii\helpers\Html::a($model->attachment->name,
                                         \yii\helpers\Url::to(["/deal/download-attachment", "id" => $model->attachment_id],
                                         [
                                             'target' => "_blank",
                                             'data-pjax' => "0"
                                         ]))

                                    : "not uploaded yet",
                            ],
                            'features:ntext',
                            [
                                'attribute' => 'status',
                                'value' =>
                                    ($model->status == \common\helpers\Constants::STATUS_Done) ? $model->getStatusName() :
                                        \kartik\editable\Editable::widget([
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
                            [
                                'attribute' => 'is_active',
                                'label'=> "Active",
                                'value' => \kartik\editable\Editable::widget([
                                    'name' => "is_active",
                                    'value' => $model->is_active,
                                    'displayValue' => $model->getActiveName(),
                                    'asPopover' => false,
                                    'submitOnEnter' => false,
                                    'valueIfNull' => '-',
                                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                                    'data' => $model->getActiveList(),
                                ]),
                                'format' => "raw",
                            ],

                        ],
                    ]) ?>
                </div>
            </td>
            <td>
                <div id=<?php echo "deal-".$model->id ?> class="padding">
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
                            'postal',
                        ]
                    ]); ?>
                </div>
            </td>
        </tr>
    </table>


</div>
