<?php
$this->breadcrumbs=array(
	'Prepare Selves'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PrepareSelf','url'=>array('index')),
	array('label'=>'Create PrepareSelf','url'=>array('create')),
	array('label'=>'Update PrepareSelf','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PrepareSelf','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrepareSelf','url'=>array('admin')),
);
?>

<h1>View PrepareSelf #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'prepare_id',
		'interview',
		'exam',
	),
)); ?>
