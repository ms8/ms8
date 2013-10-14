<?php
$this->breadcrumbs=array(
	'Concerns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Concern','url'=>array('index')),
	array('label'=>'Manage Concern','url'=>array('admin')),
);
?>

<h1>Create Concern</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>