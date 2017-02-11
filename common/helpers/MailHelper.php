<?php
namespace common\helpers;

/**
 * Created by PhpStorm.
 * User: Amaney
 * Date: 2/10/2017
 * Time: 6:57 PM
 */
class MailHelper
{
    public static function sendEmail($model, $to_email, $from_email, $sender_name, $subject, $template_name)
    {
        return \Yii::$app->mailer->compose(
            ['html' => $template_name . '-html', 'text' => $template_name. '-text'],
            ['model' => $model]
            )
            ->setTo($to_email)
            ->setFrom([$from_email => $sender_name])
            ->setSubject($subject)
            ->send();
    }
}