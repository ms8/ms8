<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('intro_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->intro_id),array('view','id'=>$data->intro_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('self_introduction')); ?>:</b>
	<?php echo CHtml::encode($data->self_introduction); ?>
	<br />


</div>