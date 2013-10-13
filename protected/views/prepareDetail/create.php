<?php
$this->breadcrumbs=array(
	'Prepare Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrepareDetail','url'=>array('index')),
	array('label'=>'Manage PrepareDetail','url'=>array('admin')),
);
?>

<h1>Create PrepareDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>