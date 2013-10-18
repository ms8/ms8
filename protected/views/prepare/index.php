
<?php
$this->breadcrumbs=array(
	'Prepares',
);

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
if(isset($information)){
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

<h1>
    <?php
    if(isset($information["title"])){
        echo $information["title"];
        $dataProvider = $information ;
    }else{
        echo "面试信息";
    }
    ?>
</h1>

<?php

$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_search2',
    "itemsCssClass"=>"row-fluid items",
    'template'=>'<div class="list">{items}</div>',
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
/*echo $information["url"];
echo $information["title"];*/
?>
