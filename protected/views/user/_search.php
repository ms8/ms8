<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'userID',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'user_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nick_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'pic',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'sex',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'school',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'major',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'score',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'selfintroduction',array('class'=>'span5','maxlength'=>10000)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
