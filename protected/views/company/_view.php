<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->companyID),array('view','id'=>$data->companyID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortname')); ?>:</b>
	<?php echo CHtml::encode($data->shortname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('industryID')); ?>:</b>
	<?php echo CHtml::encode($data->industryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />


</div>