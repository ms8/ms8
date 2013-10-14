<?php
$this->breadcrumbs=array(
	'Renpins'=>array('index'),
	$model->renpinID,
);

$this->menu=array(
	array('label'=>'List Renpin','url'=>array('index')),
	array('label'=>'Create Renpin','url'=>array('create')),
	array('label'=>'Update Renpin','url'=>array('update','id'=>$model->renpinID)),
	array('label'=>'Delete Renpin','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->renpinID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Renpin','url'=>array('admin')),
);
?>

<h1>View Renpin #<?php echo $model->renpinID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'renpinID',
		'userID',
		'content',
		'time',
	),
)); ?>
