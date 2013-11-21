<?php
$this->breadcrumbs=array(
	'Prepare Selves'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrepareSelf','url'=>array('index')),
	array('label'=>'Create PrepareSelf','url'=>array('create')),
	array('label'=>'View PrepareSelf','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PrepareSelf','url'=>array('admin')),
);
?>

<h1>Update PrepareSelf <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>