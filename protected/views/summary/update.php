<?php
$this->breadcrumbs=array(
	'Summaries'=>array('index'),
	$model->title=>array('view','id'=>$model->summary_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Summary','url'=>array('index')),
	array('label'=>'Create Summary','url'=>array('create')),
	array('label'=>'View Summary','url'=>array('view','id'=>$model->summary_id)),
	array('label'=>'Manage Summary','url'=>array('admin')),
);
?>

<h1>更新我的面试总结</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>