<?php
$this->breadcrumbs=array(
	'Self Introduction Comments',
);

$this->menu=array(
	array('label'=>'Create SelfIntroductionComment','url'=>array('create')),
	array('label'=>'Manage SelfIntroductionComment','url'=>array('admin')),
);
?>

<h1>Self Introduction Comments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
