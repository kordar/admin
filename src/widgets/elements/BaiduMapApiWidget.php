<?php
namespace kordar\yak\widgets\elements;

use kordar\yak\assets\BootboxAsset;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class BaiduMapApiWidget extends InputWidget
{
    public function run()
    {
        $this->value = empty($this->value) ? '121.483523,31.232917' : $this->value;
        $point = explode(',', $this->value);
        
        $this->view->registerJsFile('http://api.map.baidu.com/api?v=3.0&ak=jUVd3oaGbD86rUATnRKs1PoQZESKsqGM');
        BootboxAsset::register($this->view);
        
        $mapId = $this->id . '-map';
        
        echo Html::activeInput('text', $this->model, $this->attribute, [
            'id' => $this->id, 'value' => $this->value,
            'class' => 'form-control', 'readonly' => true
        ]);
        
        echo '<div id="' . $mapId . '" style="width: 100%; height: 400px"></div>';
        
        $js = <<<JS
        
        var map = new BMap.Map("{$mapId}");    // 创建Map实例
        map.centerAndZoom(new BMap.Point({$point[0]},{$point[1]}), 15);  // 初始化地图,设置中心点坐标和地图级别
        //添加地图类型控件
        map.addControl(new BMap.MapTypeControl({
            mapTypes:[
                BMAP_NORMAL_MAP,
                BMAP_HYBRID_MAP
            ]}));
        map.setCurrentCity("上海");          // 设置地图显示的城市 此项是必须设置的
        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        
        var point = new BMap.Point({$point[0]},{$point[1]});
        map.centerAndZoom(point, 15);
        var marker = new BMap.Marker(point);        // 创建标注
        map.addOverlay(marker);                     // 将标注添加到地图中
            
     
            map.addEventListener("click", function(e){
                
                $('#{$this->id}').val(e.point.lng + "," + e.point.lat);
                
                var point = new BMap.Point(e.point.lng, e.point.lat);
                map.centerAndZoom(point, 15);
                var marker = new BMap.Marker(point);        // 创建标注
                map.addOverlay(marker);                     // 将标注添加到地图中
                
                bootbox.alert({
                    title: '提示',
                    message: '成功设置新机柜坐标: ' + e.point.lng + ', ' + e.point.lat
                });
                
            });
JS;
        
        $this->view->registerJs($js);
    }
}