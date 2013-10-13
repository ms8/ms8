<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'posterID',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'content',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'commentID',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'intro_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'toComment',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
