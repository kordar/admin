<?php
namespace kordar\yak\models;

use kordar\yak\helpers\ConfigHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Yak extends ActiveRecord
{
    public static function getDb()
    {
        $sign = self::getDbSign();
        return \Yii::$app->get($sign);
    }

    public static function getDbSign()
    {
        return ConfigHelper::config('db', 'db');
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

}