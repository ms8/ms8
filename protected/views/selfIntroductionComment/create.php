<?php
$this->breadcrumbs=array(
	'Self Introduction Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SelfIntroductionComment','url'=>array('index')),
	array('label'=>'Manage SelfIntroductionComment','url'=>array('admin')),
);
?>

<h1>回复</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>