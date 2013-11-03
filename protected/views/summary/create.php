<?php
$this->breadcrumbs=array(
	'Summaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Summary','url'=>array('index')),
	array('label'=>'Manage Summary','url'=>array('admin')),
);
?>

<h1>面试经验分享</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>