<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'prepare-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'userID',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'companyName',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'summary',array('class'=>'span5','maxlength'=>1000)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
