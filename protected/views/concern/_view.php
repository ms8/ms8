<?php
/* @var $this ConcernController */
/* @var $data Concern */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('concernID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->concernID), array('view', 'id'=>$data->concernID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prepare_user')); ?>:</b>
	<?php echo CHtml::encode($data->prepare_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyName')); ?>:</b>
	<?php echo CHtml::encode($data->companyName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prepareID')); ?>:</b>
	<?php echo CHtml::encode($data->prepareID); ?>
	<br />


</div>