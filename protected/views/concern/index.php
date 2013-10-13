<?php
$this->breadcrumbs=array(
	'Concerns',
);

$this->menu=array(
	array('label'=>'Create Concern','url'=>array('create')),
	array('label'=>'Manage Concern','url'=>array('admin')),
);
?>

<h1>Concerns</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
