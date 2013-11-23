<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->summary_id),array('view','id'=>$data->summary_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>

    <?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_name')); ?>:</b>
	<?php echo CHtml::encode($data->position_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
    <?php if($data->language=="cn") $language="中文";
	 echo CHtml::encode($language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dress')); ?>:</b>
	<?php echo CHtml::encode($data->dress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('format')); ?>:</b>
	<?php echo CHtml::encode($data->format); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('atmosphere')); ?>:</b>
	<?php echo CHtml::encode($data->atmosphere); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rounds')); ?>:</b>
	<?php echo CHtml::encode($data->rounds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impression')); ?>:</b>
	<?php echo CHtml::encode($data->impression); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tips')); ?>:</b>
	<?php echo CHtml::encode($data->tips); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exam')); ?>:</b>
	<?php echo CHtml::encode($data->exam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exam_content')); ?>:</b>
	<?php echo CHtml::encode($data->exam_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('experience')); ?>:</b>
	<?php echo CHtml::encode($data->experience); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	*/ ?>

</div>