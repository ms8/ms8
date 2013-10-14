<?php
$this->breadcrumbs=array(
	'Concerns'=>array('index'),
	$model->userID,
);

$this->menu=array(
	array('label'=>'List Concern','url'=>array('index')),
	array('label'=>'Create Concern','url'=>array('create')),
	array('label'=>'Update Concern','url'=>array('update','id'=>$model->userID)),
	array('label'=>'Delete Concern','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->userID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Concern','url'=>array('admin')),
);
?>

<h1>View Concern #<?php echo $model->userID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'userID',
		'prepareID',
	),
)); ?>
