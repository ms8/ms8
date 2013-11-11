<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'summary-form',
	'enableAjaxValidation'=>false,
    'type'=>'vertical',
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'title',array('class'=>'span12','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'company_name',array('class'=>'span5','maxlength'=>200)); ?>

 	<?php echo $form->textFieldRow($model,'position_name',array('class'=>'span5','maxlength'=>100)); ?>


<label>面试语言</label>
<div class="col-md-3">
    <label class="radio" >
        <input type="radio" name="Summary[language]" value="cn" data-toggle="radio" <?php if($model['language'] == 'cn') echo checked;?>>
    中文
    </label>
    <label class="radio">
        <input type="radio" name="Summary[language]"  value="en" data-toggle="radio" <?php if($model['language'] == 'en') echo checked;?>>
    英文
    </label>
    <label class="radio">
        <input type="radio" name="Summary[language]" value="other" data-toggle="radio" <?php if($model['language'] == 'other') echo checked;?>>
        其他
    </label>
</div> <!-- /radios col-md-3 -->

<label>着装要求</label>
<div class="col-md-3">
    <label class="radio" >
        <input type="radio" name="Summary[dress]" value="0" data-toggle="radio" <?php if($model['dress'] == '0') echo checked;?>>
        正装
    </label>
    <label class="radio">
        <input type="radio" name="Summary[dress]" value="1" data-toggle="radio" <?php if($model['dress'] == '1') echo checked;?>>
        休闲装
    </label>
    </div> <!-- /radios col-md-3 -->


<label>面试形式</label>
<div class="col-md-3">
    <label class="radio" >
        <input type="radio" name="Summary[format]"  value="0" data-toggle="radio" <?php if($model['format'] == '0') echo checked;?>>
        单面
    </label>
    <label class="radio">
        <input type="radio" name="Summary[format]"  value="1" data-toggle="radio" <?php if($model['format'] == '1') echo checked;?>>
        群面
    </label>
</div> <!-- /radios col-md-3 -->


<label>面试气氛</label>
<div class="col-md-3">
    <label class="radio" >
        <input type="radio" name="Summary[atmosphere]"  value="0" data-toggle="radio" <?php if($model['atmosphere'] == '0') echo checked;?>>
紧张    </label>
    <label class="radio">
        <input type="radio" name="Summary[atmosphere]"  value="1" data-toggle="radio" <?php if($model['atmosphere'] == '1') echo checked;?>>
  轻松  </label>
    <label class="radio">
</div> <!-- /radios col-md-3 -->

	<?php echo $form->textFieldRow($model,'rounds',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'impression',array('class'=>'span5','maxlength'=>500)); ?>

<label>面试结果</label>
<div class="col-md-3">
    <label class="radio" >
        <input type="radio" name="Summary[result]" value="0" data-toggle="radio" <?php if($model['result'] == '0') echo checked;?>>
        未通过
    </label>
    <label class="radio">
        <input type="radio" name="Summary[result]" value="1" data-toggle="radio" <?php if($model['result'] == '1') echo checked;?>>
        通过但未要Offer
    </label>
    <label class="radio">
        <input type="radio" name="Summary[result]" value="2" data-toggle="radio" <?php if($model['result'] == '2') echo checked;?>>
        获得Offer
    </label>
</div> <!-- /radios col-md-3 -->


<?php echo $form->textAreaRow($model, 'tips', array('class'=>'span8', 'rows'=>5)); ?>


<label>是否有笔试</label>
<div class="col-md-3">
    <label class="radio" >
        <input type="radio" name="Summary[exam]" value="0" data-toggle="radio" <?php if($model['exam'] == '0') echo checked;?>>
        是
    </label>
    <label class="radio">
        <input type="radio" name="Summary[exam]" value="1" data-toggle="radio" <?php if($model['atmosphere'] == '1') echo checked;?>>
        否
    </label>
</div> <!-- /radios col-md-3 -->

<?php echo $form->textAreaRow($model, 'exam_content', array('class'=>'span12', 'rows'=>5)); ?>
<?php echo $form->textAreaRow($model, 'experience', array('class'=>'span12', 'rows'=>5)); ?>


<input type="hidden" id="status" name="Summary[status]">

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '发表' : '发表',
            'htmlOptions'=>array('id'=>'fabiao'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? '草稿' : '草稿',
            'htmlOptions'=>array('id'=>'draft'),
        )); ?>
        &nbsp;同步到：
	</div>
<?php $this->endWidget(); ?>


<script type="text/javascript">
    $(function(){
$("#fabiao").click(function(){
    $("#status").val("1");
    return true;
});
$("#draft").click(function(){

    $("#status").val("0");
    return true;
});
    })



</script>