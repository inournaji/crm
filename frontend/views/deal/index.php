<?php
use common\helpers\Constants;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Deals');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
\yii2mod\alert\AlertAsset::register($this);


/*$this->registerJs(
    '$("document").ready(function(){
    $.pjax.defaults.timeout = false;
    setInterval(function(){
                $.pjax.reload({container:"#deal-grid"});
        }
        ,3000);

});'
);*/
?>
<div class="deal-index">
    <div id="ajaxCrudDatatable">
        <?php \yii\widgets\Pjax::begin(['id' => 'deal-grid']) ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'bordered' => false,
            'headerRowOptions' => ['class' => 'hidden'],
            'columns' => [
                [
                    'attribute' => 'source.icon',
                    'format' => 'html',
                    'label' => \Yii::t('app', 'Icon'),
                    'value' => function ($data) {
                        if ($data->source_id != null)
                            return Html::img(Yii::$app->homeUrl . $data->source->icon,
                                ['width' => '60px']);
                    },
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function ($data) {
                        return date("Y-m-d", $data->created_at);
                    },
                ],
                [
                    'attribute' => 'model',
                    'value' => function ($data) {
                        return $data->model . " / " . $data->km . " / " . $data->km . " / " . $data->validity;
                    },
                ],
                [
                    'attribute' => 'customer.name',
                    'label' => \Yii::t('app', 'Customer'),
                    'value' => function ($data) {
                        return $data->customer->fname . " " . $data->customer->lname;
                    },
                ],
                [
                    'attribute' => 'customer.company',
                    'label' => \Yii::t('app', 'Company'),
                    'value' => 'customer.company'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{can_call} {waiting_customer} {credit_card} {bank} {contract}',
                    'buttons' => [
                        'can_call' => function ($url, $model) {
                            $icon = ($model->customer->accept_calling) ? "phone-green.png" : "phone-red.png";
                            return Html::img(Yii::$app->urlManager->baseUrl . "/css/images/" . $icon, [
                                'width' => '50px'
                            ]);
                        },
                        'waiting_customer' => function ($url, $model) {
                            $img = Html::img(Yii::$app->urlManager->baseUrl . "/css/images/" . $model->getDealStatusIcon(Constants::STATUS_WAITING_CUSTOMER, $enabled), [
                                'width' => '50px'
                            ]);
                            if ($enabled)
                                return Html::a($img, "javascript:void(0)", [
                                    'title' => Yii::t('app', 'Customer Attachment'),
                                    'onclick' => '
                                        swal({
                                                title: "Are you sure you want to send and email to the customer to upload his/her credit card info",
                                                type: "info",
                                                showCancelButton: true,
                                                confirmButtonColor: "#41b9be",
                                                confirmButtonText: "Yes",
                                                cancelButtonText: "No",
                                                closeOnConfirm: false,
                                                allowOutsideClick: true,
                                                showLoaderOnConfirm: true,
                                            },
                                            function(){
                                             sendEmail(' . $model->id . ');
                                            }
                                        );'
                                ]);
                            return $img;
                        },
                        'credit_card' => function ($url, $model) {
                            $img = Html::img(Yii::$app->urlManager->baseUrl . "/css/images/" . $model->getDealStatusIcon(Constants::STATUS_WAITING_CREDIT_CARD, $enabled), [
                                'width' => '50px'
                            ]);
                            if ($enabled)
                                return Html::a($img, "javascript:void(0)", [
                                    'title' => Yii::t('app', 'Credit Card'),
                                    'onclick' => '
                                        swal({
                                                title: "Please confirm that the credit card information is right",
                                                type: "info",
                                                showCancelButton: true,
                                                confirmButtonColor: "#41b9be",
                                                confirmButtonText: "OK",
                                                closeOnConfirm: false,
                                                allowOutsideClick: true,
                                                showLoaderOnConfirm: true,
                                            },
                                            function(){
                                                changeStatus(' . $model->id . ',' . Constants::STATUS_WAITING_BANK . ');
                                            }
                                        );'
                                ]);
                            return $img;
                        },
                        'bank' => function ($url, $model) {
                            $img = Html::img(Yii::$app->urlManager->baseUrl . "/css/images/" . $model->getDealStatusIcon(Constants::STATUS_WAITING_BANK, $enabled), [
                                'width' => '50px'
                            ]);
                            if ($enabled)
                                return Html::a($img, "javascript:void(0)", [
                                    'title' => Yii::t('app', 'Bank'),
                                    'onclick' => '
                                        swal({
                                                title: "Please confirm that the bank information is right",
                                                type: "info",
                                                showCancelButton: true,
                                                confirmButtonColor: "#41b9be",
                                                confirmButtonText: "OK",
                                                cancelButtonText: "No",
                                                closeOnConfirm: false,
                                                allowOutsideClick: true,
                                                showLoaderOnConfirm: true,
                                            },
                                            function(){
                                             changeStatus(' . $model->id . ',' . Constants::STATUS_WAITING_CONTRACT . ');
                                            }
                                        );'
                                ]);
                            return $img;
                        },
                        'contract' => function ($url, $model) {
                            $img = Html::img(Yii::$app->urlManager->baseUrl . "/css/images/" . $model->getDealStatusIcon(Constants::STATUS_WAITING_CONTRACT, $enabled), [
                                'width' => '50px'
                            ]);
                            if ($enabled)
                                return Html::a($img, "javascript:void(0)", [
                                    'title' => Yii::t('app', 'Contract'),
                                    'onclick' => '
                                        swal({
                                                title: "Please confirm that the contract is signed successfully",
                                                type: "info",
                                                showCancelButton: true,
                                                confirmButtonColor: "#41b9be",
                                                confirmButtonText: "OK",
                                                closeOnConfirm: false,
                                                allowOutsideClick: true,
                                                showLoaderOnConfirm: true,
                                            },
                                            function(){
                                             changeStatus(' . $model->id . ',' . Constants::STATUS_Done . ');
                                            }
                                        );'
                                ]);
                            return $img;
                        }
                    ],
                ],
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'width' => '50px',
                    'expandIcon' => '<span class="glyphicon glyphicon-option-vertical"></span>',
                    'collapseIcon' => '<span class="glyphicon glyphicon-option-horizontal">    </span>',
                    'value' => function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model, $key, $index, $column) {
                        return Yii::$app->controller->renderPartial('detail', ['model' => $model]);
                    },
                    'headerOptions' => ['class' => 'kartik-sheet-style'],
                    'expandOneOnly' => true
                ],
            ],
        ]); ?>
        <?php \yii\widgets\Pjax::end() ?>
    </div>
</div>
<script type="application/javascript">
    function changeStatus(id, status) {
        var ajaxurl = "<?php echo \yii\helpers\Url::to(['/deal/change-status']); ?>";
        $.ajax({
            url: ajaxurl,
            data: {
                'id': id,
                'status': status,
            },
            error: function () {
            },
            type: "POST",
            success: function (data) {
                swal("Your order has been updated successfully!");
            },
        });
    }

    function sendEmail(id) {
        var ajaxurl = "<?php echo \yii\helpers\Url::to(['/deal/send-email']); ?>";
        $.ajax({
            url: ajaxurl,
            data: {
                'id': id,
            },
            error: function () {
            },
            type: "POST",
            success: function (data) {
                swal("The email has been sent successfully!");
            },
        });
    }
</script>