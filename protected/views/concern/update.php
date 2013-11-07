<?php
/* @var $this ConcernController */
/* @var $model Concern */

$this->breadcrumbs=array(
	'Concerns'=>array('index'),
	$model->concernID=>array('view','id'=>$model->concernID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Concern', 'url'=>array('index')),
	array('label'=>'Create Concern', 'url'=>array('create')),
	array('label'=>'View Concern', 'url'=>array('view', 'id'=>$model->concernID)),
	array('label'=>'Manage Concern', 'url'=>array('admin')),
);
?>

<h1>Update Concern <?php echo $model->concernID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>