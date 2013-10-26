<?php
/* @var $model PrepareForm */

$this->breadcrumbs=array(
	'Prepares',
);
    /*array(array(
   "id"=>1,
    "url"=>"http://www.baidu.com/link?url=V6weCqeXVf5XWzmAg64jIhIM-bVSFPPLhu48JcBlSYSg_zRFB7vEXXSWOnCaswjnYY6p52cElOvQmre3oPFLE_",
    "title"=>"华为技术有限公司_百度百科")
));*/
/*$this->menu=array(
	array('label'=>'我的面试','url'=>array('create')),
	array('label'=>'自我介绍','url'=>array('admin')),
    array('label'=>'站内信','url'=>array('create')),
    array('label'=>'我关注的面试','url'=>array('admin')),
    array('label'=>'个人信息','url'=>array('admin')),
);*/
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
<?php
/*$this->menu=array(
    array('label'=>'Section 1', 'content'=>'<p>I\'m in Section 1.</p>', 'active'=>true),
    array('label'=>'Section 2', 'content'=>'<p>Howdy, I\'m in Section 2.</p>'),
    array('label'=>'Section 3', 'content'=>'<p>What up girl, this is Section 3.</p>'),
);*/ ?>
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

