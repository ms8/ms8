<style type="text/css">
    #company-map{height:400px;width:70%;float:left;border-right:2px solid #bcbcbc;}
    #company-result{height:400px;width:29%;float:left;}
</style>
<?php
/* @var $model PrepareForm */
Yii::app()->clientScript->registerScriptFile("http://api.map.baidu.com/api?v=1.5&ak=2fce860d4f8d37ec4e70626f59ccf9ca");
$this->breadcrumbs=array(
	'Prepares',
);
$this->menu= array(
    //array('label'=>'LIST HEADER'),

    array('label'=>'自我介绍', 'icon'=>'book', 'url'=>array('admin')),
    array('label'=>'站内信', 'icon'=>'pencil', 'url'=>array('create')),
    //array('label'=>'ANOTHER LIST HEADER'),
    array('label'=>'我关注的面试', 'icon'=>'user', 'url'=>'#'),
    array('label'=>'个人信息', 'icon'=>'cog', 'url'=>'#'),
);
if($dataCompany->rawData != "" && $dataCompany->rawData[0]["title"] != ""){
    array_unshift($this->menu,array('label'=>'我的面试', 'icon'=>'home', 'url'=>array('create')));
}else{
    array_unshift($this->menu,array('label'=>'我的面试', 'icon'=>'home', 'url'=>array('create'), 'active'=>true));
}
?>
<input type="hidden" name="company" id="company" value="<?php echo $company?>"/>
<input type="hidden" name="position" id="position" value="<?php echo $position?>"/>
<input type="hidden" name="prepareId" id="prepareId" value=""/>
<h1>
    <?php
    if($dataCompany->rawData != "" && $dataCompany->rawData[0]["title"] != ""){
        echo $company."_".$position;
    }else{
        echo "面试信息";
    }
    ?>
</h1>
<hr>
<h2>公司介绍</h2>
<div class="search-result">
<?php
$this->widget('bootstrap.widgets.TbListView',array(
//	'dataProvider'=>$dataProvider,
//    'itemView'=>'_view',
    'dataProvider'=>$dataCompany,
	'itemView'=>'_search2',
    "itemsCssClass"=>"row-fluid items",
    'template'=>'<div class="list company">{items}</div>',
));
/*$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$preparedata,
    'itemView'=>'_prepareview',
    "itemsCssClass"=>"row-fluid items",
    'template'=>'<div class="list">{items}</div>',
    'sorterCssClass'=>'sorter_container',//定义sorter的div容器的class
    'sorterHeader'=>'更改排序：',//定义的文字显示在sorter可排序属性的前面
    'sorterFooter'=>'',//定义的文字显示在sorter可排序属性的后面
));
*/
?>
</div>
    <h2>公司位置</h2>
    <div class="search-result">
        <div id="company-map" style="margin-bottom: 20px;"></div>
        <div id="company-result" style="margin-bottom: 20px;"></div>
    </div>
    <h2>薪酬待遇</h2>
    <div class="search-result">
<?php
if(!isset($dataRemuneration->rawData) || $dataRemuneration->rawData == ""){
    echo "没有找到数据";
}else{
    $this->widget('bootstrap.widgets.TbListView',array(
    //	'dataProvider'=>$dataProvider,
    //    'itemView'=>'_view',
        'dataProvider'=>$dataRemuneration,
        'itemView'=>'_search2',
        "itemsCssClass"=>"row-fluid items",
        'template'=>'<div class="list remuneration">{items}</div>',
    ));
}
?>
</div>
    <h2>笔试</h2>
    <div class="search-result">
<?php
if($dataPaperTest->rawData == ""){
    echo "没有找到数据";
}else{
    $this->widget('bootstrap.widgets.TbListView',array(
    //	'dataProvider'=>$dataProvider,
    //    'itemView'=>'_view',
        'dataProvider'=>$dataPaperTest,
        'itemView'=>'_search2',
        "itemsCssClass"=>"row-fluid items",
        'template'=>'<div class="list papertest">{items}</div>',
    ));
}
?>
</div>
    <h2>面试</h2>
    <div class="search-result">
<?php
if($dataCompany->rawData == ""){
    echo "没有找到数据";
}else{
    $this->widget('bootstrap.widgets.TbListView',array(
//	'dataProvider'=>$dataProvider,
//    'itemView'=>'_view',
        'dataProvider'=>$dataInterview,
        'itemView'=>'_search2',
        "itemsCssClass"=>"row-fluid items",
        'template'=>'<div class="list interview">{items}</div>',
    ));
    Yii::app()->clientScript->registerScript('collect', "
        $('#container ul').hover(
          function () {
           $('button',this).css('display','block');
          },
          function () {
             $('button',this).css('display','none');
          }
        );
        $('#container button').live('click',function(){
            var linkEle = $(this).prev().children('a'),linkEleHref = linkEle.attr('href'),linkEleText = linkEle.text();
            var type = linkEle.attr('type');
            var company = $('#company').val();
            var position = $('#position').val();
            var prepareId = $('#prepareId').val();
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{'url':linkEleHref,'title':linkEleText,'company':company,'position':position,'prepareId':prepareId,'type':type},
                url:'?r=prepare/save',
                success:function(json) {
                    var prepareId = json.prepareId;
                    $('#prepareId').val(prepareId);
                }
            });
        });
     ");
}
?>
    </div>
<script type="text/javascript">
     // 百度地图API功能
     var map = new BMap.Map("company-map");            // 创建Map实例
     map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
     var local = new BMap.LocalSearch(map, {
     renderOptions: {map: map, panel: "company-result"}
     });
     local.setPageCapacity(4);
     local.search("<?php echo $company?>");
</script>