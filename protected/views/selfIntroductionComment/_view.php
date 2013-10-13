<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('commentID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->commentID),array('view','id'=>$data->commentID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posterID')); ?>:</b>
	<?php echo CHtml::encode($data->posterID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intro_id')); ?>:</b>
	<?php echo CHtml::encode($data->intro_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('toComment')); ?>:</b>
	<?php echo CHtml::encode($data->toComment); ?>
	<br />


</div>