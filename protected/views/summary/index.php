<?php
$this->breadcrumbs=array(
	'Summaries',
);

$this->menu=array(
	array('label'=>'Create Summary','url'=>array('create')),
	array('label'=>'Manage Summary','url'=>array('admin')),
);
?>

<h1>Summaries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>