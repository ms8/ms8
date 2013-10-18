<?php
$this->breadcrumbs=array(
	'Self Introductions',
);

$this->menu=array(
	array('label'=>'Create SelfIntroduction','url'=>array('create')),
	array('label'=>'Manage SelfIntroduction','url'=>array('admin')),
);
?>

<h1>Self Introductions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
