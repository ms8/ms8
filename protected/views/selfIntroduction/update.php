<?php
$this->breadcrumbs=array(
	'Self Introductions'=>array('index'),
	$model->intro_id=>array('view','id'=>$model->intro_id),
	'Update',
);

$this->menu=array(
	array('label'=>'自我介绍列表','url'=>array('index')),
	array('label'=>'新建自我介绍','url'=>array('create')),
	array('label'=>'查看自我介绍','url'=>array('view','id'=>$model->intro_id)),
	array('label'=>'管理自我介绍','url'=>array('admin')),
);
?>

<h1>更新自我介绍 <?php //echo $model->intro_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>