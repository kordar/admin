<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \frontend\modules\wechat\models\Material */
/* @var $attribute string */
/* @var $id string */
/* @var $filename string */
/* @var $deleteUrl string */
/* @var $uploadUrl string */
/* @var $width string */

\kordar\yak\assets\BootstrapFileInputAsset::register($this);
\kordar\yak\assets\ace\plugins\tools\BootboxAsset::register($this);

echo Html::activeInput('file', $model, $attribute, [
    'id' => $id, 'data-browse-on-zone-click' => 'true', 'name' => $filename
]);

echo Html::activeHiddenInput($model, 'media_id',  ['id' => $id . '-id']);
echo Html::activeHiddenInput($model, 'media_url', ['id' => $id . '-url']);
echo Html::activeHiddenInput($model, 'size', ['id' => $id . '-size']);
echo Html::activeHiddenInput($model, 'type', ['value' => 'video']);

$js = <<<JS

    $('#{$id}').fileinput({
        theme: 'fa',
        language: 'zh',
        uploadUrl: '{$uploadUrl}',
        showBrowse : false,     //是否显示上传前的上传按钮
        showCaption: false,
        showClose : false,      //显示右上角X关闭
        showRemove : false,     //显示移除按钮,跟随文本框的那个
        showUpload : false,     //是否显示上传后的按钮
        allowedFileExtensions: ['mp4'],
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        layoutTemplates : {
            actionDelete: '',
        },
        initialPreview: [
            "{$model->media_url}",
        ],
        initialPreviewConfig: [
            {caption: "{$model->title}", size: "{$model->size}", width: "{$width}", url: "{$deleteUrl}", key: "{$model->media_id}"}
        ],
        uploadExtraData: function () {
            title = $('#{$id}-title').val()
            desc = $('#{$id}-desc').val()
            return {'type': 'video', 'title': title, 'desc': desc};
        }
    }).on('fileuploaded', function(event, data, previewId, index) {
        if (data.response.status === 'success') {
            $('#{$id}-id').val(data.response.mediaId);
            $('#{$id}-url').val(data.response.mediaUrl);
            $('#{$id}-size').val(data.response.mediaSize);
        } else {
            bootbox.alert(data.response.message);
        }
     }).on("filebatchselected", function(event, files) {
         setTitleValue();
         setDescValue();
         $(this).fileinput("upload");
     });

    setTitleValue = function () {
        value = $('#{$id}-title').val();
        while (!value) {
            value = prompt('请设置标题信息');
            $('#{$id}-title').val(value)
        }
    }
    
    setDescValue = function () {
        value = $('#{$id}-desc').val();
        while (!value) {
            value = prompt('请设置描述信息');
            $('#{$id}-desc').val(value)
        }
    }

JS;

$this->registerJs($js);

?>

<div class="form-group">
    <label class="control-label" for="book-number">描述</label>
    <?= Html::activeInput('text', $model, 'title',  ['id' => $id . '-title', 'class' => 'form-control'])?>
    <div class="help-block"></div>
</div>

<div class="form-group">
    <label class="control-label" for="book-number">详情</label>
    <?= Html::activeTextarea($model, 'desc',  ['id' => $id . '-desc', 'class' => 'form-control', 'rows' => 5])?>
    <div class="help-block"></div>
</div>








