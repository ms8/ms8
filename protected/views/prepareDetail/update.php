<?php
$this->breadcrumbs=array(
	'Prepare Details'=>array('index'),
	$model->title=>array('view','id'=>$model->detailID),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrepareDetail','url'=>array('index')),
	array('label'=>'Create PrepareDetail','url'=>array('create')),
	array('label'=>'View PrepareDetail','url'=>array('view','id'=>$model->detailID)),
	array('label'=>'Manage PrepareDetail','url'=>array('admin')),
);
?>

<h1>Update PrepareDetail <?php echo $model->detailID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>