<?php
$this->breadcrumbs=array(
	'Prepares',
);

$this->menu=array(
	array('label'=>'Create Prepare','url'=>array('create')),
	array('label'=>'Manage Prepare','url'=>array('admin')),
);
?>

<h1>Prepares</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
