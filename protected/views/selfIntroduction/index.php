<?php
$this->breadcrumbs=array(
	'自我介绍',
);

$this->menu=array(
	array('label'=>'新建自我介绍','url'=>array('create')),
	array('label'=>'管理自我介绍','url'=>array('admin')),
);
?>

<h1>自我介绍</h1>




<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$dataProvider,
    'type'=>'striped bordered condensed',
    'hideHeader'=>true,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'self_introduction','value'=>'mb_substr($data->self_introduction,0,100,"utf-8")."......"',),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
))  ?>
