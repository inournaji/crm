<?php
/**
 * Created by PhpStorm.
 * User: Amaney
 * Date: 2/10/2017
 * Time: 7:27 PM
 */

namespace common\helpers;


class GeneralHelper
{
    public static function getTempFolderPath()
    {
        $temp_path = \Yii::$app->basePath . DIRECTORY_SEPARATOR . "temp" . DIRECTORY_SEPARATOR;
        return $temp_path;
    }

    public static function getUploadFolderPath()
    {
        return \Yii::$app->basePath . DIRECTORY_SEPARATOR . "web" . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR;
    }
}