<?php
$this->breadcrumbs=array(
	'Prepare Selves',
);

$this->menu=array(
	array('label'=>'Create PrepareSelf','url'=>array('create')),
	array('label'=>'Manage PrepareSelf','url'=>array('admin')),
);
?>

<h1>Prepare Selves</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
