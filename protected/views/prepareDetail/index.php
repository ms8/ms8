<?php
$this->breadcrumbs=array(
	'Prepare Details',
);

$this->menu=array(
	array('label'=>'Create PrepareDetail','url'=>array('create')),
	array('label'=>'Manage PrepareDetail','url'=>array('admin')),
);
?>

<h1>Prepare Details</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
