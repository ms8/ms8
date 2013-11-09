<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'user_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nick_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'pic',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'sex',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'school',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'major',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : '更新',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
