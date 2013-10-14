<?php
$this->breadcrumbs=array(
	'Prepares'=>array('index'),
	$model->prepareID=>array('view','id'=>$model->prepareID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prepare','url'=>array('index')),
	array('label'=>'Create Prepare','url'=>array('create')),
	array('label'=>'View Prepare','url'=>array('view','id'=>$model->prepareID)),
	array('label'=>'Manage Prepare','url'=>array('admin')),
);
?>

<h1>Update Prepare <?php echo $model->prepareID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>