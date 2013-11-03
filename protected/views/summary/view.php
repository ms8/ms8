<?php
$this->breadcrumbs=array(
	'Summaries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Summary','url'=>array('index')),
	array('label'=>'Create Summary','url'=>array('create')),
	array('label'=>'Update Summary','url'=>array('update','id'=>$model->summary_id)),
	array('label'=>'Delete Summary','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->summary_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Summary','url'=>array('admin')),
);
?>

<h1>View Summary #<?php echo $model->summary_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'summary_id',
		'user_name',
		'company_name',
		'position_name',
		'language',
		'dress',
		'format',
		'atmosphere',
		'rounds',
		'impression',
		'result',
		'tips',
		'exam',
		'exam_content',
		'experience',
		'status',
		'time',
		'title',
	),
)); ?>
