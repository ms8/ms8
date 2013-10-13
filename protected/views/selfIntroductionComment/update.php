<?php
$this->breadcrumbs=array(
	'Self Introduction Comments'=>array('index'),
	$model->commentID=>array('view','id'=>$model->commentID),
	'Update',
);

$this->menu=array(
	array('label'=>'List SelfIntroductionComment','url'=>array('index')),
	array('label'=>'Create SelfIntroductionComment','url'=>array('create')),
	array('label'=>'View SelfIntroductionComment','url'=>array('view','id'=>$model->commentID)),
	array('label'=>'Manage SelfIntroductionComment','url'=>array('admin')),
);
?>

<h1>Update SelfIntroductionComment <?php echo $model->commentID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>