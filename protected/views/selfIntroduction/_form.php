<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'self-introduction-form',
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'intro_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'user_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textArea($model,'self_introduction',array('class'=>'span12','rows'=>15)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '保存' : '更新',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
