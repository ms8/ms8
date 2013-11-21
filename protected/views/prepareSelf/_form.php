<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'prepare-self-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="search-result">
    <div id="company-map" style="margin-bottom: 20px;"></div>
    <div id="company-result" style="margin-bottom: 20px;"></div>
</div>

<p class="help-block">收藏的有用信息</p>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$preparedata,
    'type'=>'striped bordered condensed',
    'hideHeader'=>true,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'title','value'=>'$data->title',),
        array('class'=>'bootstrap.widgets.TbButtonColumn','template'=>'{view}','buttons'=>array('view'=>array('url'=>'$data->url'))),
    ),
))  ?>


<br>
<p class="help-block">小伙伴们提供的信息</p>
<?php echo $cn;?>位小伙伴说是中文面试，<?php echo $en;?>位小伙伴说是英文面试，其他<?php echo $others;?>位小伙伴说是其他的面试语言。
<br>
<?php echo $zhengzhuang;?>位小伙伴说要着正装，<?php echo $xiuxian;?>位小伙伴说休闲装。
<br>
<?php echo $danmian;?>位小伙伴说是单面，<?php echo $qunmian;?>位小伙伴说是群面。
<br>
<?php echo $jinzhang;?>位小伙伴说面试气氛紧张，<?php echo $qingsong;?>位小伙伴说面试气氛轻松
<br>
平均有<?php echo $rounds;?>轮面试
<br>
<?php echo $bad;?>位小伙伴说工作环境差，<?php echo $normal;?>位小伙伴说职场环境一般，<?php echo $good;?>位小伙伴说职场环境很好。
<br>

<p class="help-block">自己再加点料</p>
    <p>自我介绍</p>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$selfintroduction,
    'type'=>'striped bordered condensed',
    'hideHeader'=>true,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'self_introduction','value'=>'$data->self_introduction',),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'buttons'=>array('view'=>array('url'=>'Yii::app()->controller->createUrl("selfintroduction/view", array("id"=>$data->intro_id))')),
        ),
    ),
))  ?>

	<?php echo $form->textAreaRow($model,'interview',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'exam',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '保存' : '更新',
		)); ?>
	</div>

<?php $this->endWidget(); ?>