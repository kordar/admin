<?php
namespace kordar\yak\widgets\elements;

/**
 * Class Modal
 * @package kordar\yak\widgets\elements
 * @item *:Modal
 */
class Modal extends \yii\bootstrap\Widget
{
    /**
     * @var
     */
    public $id;

    /**
     * @var string
     */
    public $header = '';

    /**
     * @var string
     */
    public $body = '';

    /**
     * @var string
     */
    public $footer = '';

    /**
     * @var null
     */
    public $js = null;

    public function run()
    {
        if ($this->js) $this->view->registerJs($this->js);
        return strtr('<div class="modal fade" id="{id}"><div class="modal-dialog"><div class="modal-content">{header}{body}{footer}</div></div></div>', [
            '{id}' => $this->id, '{header}' => $this->renderHeader(), '{body}' => $this->renderBody(), '{footer}' => $this->renderFooter()
        ]);
    }

    protected function renderHeader()
    {
        return strtr('<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="{id}">{title}</h4>
                    </div>', ['{title}' => $this->header, '{id}' => $this->id . '-title']);
    }

    protected function renderBody()
    {
        return '<div class="modal-body" id="' . $this->id . '-body">' . $this->body . '</div>';
    }

    protected function renderFooter()
    {
        return $this->footer ? '<div class="modal-footer">' . $this->footer . '</div>' : '';
//        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
//                        <button type="button" class="btn btn-primary yak-modal-submit">提交</button>
    }

}