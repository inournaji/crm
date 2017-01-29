<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
?>
<div class="user-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
            'first_name',
            'last_name',
            'tel',
            'fax',
            'houseno',
            'postal',
            'city',
            'company',
            'short_id',
            'logo',
        ],
    ]) ?>

</div>
