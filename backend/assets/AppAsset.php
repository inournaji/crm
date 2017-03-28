<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'romdim\bootstrap\material\BootMaterialCssAsset',
        'romdim\bootstrap\material\BootMaterialJsAsset'
    ];


    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

}
