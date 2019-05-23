<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \frontend\modules\wechat\models\Articles */
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

echo Html::activeHiddenInput($model, 'thumb_media_id',  ['id' => $id . '-id']);
echo Html::activeHiddenInput($model, 'thumb_media_url', ['id' => $id . '-url']);
echo Html::activeHiddenInput($model, 'type', ['value' => 'image']);

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
        allowedFileExtensions: ['bmp','png','jpeg','jpg','gif'],
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        layoutTemplates : {
            actionDelete: '',
        },
        initialPreview: [
            "{$model->thumb_media_url}",
        ],
        initialPreviewConfig: [
            {caption: "封面图片", size: "0", width: "{$width}", url: "", key: "{$model->thumb_media_id}"}
        ],
        uploadExtraData: function () {
            return {'type': 'image'};
        }
    }).on('fileuploaded', function(event, data, previewId, index) {
        if (data.response.status === 'success') {
            $('#{$id}-id').val(data.response.mediaId);
            $('#{$id}-url').val(data.response.mediaUrl);
        } else {
            bootbox.alert(data.response.message);
        }
     }).on("filebatchselected", function(event, files) {
         $(this).fileinput("upload");
     });

JS;

$this->registerJs($js);

?>







