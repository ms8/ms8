<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userID),array('view','id'=>$data->userID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prepareID')); ?>:</b>
	<?php echo CHtml::encode($data->prepareID); ?>
	<br />


</div>