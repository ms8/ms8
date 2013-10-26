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

<?php //$this->widget('bootstrap.widgets.TbListView',array(
	//'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
//)); ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$dataProvider,
    'type'=>'striped bordered condensed',
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'self_introduction', 'header'=>'自我介绍内容'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
            'header'=>'操作',
        ),
    ),
))  ?>
