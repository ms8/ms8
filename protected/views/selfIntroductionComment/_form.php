<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'self-introduction-comment-form',
	'enableAjaxValidation'=>false,
)); ?>

<!--	<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>



	<?php echo $form->textAreaRow($model,'content',array('class'=>'span12','rows'=>5)); ?>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '保存' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
