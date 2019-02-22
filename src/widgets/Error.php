<?php
namespace kordar\yak\widgets;

use kordar\yak\helpers\YakConfigHelper;

class Error extends \yii\bootstrap\Widget
{
    /**
     * @var
     */
    public $exception;

    public function run()
    {
        $config = YakConfigHelper::widgetConfig('page-error');
        return $this->render('error/_' . strtolower($GLOBALS['yak_sign']), [
            'exception' => $this->exception, 'config' => $config
        ]);
    }
}