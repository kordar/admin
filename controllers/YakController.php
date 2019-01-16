<?php
namespace kordar\yak\controllers;

class YakController extends \yii\web\Controller
{
    public function init()
    {
        $template = 'ace';

        $this->layout = '@kordar/yak/views/layouts/' . $template . '/main.php';
    }
}