<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nick_name',array('class'=>'input-large','maxlength'=>100)); ?>

    <?php echo $form->radioButtonListInlineRow($model, 'sex',array('1'=>'男','0'=>'女','2'=>'不详')); ?>

	<?php echo $form->textFieldRow($model,'school',array('class'=>'input-large','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'major',array('class'=>'input-large','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : '更新',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
