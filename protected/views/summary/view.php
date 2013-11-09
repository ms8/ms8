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

<h1><?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
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
		'exam_content',
		'experience',
		'status',
	),
));
?>
<a class="btn btn-primary btn-lg" role="button" href="index.php?r=Summary/update&id=<?php echo $model->summary_id; ?>">编辑</a>
