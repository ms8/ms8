<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'summary_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'user_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'company_name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'position_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'language',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'dress',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'format',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'atmosphere',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'rounds',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'impression',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'result',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'tips',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'exam',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'exam_content',array('class'=>'span5','maxlength'=>5000)); ?>

	<?php echo $form->textFieldRow($model,'experience',array('class'=>'span5','maxlength'=>5000)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'time',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>500)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
