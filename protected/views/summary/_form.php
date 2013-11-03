<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'summary-form',
	'enableAjaxValidation'=>false,
    'type'=>'vertical',
)); ?>
	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'title',array('class'=>'span12','maxlength'=>500)); ?>

	<?php// echo $form->textFieldRow($model,'user_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'company_name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'position_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'language',array('class'=>'span5','maxlength'=>100)); ?>
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type' => 'primary',
    'toggle' => 'radio', // 'checkbox' or 'radio'
    'buttons' => array(
        array('label'=>'中文'),
        array('label'=>'英文'),
        array('label'=>'其他'),
    ),
)); ?>
	<?php echo $form->textFieldRow($model,'dress',array('class'=>'span5','maxlength'=>100)); ?>
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type' => 'primary',
    'toggle' => 'radio', // 'checkbox' or 'radio'
    'buttons' => array(
        array('label'=>'正装'),
        array('label'=>'休闲装'),
    ),
    )); ?>

	<?php echo $form->textFieldRow($model,'format',array('class'=>'span5','maxlength'=>100)); ?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type' => 'primary',
    'toggle' => 'radio', // 'checkbox' or 'radio'
    'buttons' => array(
        array('label'=>'群面'),
        array('label'=>'单面'),
    ),
)); ?>
	<?php echo $form->textFieldRow($model,'atmosphere',array('class'=>'span5','maxlength'=>100)); ?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type' => 'primary',
    'toggle' => 'radio', // 'checkbox' or 'radio'
    'buttons' => array(
        array('label'=>'轻松'),
        array('label'=>'紧张'),
    ),
)); ?>
	<?php echo $form->textFieldRow($model,'rounds',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'impression',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'result',array('class'=>'span5','maxlength'=>100)); ?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type' => 'primary',
    'toggle' => 'radio', // 'checkbox' or 'radio'
    'buttons' => array(
        array('label'=>'未通过'),
        array('label'=>'通过但未要Offer'),
        array('label'=>'获得Offer'),
    ),
)); ?>
<?php echo $form->textAreaRow($model, 'tips', array('class'=>'span8', 'rows'=>5)); ?>
	<?php echo $form->textFieldRow($model,'exam',array('class'=>'span5','maxlength'=>100)); ?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type' => 'primary',
    'toggle' => 'radio', // 'checkbox' or 'radio'
    'buttons' => array(
        array('label'=>'是'),
        array('label'=>'否'),
    ),
)); ?>
<?php echo $form->textAreaRow($model, 'exam_content', array('class'=>'span12', 'rows'=>5)); ?>
<?php echo $form->textAreaRow($model, 'experience', array('class'=>'span12', 'rows'=>5)); ?>
	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'time',array('class'=>'span5','maxlength'=>100)); ?>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '发表' : '发表',
		)); ?>
        &nbsp;<a  href="#" >保存草稿</a>
        &nbsp;同步到：
	</div>
<?php $this->endWidget(); ?>
