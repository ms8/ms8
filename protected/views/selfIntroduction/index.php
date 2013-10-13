<?php
/* @var $this SelfIntroductionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Self Introductions',
);

$this->menu=array(
	array('label'=>'Create SelfIntroduction', 'url'=>array('create')),
	array('label'=>'Manage SelfIntroduction', 'url'=>array('admin')),
);
?>

<h1>Self Introductions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
