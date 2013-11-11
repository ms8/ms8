<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('renpinID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->renpinID),array('view','id'=>$data->renpinID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />


</div>