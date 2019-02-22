<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <span class="blue bigger-125">
                <i class="ace-icon fa fa-sitemap"></i>
            </span>
            <?= Html::encode($this->title)?>
        </h3>
    </div>

    <div class="card-body">
        <h3 class="lighter smaller"><?= nl2br(Html::encode($message)) ?>
            <br>
            <small>
                <?= $exception->getTraceAsString()?>
            </small></h3>

        <div>
            <form class="form-search">
												<span class="input-icon align-middle">
													<i class="ace-icon fa fa-search"></i>

													<input type="text" class="search-query" placeholder="Give it a search..." />
												</span>
                <button class="btn btn-sm" type="button">Go!</button>
            </form>

            <div class="space"></div>
            <h4 class="smaller">Traces Info:</h4>

            <ul class="list-unstyled spaced inline bigger-110 margin-15">
                <?php foreach ($exception->getTrace() as $trace):?>
                    <li>
                        <i class="ace-icon fa fa-hand-o-right blue"></i>
                        <?= $trace['file'] . '#' . $trace['line'] ?>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>

        <hr />
        <div class="space"></div>

        <div class="center">
            <!--<a href="javascript:history.back()" class="btn btn-grey">
                <i class="ace-icon fa fa-arrow-left"></i>
                Go Back
            </a>

            <a href="#" class="btn btn-primary">
                <i class="ace-icon fa fa-tachometer"></i>
                Dashboard
            </a>-->
        </div>
    </div>




</div>