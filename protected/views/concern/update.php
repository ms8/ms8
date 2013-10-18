<?php
$this->breadcrumbs=array(
	'Concerns'=>array('index'),
	$model->userID=>array('view','id'=>$model->userID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Concern','url'=>array('index')),
	array('label'=>'Create Concern','url'=>array('create')),
	array('label'=>'View Concern','url'=>array('view','id'=>$model->userID)),
	array('label'=>'Manage Concern','url'=>array('admin')),
);
?>

<h1>Update Concern <?php echo $model->userID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>