<?php
/* @var $this ConcernController */
/* @var $model Concern */

$this->breadcrumbs=array(
	'Concerns'=>array('index'),
	$model->concernID,
);

$this->menu=array(
	array('label'=>'List Concern', 'url'=>array('index')),
	array('label'=>'Create Concern', 'url'=>array('create')),
	array('label'=>'Update Concern', 'url'=>array('update', 'id'=>$model->concernID)),
	array('label'=>'Delete Concern', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->concernID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Concern', 'url'=>array('admin')),
);
?>

