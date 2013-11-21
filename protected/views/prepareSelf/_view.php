<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prepare_id')); ?>:</b>
	<?php echo CHtml::encode($data->prepare_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interview')); ?>:</b>
	<?php echo CHtml::encode($data->interview); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exam')); ?>:</b>
	<?php echo CHtml::encode($data->exam); ?>
	<br />


</div>