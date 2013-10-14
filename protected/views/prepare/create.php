<?php
$this->breadcrumbs=array(
	'Prepares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prepare','url'=>array('index')),
	array('label'=>'Manage Prepare','url'=>array('admin')),
);
?>

<h1>Create Prepare</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>