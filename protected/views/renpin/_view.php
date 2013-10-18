<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('renpinID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->renpinID),array('view','id'=>$data->renpinID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />


</div>