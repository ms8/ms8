<?php
/* @var $this SelfIntroductionController */
/* @var $model SelfIntroduction */

$this->breadcrumbs=array(
	'Self Introductions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SelfIntroduction', 'url'=>array('index')),
	array('label'=>'Manage SelfIntroduction', 'url'=>array('admin')),
);
?>

<h1>Create SelfIntroduction</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>