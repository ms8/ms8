<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('posterName')); ?>:</b>
	<?php echo CHtml::encode($data->posterName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br/>
    <a href="<?php Yii::app()->request->baseUrl ?>index.php?r=SelfIntroductionComment/create&intro_id=<?php echo CHtml::encode($data->intro_id);?>&toComment=<?php echo CHtml::encode($data->commentID);?>">
        <b>回复</b>
    </a>
    </br>

</div>