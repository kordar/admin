<?php

namespace kordar\yak;

use yii\i18n\I18N;
use yii\web\Response;

/**
 * yak module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'kordar\yak\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $config = require __DIR__ . '/config.php';
        \Yii::$app->setComponents($config['components']);

        // \Yii::$app->response->format = Response::FORMAT_HTML;
    }
}
