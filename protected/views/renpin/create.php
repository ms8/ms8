<?php
$this->breadcrumbs=array(
	'Renpins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Renpin','url'=>array('index')),
	array('label'=>'Manage Renpin','url'=>array('admin')),
);
?>

<h1>Create Renpin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>