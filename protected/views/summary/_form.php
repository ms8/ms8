<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'summary-form',
	'enableAjaxValidation'=>false,
    'type'=>'vertical',
)); ?>

<!-- ************************************************* -->
<div class="section4" id="process">
    <div class="node fore ready" id="step-1">
        <ul>
            <li class="tx1">&nbsp;</li>
            <li class="tx2">基本信息</li>
        </ul>
    </div>
    <div class="proce forReady" id="progress-1"><ul><li class="tx1">&nbsp;</li></ul></div>
    <div class="node wait" id="step-2">
        <ul>
            <li class="tx1">&nbsp;</li>
            <li class="tx2">面试要点</li>
            <li class="tx3">&nbsp;</li>
        </ul>
    </div>
    <div class="proce wait" id="progress-2"><ul><li class="tx1">&nbsp;</li></ul></div>
    <div class="node wait" id="step-3">
        <ul>
            <li class="tx1">&nbsp;</li>
            <li class="tx2">经验分享</li>
            <li class="tx3">&nbsp;</li>
        </ul>
    </div>
    <div class="proce wait" id="progress-3"><ul><li class="tx1">&nbsp;</li></ul></div>
    <div class="node wait" id="step-4">
        <ul>
            <li class="tx1">&nbsp;</li>
            <li class="tx2">完成</li>
            <li class="tx3">&nbsp;</li>
        </ul>
    </div>
</div>

<!-- ************************************************* -->
<!--<div class="control-group">-->
<!--    <label class="control-label" >自我介绍</label>-->
<!--    <div class="controls">-->
<!--        <textarea class="form-control" rows="3" style="width: 80%"></textarea>-->
<!--    </div>-->
<!--</div>-->
<div id="base-info">
	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'title',array('class'=>'input-xxlarge','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'company_name',array('class'=>'input-large','maxlength'=>200)); ?>

 	<?php echo $form->textFieldRow($model,'position_name',array('class'=>'input-large','maxlength'=>100)); ?>
</div>

<div id="main-info" style="display: none">
    <div class="col-md-3">
        <label class="radio-label">面试语言：</label>
        <label class="radio inline" >
            <input type="radio" name="Summary[language]" value="cn" data-toggle="radio" <?php if($model['language'] == 'cn') echo checked;?>>
        中文
        </label>
        <label class="radio inline">
            <input type="radio" name="Summary[language]"  value="en" data-toggle="radio" <?php if($model['language'] == 'en') echo checked;?>>
        英文
        </label>
        <label class="radio inline">
            <input type="radio" name="Summary[language]" value="other" data-toggle="radio" <?php if($model['language'] == 'other') echo checked;?>>
            其他
        </label>
    </div> <!-- /radios col-md-3 -->


    <div class="col-md-3">
        <label class="radio-label">着装要求：</label>
        <label class="radio inline" >
            <input type="radio" name="Summary[dress]" value="0" data-toggle="radio" <?php if($model['dress'] == '0') echo checked;?>>
            正装
        </label>
        <label class="radio inline">
            <input type="radio" name="Summary[dress]" value="1" data-toggle="radio" <?php if($model['dress'] == '1') echo checked;?>>
            休闲装
        </label>
        </div> <!-- /radios col-md-3 -->



    <div class="col-md-3">
        <label class="radio-label">面试形式：</label>
        <label class="radio inline" >
            <input type="radio" name="Summary[format]"  value="0" data-toggle="radio" <?php if($model['format'] == '0') echo checked;?>>
            单面
        </label>
        <label class="radio inline">
            <input type="radio" name="Summary[format]"  value="1" data-toggle="radio" <?php if($model['format'] == '1') echo checked;?>>
            群面
        </label>
    </div> <!-- /radios col-md-3 -->



    <div class="col-md-3">
        <label class="radio-label">面试气氛：</label>
        <label class="radio inline" >
            <input type="radio" name="Summary[atmosphere]"  value="0" data-toggle="radio" <?php if($model['atmosphere'] == '0') echo checked;?>>
    紧张    </label>
        <label class="radio inline">
            <input type="radio" name="Summary[atmosphere]"  value="1" data-toggle="radio" <?php if($model['atmosphere'] == '1') echo checked;?>>
      轻松  </label>
        <label class="radio">
    </div> <!-- /radios col-md-3 -->

    <div class="col-md-3">
        <label class="radio-label">职场环境：</label>
        <label class="radio inline" >
            <input type="radio" name="Summary[impression]"  value="0" data-toggle="radio" <?php if($model['impression'] == '0') echo checked;?>>
           差
        </label>
        <label class="radio inline">
            <input type="radio" name="Summary[impression]"  value="1" data-toggle="radio" <?php if($model['impression'] == '1') echo checked;?>>
            一般
        </label>
        <label class="radio inline">
            <input type="radio" name="Summary[impression]"  value="1" data-toggle="radio" <?php if($model['impression'] == '2') echo checked;?>>
                好
        </label>

    </div> <!-- /radios col-md-3 -->

        <?php echo $form->textFieldRow($model,'rounds',array('class'=>'input-small','maxlength'=>10)); ?>

    <div class="col-md-3">
        <label class="radio-label">面试结果：</label>
        <label class="radio inline" >
            <input type="radio" name="Summary[result]" value="0" data-toggle="radio" <?php if($model['result'] == '0') echo checked;?>>
            未通过
        </label>
        <label class="radio inline">
            <input type="radio" name="Summary[result]" value="1" data-toggle="radio" <?php if($model['result'] == '1') echo checked;?>>
            通过但未要Offer
        </label>
        <label class="radio inline">
            <input type="radio" name="Summary[result]" value="2" data-toggle="radio" <?php if($model['result'] == '2') echo checked;?>>
            获得Offer
        </label>
    </div> <!-- /radios col-md-3 -->

</div>

<div id="share-info" style="display: none">
    <?php echo $form->textAreaRow($model, 'tips', array('class'=>'span8', 'rows'=>5)); ?>

    <!--
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

</div>

<input type="hidden" id="status" name="Summary[status]">
<input type="hidden" id="stepIndex" name="stepIndex" value="base-info">

<div class="form-actions" >
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'button',
        'type'=>'primary',
        'label'=>'下一步',
        'htmlOptions'=>array('id'=>'nextstap'),
    )); ?>
</div>

	<div class="form-actions" style="display: none" id="finishBt">
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
	</div>
<?php $this->endWidget(); ?>


<script type="text/javascript">
    $(function(){
        $("#nextstap").click(function(){
            if($("#stepIndex").val() == 'base-info'){
                $("#base-info").hide();
                $("#main-info").show();
                $("#progress-1").attr("class", "proce ready");
                $("#step-2").attr("class", "node ready");
                $("#progress-2").attr("class", "proce forReady");
                $("#stepIndex").val('main-info');
            }else if($("#stepIndex").val() == 'main-info'){
                $("#main-info").hide();
                $("#share-info").show();
                $("#progress-2").attr("class", "proce ready");
                $("#step-3").attr("class", "node ready");
                $("#progress-3").attr("class", "proce forReady");
                $("#stepIndex").val('share-info');
                $("#nextstap").hide();
                $("#finishBt").show();
            }

        });
//$("#fabiao").click(function(){
//    $("#status").val("1");
//    return true;
//});
//$("#draft").click(function(){
//    $("#status").val("0");
//    return true;
//});
    })



</script>