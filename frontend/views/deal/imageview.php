
<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;

Modal::begin(
    [
        'id' => 'imageview',
        'footer' => '<a href="#" class="btn btn-sm btn-primary" data-dismiss="modal">Close</a>',
    ]);
Html::img("/deal/download-attachment?id=".$id,['width'=>'500px']);
Modal::end();

/**
 * Created by PhpStorm.
 * User: user
 * Date: 02/03/2017
 * Time: 4:45 PM
 */