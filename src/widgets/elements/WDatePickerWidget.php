<?php
namespace kordar\yak\widgets\elements;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class WDatePickerWidget extends InputWidget
{
	public $format = 'yyyy-MM-dd';
	
	protected $formatMap = [
		'yyyy-MM-dd HH:mm:ss' => 'Y-m-d H:i:s',
		'yyyy-MM-dd' => 'Y-m-d',
	];
	
	public function run()
	{
		\kordar\yak\assets\WDatePicketAsset::register($this->view);
		
		$this->value = empty($this->value) ? '' : date($this->formatMap[$this->format], $this->value);
		
		echo Html::activeInput('text', $this->model, $this->attribute, ['value'=>$this->value, 'class' => 'form-control', 'onclick'=>'WdatePicker({dateFmt:\'' . $this->format . '\'})']);
	}
}