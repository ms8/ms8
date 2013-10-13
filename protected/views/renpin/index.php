<?php
$this->breadcrumbs=array(
	'Renpins',
);

$this->menu=array(
	array('label'=>'Create Renpin','url'=>array('create')),
	array('label'=>'Manage Renpin','url'=>array('admin')),
);
?>

<h1>Renpins</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
