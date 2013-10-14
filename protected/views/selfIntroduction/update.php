<?php
$this->breadcrumbs=array(
	'Self Introductions'=>array('index'),
	$model->intro_id=>array('view','id'=>$model->intro_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SelfIntroduction','url'=>array('index')),
	array('label'=>'Create SelfIntroduction','url'=>array('create')),
	array('label'=>'View SelfIntroduction','url'=>array('view','id'=>$model->intro_id)),
	array('label'=>'Manage SelfIntroduction','url'=>array('admin')),
);
?>

<h1>Update SelfIntroduction <?php echo $model->intro_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>