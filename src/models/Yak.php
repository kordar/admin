<?php
namespace kordar\yak\models;

use kordar\yak\helpers\YakConfigHelper;
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
        return YakConfigHelper::config('db', 'db');
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