<?php
namespace kordar\yak\helpers;

/**
 * Class YakHelper
 * @package kordar\yak\helpers
 */
class YakHelper
{
    /**
     * @param $code
     * @param string $message
     * set Yii::$app->setFlash
     */
    public static function setFlash($code, $message = '')
    {
        \Yii::$app->session->setFlash($code, \Yii::t('ace.login', $message));
    }
}