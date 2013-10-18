<?php
$this->breadcrumbs=array(
	'Self Introduction Comments'=>array('index'),
	$model->commentID,
);

$this->menu=array(
	array('label'=>'List SelfIntroductionComment','url'=>array('index')),
	array('label'=>'Create SelfIntroductionComment','url'=>array('create')),
	array('label'=>'Update SelfIntroductionComment','url'=>array('update','id'=>$model->commentID)),
	array('label'=>'Delete SelfIntroductionComment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->commentID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SelfIntroductionComment','url'=>array('admin')),
);
?>

<h1>View SelfIntroductionComment #<?php echo $model->commentID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'posterID',
		'content',
		'time',
		'commentID',
		'intro_id',
		'toComment',
	),
)); ?>
