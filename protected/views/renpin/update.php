<?php
$this->breadcrumbs=array(
	'Renpins'=>array('index'),
	$model->renpinID=>array('view','id'=>$model->renpinID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Renpin','url'=>array('index')),
	array('label'=>'Create Renpin','url'=>array('create')),
	array('label'=>'View Renpin','url'=>array('view','id'=>$model->renpinID)),
	array('label'=>'Manage Renpin','url'=>array('admin')),
);
?>

<h1>Update Renpin <?php echo $model->renpinID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>