<?php
$this->breadcrumbs=array(
	'Self Introductions'=>array('index'),
	$model->intro_id,
);

$this->menu=array(
	array('label'=>'自我介绍列表','url'=>array('index')),
	array('label'=>'新建自我介绍','url'=>array('create')),
	array('label'=>'更新自我介绍','url'=>array('update','id'=>$model->intro_id)),
	array('label'=>'删除自我介绍','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->intro_id),'confirm'=>'确定要删除这条自我介绍?')),
	array('label'=>'管理自我介绍','url'=>array('admin')),
);
?>

<h1>自我介绍<?php //echo $model->intro_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'self_introduction',
	),
)); ?>
<h2>评论</h2>
<?php
/*$this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$dataProvider,
    'type'=>'striped bordered condensed',
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'posterName', 'header'=>'评论人'),
        array('name'=>'content', 'header'=>'评论内容'),
        array('name'=>'time', 'header'=>'评论时间'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
            'header'=>'操作',
        ),
    ),
)) */?>



<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_viewcomment',
)); ?>