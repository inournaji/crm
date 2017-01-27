<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
?>
<div class="customer-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fname',
            'lname',
            'email:email',
            'salutation',
            'houseno',
            'postal',
            'city',
            'company',
            'tel',
            'mobile',
            'fax',
            'free_text',
            'bank',
            'iban',
            'bic',
            'account_owner',
            'facebook',
            'attachment',
            'type',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
