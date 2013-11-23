<style type="text/css">
    .items {
        padding-bottom: 0;
    }
    p i{font-size: 15px;margin-right: 5px;}
    li {margin-bottom: 5px;}
    ul, ol {
        margin: 0 0 15px 0;
    }
</style>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'prepare-self-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="search-result">
    <div id="company-map" style="margin-bottom: 20px;"></div>
    <div id="company-result" style="margin-bottom: 20px;"></div>
</div>

<h2>收藏的有用信息</h2>

<?php
echo "<ul>";
foreach($preparedata->getData() as $value){
    echo "<li>".CHtml::link(CHtml::encode($value['title']),$value['url'],array("target"=>"_blank"))."</li>";
}
echo "</ul>";
?>


<h2>小伙伴们提供的信息</h2>
<p class="muted"><i class="fa fa-volume-up"></i><?php echo $cn;?>位小伙伴说是中文面试，<?php echo $en;?>位小伙伴说是英文面试，其他<?php echo $others;?>位小伙伴说是其他的面试语言。</p>
<p class="text-warning"><i class="fa fa-volume-up"></i><?php echo $zhengzhuang;?>位小伙伴说要着正装，<?php echo $xiuxian;?>位小伙伴说休闲装。</p>
<p class="text-error"><i class="fa fa-volume-up"></i><?php echo $danmian;?>位小伙伴说是单面，<?php echo $qunmian;?>位小伙伴说是群面。</p>
<p class="text-info"><i class="fa fa-volume-up"></i><?php echo $jinzhang;?>位小伙伴说面试气氛紧张，<?php echo $qingsong;?>位小伙伴说面试气氛轻松</p>
<p class="text-success"><i class="fa fa-volume-up"></i>平均有<?php echo $rounds;?>轮面试</p>
<p class="muted"><i class="fa fa-volume-up"></i><?php echo $bad;?>位小伙伴说工作环境差，<?php echo $normal;?>位小伙伴说职场环境一般，<?php echo $good;?>位小伙伴说职场环境很好。</p>
    <h2>自我介绍</h2>
<?php
echo "<ul>";
foreach($selfintroduction->getData() as $value){
    echo "<li>".CHtml::link(CHtml::encode($value['self_introduction']),Yii::app()->controller->createUrl("selfintroduction/view", array("id"=>$value->intro_id)),array("target"=>"_blank"))."</li>";
}
echo "</ul>";
?>
    <h2><?php echo $model->getAttributeLabel('interview');?></h2>
    <textarea rows="6" cols="50" class="span12" name="PrepareSelf[interview]" id="PrepareSelf_interview"></textarea>
    <h2><?php echo $model->getAttributeLabel('exam');?></h2>
    <textarea rows="6" cols="50" class="span12" name="PrepareSelf[exam]" id="PrepareSelf_exam"></textarea>

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>$model->isNewRecord ? '保存' : '更新',
    )); ?>

<?php $this->endWidget(); ?>