<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('detailID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->detailID),array('view','id'=>$data->detailID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prepareID')); ?>:</b>
	<?php echo CHtml::encode($data->prepareID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />


</div>