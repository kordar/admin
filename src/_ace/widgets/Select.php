<?php
namespace kordar\yak\_ace\widgets;

use kordar\yak\_ace\assets\plugins\form\ChosenAsset;
use yii\helpers\Html;

class Select extends \kordar\yak\widgets\YakWidget
{
    public function render()
    {
        // TODO: Implement render() method.
        switch ($this->widget->type) {
            case 'chosen':
                return $this->renderChosen();

            default:
                return $this->renderDefault();
        }
    }

    protected function renderDefault()
    {
        return Html::activeDropDownList($this->widget->model, $this->widget->attribute, $this->widget->items, []);
    }

    public function renderChosen()
    {
        // TODO: Implement render() method.

        ChosenAsset::register($this->widget->view);

        $this->widget->view->registerJs('if(!ace.vars[\'touch\']) {
            $(\'.chosen-select\').chosen({allow_single_deselect:true}); 
            //resize the chosen on window resize
    
            $(window)
            .off(\'resize.chosen\')
            .on(\'resize.chosen\', function() {
                $(\'.chosen-select\').each(function() {
                     var $this = $(this);
                     $this.next().css({\'width\': $this.parent().width()});
                })
            }).trigger(\'resize.chosen\');
            //resize chosen on sidebar collapse/expand
            $(document).on(\'settings.ace.chosen\', function(e, event_name, event_val) {
                if(event_name != \'sidebar_collapsed\') return;
                $(\'.chosen-select\').each(function() {
                     var $this = $(this);
                     $this.next().css({\'width\': $this.parent().width()});
                })
            });
		}');

        $options = ['class' => 'chosen-select form-control'];

        if ($this->config['multiple']) {
            $options['multiple'] = 'multiple';
        }

        if ($this->config['data-placeholder']) {
            $options['data-placeholder'] = $this->config['data-placeholder'];
        }

        return Html::activeDropDownList($this->widget->model, $this->widget->attribute, $this->widget->items, $options);
    }
}