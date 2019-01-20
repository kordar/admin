<?php
namespace kordar\yak\helpers;

use kordar\yak\models\Ace;
use kordar\yak\models\admin\User as Admin;

class LoggerHelper
{
    public static function setLogger($data)
    {
        Ace::getDb()->createCommand()->insert('{{%operate_logger}}', $data)->execute();
    }

    public static function writeLogger($logger = '')
    {
        if (empty($logger)) {
            return false;
        }

        /**
         * @var $identity Admin
         */
        $identity = \Yii::$app->user->identity;

        if (!empty($identity)) {
            $data = [
                'name' => $identity->getName(), 'ip' => \Yii::$app->request->getUserIP(),
                'url' => \Yii::$app->request->url, 'desc' => $logger, 'created_at' => time()
            ];
            self::setLogger($data);
        }

        return true;
    }

}