<?php
$this->breadcrumbs=array(
	'Prepares'=>array('index'),
	$model->prepareID,
);

$this->menu=array(
	array('label'=>'List Prepare','url'=>array('index')),
	array('label'=>'Create Prepare','url'=>array('create')),
	array('label'=>'Update Prepare','url'=>array('update','id'=>$model->prepareID)),
	array('label'=>'Delete Prepare','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->prepareID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prepare','url'=>array('admin')),
);
?>

<h1>View Prepare #<?php echo $model->prepareID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'prepareID',
		'userID',
		'companyName',
		'position',
		'time',
		'summary',
	),
)); ?>
