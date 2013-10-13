<?php
$this->breadcrumbs=array(
	'Prepare Details'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List PrepareDetail','url'=>array('index')),
	array('label'=>'Create PrepareDetail','url'=>array('create')),
	array('label'=>'Update PrepareDetail','url'=>array('update','id'=>$model->detailID)),
	array('label'=>'Delete PrepareDetail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->detailID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrepareDetail','url'=>array('admin')),
);
?>

<h1>View PrepareDetail #<?php echo $model->detailID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'prepareID',
		'title',
		'url',
		'type',
		'detailID',
	),
)); ?>
