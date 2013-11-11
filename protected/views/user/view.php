<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_name,
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'Update User','url'=>array('update','id'=>$model->userID)),
	array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->userID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>个人信息</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'user_name',
		'nick_name',
		'email',
		'pic',
		'sex',
		'school',
		'major',
	),
)); ?>
