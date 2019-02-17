<?php

/* @var $this yii\web\View */
/* @var $code string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = \Yii::t('yak', 'Error Page');

?>

<div class="well">
    <h4 class="grey lighter smaller">
                                <span class="blue bigger-125">
                                    <i class="ace-icon fa fa-random"></i>
                                    <?= '#' . $code;?>
                                </span>

    </h4>

    <hr>
    <h5 class="lighter smaller">
        <i class="ace-icon fa fa-wrench icon-animated-wrench bigger-125"></i>
        <?= Html::encode($message)?>
    </h5>

    <div class="space"></div>

</div>

