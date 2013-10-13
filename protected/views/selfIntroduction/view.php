<?php
$this->breadcrumbs=array(
	'Self Introductions'=>array('index'),
	$model->intro_id,
);

$this->menu=array(
	array('label'=>'List SelfIntroduction','url'=>array('index')),
	array('label'=>'Create SelfIntroduction','url'=>array('create')),
	array('label'=>'Update SelfIntroduction','url'=>array('update','id'=>$model->intro_id)),
	array('label'=>'Delete SelfIntroduction','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->intro_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SelfIntroduction','url'=>array('admin')),
);
?>

<h1>View SelfIntroduction #<?php echo $model->intro_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'intro_id',
		'user_id',
		'self_introduction',
	),
)); ?>
