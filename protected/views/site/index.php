<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="home_wrapper">
<div class="container-fluid home_content">
    <div class="row-fluid hero_bar"><!-- start hero -->
        <div class="span12">
            <div class="row-fluid">
                <br>
                <div class="span10 home-hero">

                    <div class="row-fluid">
                        <div class="span11 offset1">
                            <div class="row-fluid">
                                <div class="span5">
                                    <h3>公司</h3>
                                </div>
                                <div class="span5">
                                    <h3>职位</h3>
                                </div>
                            </div>

                            <div class="row-fluid form">
                                <?php
                                $inputattr = array("class"=>"input-xlarge focused");
                                $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'prepare-form',
                                    "action"=>array("prepare/index"),
                                    'enableClientValidation'=>false,
                                    'clientOptions'=>array(
                                        'validateOnSubmit'=>false,
                                    ),
                                )); ?>
                                    <div class="span5">
                                        <input type="text" id="company" required name="PrapareForm[company]"  class="span10 search_input" placeholder="您将面试的公司?">
                                    </div>

                                    <div class="span4">
                                        <input type="text" id="position" required name="PrapareForm[position]"  class="span12 search_input" placeholder="您将面试的职位?">
                                    </div>

                                    <div class="span2">
                                        <button type="submit" class="btn btn-primary btn-success search_btn">找攻略</button>
                                    </div>
                                <?php $this->endWidget(); ?>

                            </div>
                        </div>
                    </div>
                    <br>
                    <!--div class="row-fluid">
                        <div class="span12">

                            <div class="row-fluid">
                                <div class="span3 offset1">
                                    <h3>Post a job</h3>
                                    <a href="post-job.html">Fast and free, with upgrade options</a><br>
                                </div>
                                <div class="span3 offset1">
                                    <h3>Browse jobs</h3>
                                    <a href="browse.html">Find the perfect job for you</a><br>
                                </div>
                                <div class="span3 offset1">
                                    <h3>Register</h3>
                                    <a href="register.html">Apply for jobs quickly and easily</a><br>
                                </div>
                            </div>

                        </div>
                    </div-->
                </div>
            </div>
        </div>
    </div>
</div><!-- end hero -->
<div class="container-fluid home_main_content">
<div class="row-fluid">

<div class="span9">

    <div class="row-fluid">

        <div class="span12">
            <h2>热点面试&nbsp.&nbsp.&nbsp.&nbsp.&nbsp.&nbsp.<a href="#">（更多）</a></h2>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$preparedata,
                'itemView'=>'_prepareview',
                "itemsCssClass"=>"row-fluid items",
                'template'=>'<div class="list">{items}</div>',
                'sorterCssClass'=>'sorter_container',//定义sorter的div容器的class
                'sorterHeader'=>'更改排序：',//定义的文字显示在sorter可排序属性的前面
                'sorterFooter'=>'',//定义的文字显示在sorter可排序属性的后面
            ));
            ?>
        </div>

    </div>
    <div class="row-fluid">

        <div class="span12">
            <h2>最新面经&nbsp.&nbsp.&nbsp.&nbsp.&nbsp.&nbsp.<a href="index.php?r=summary/list">（更多）</a></h2>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$summaryData,
                'itemView'=>'_summaryview',
                "itemsCssClass"=>"row-fluid items",
                'template'=>'<div class="list">{items}</div>',
                'sorterCssClass'=>'sorter_container',//定义sorter的div容器的class
                'sorterHeader'=>'更改排序：',//定义的文字显示在sorter可排序属性的前面
                'sorterFooter'=>'',//定义的文字显示在sorter可排序属性的后面
            ));
            ?>
        </div>

    </div>
    <div class="row-fluid">
        <div class="span12">
            <h2>自我介绍&nbsp.&nbsp.&nbsp.&nbsp.&nbsp.&nbsp.<a href="<?php Yii::app()->request->baseUrl; ?>index.php?r=selfIntroduction/indexAll">（更多）</a></h2>
            <?php

            //格式化为图片
            function formaterImage(){
                return 'CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/"."$data[picPath]","",array("class"=>"img-polaroid","width"=>"100")),"#",array("class"=>""))';
            }
            //格式化为链接
            function formaterLink(){
                return 'CHtml::tag("p",array(),
                                 CHtml::tag("strong",array()," $data[username]",true),true) ';
            }
            //格式化为按钮
            function formaterButton(){
                return 'CHtml::link("点评","index.php?r=SelfIntroduction/view&id=$data[intro_id]",array("class"=>"btn btn-primary"))';


            }

            $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'striped',
                'dataProvider'=>$introductiondata,
                'hideHeader'=>true,
                'template'=>"{items}",
                'columns'=>array(
                    array(
                        'name'=>'id',
                        'header'=>'发起人',
                        'type'=>'raw',
                        'htmlOptions'=>array("width"=>"120"),
                        'value'=> formaterImage() ,
                    ),
                    array('name'=>'prepareID', 'header'=>'介绍',
                        'type'=>'raw',
                        'value'=>formaterLink() ,
                    ),
                    array('name'=>'selfintroduction',
                        'header'=>'时间',
                    ),
                    array('name'=>'title', 'header'=>'联系',
                        'type'=>'raw',
                        'htmlOptions'=>array("width"=>"100"),
                        'value'=>formaterButton() ,),
                ),
            ));
            ?>
        </div>

    </div>
</div>

<div class="span3">
    <h2>&nbsp;</h2>
    <div class="row-fluid">
        <div class="span12 center">
            <a class="btn btn-primary btn-large post_job" href="<?php Yii::app()->request->baseUrl; ?>index.php?r=summary/create">记录面试经历<br><small>(总结自己不断提升!)</small></a>
        </div>
    </div>
    <?php if(!Yii::app()->user->isGuest) echo "<div style='display: none'>"; ?>
    <h2>登陆</h2>
    <div class="row-fluid">
        <div class="span12 form left alert  alert-info home_content">
            <?php
            $usernameattr = array("class"=>"input-medium focused","placeholder"=>"用户名");
            $passwordattr = array("class"=>"input-medium focused","placeholder"=>"密码");
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'action'=>array('site/login'),
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>
            <div class="control-group">
                <?php echo $form->textField($loginForm,'username',$usernameattr); ?>
                <?php echo $form->error($loginForm,'username',$usernameattr); ?>
            </div>
            <div class="control-group">
                <?php echo $form->passwordField($loginForm,'password',$passwordattr); ?>
                <?php echo $form->error($loginForm,'password',$passwordattr); ?>
            </div>
            <div class="row rememberMe">
                <?php echo $form->checkBox($loginForm,'rememberMe'); ?>
                <?php echo $form->label($loginForm,'rememberMe'); ?>
                <?php echo $form->error($loginForm,'rememberMe'); ?>
                <a class="offset1" href="forgetPassword.php">忘记密码？</a>
            </div>
            <input type="submit" class="btn btn-primary" name="yt0" value="登录" />
            <?php $this->endWidget(); ?>
        </div>
    </div>
    <br>
    <?php if(!Yii::app()->user->isGuest) echo "</div>";?>
    <h2>求人品</h2>
    <div class="row-fluid">
        <div class="span12">
            <div id="renpin" class="alert alert-info home_content" style="padding-right: 8px">
                 <p class="info">
                     <form name="renpin-form">
                     <?php if(empty($renpin)){echo "人品爆棚，没有人求!";}else{?>
                     <input  type="hidden" name="RepinForm[renpinID]" value="<?php  echo $renpin[0]->renpinID ;?>"/>
                     <span><?php echo $renpin[0]->content ;}?></span>
                     </form>
                 </p>
                <button id="concern" class="btn btn-primary">祝福</button>
            </div>

        </div>
    </div>
    <h2>关注我们</h2>
    <div class="row-fluid">
        <div class="span12">
            <ul class="social-icons">
                <li><a href="#"><i class="fa fa-weibo icon-2x"></i></a></li>
                <li><a href="#"><i class="fa fa-renren icon-2x"></i></a></li>
                <li><a href="#"><i class="icon-google-plus-sign icon-2x"></i></a></li>
                <li><a href="#"><i class="icon-linkedin-sign icon-2x"></i></a></li>
                <li><a href="#"><i class="icon-pinterest-sign icon-2x"></i></a></li>
            </ul>
            <p></p>
        </div>
    </div>


</div>
</div>
</div></div>
<script type="text/javascript">
 $(function(){
     $("#concern").click(function(){
         $.ajax({
             type:'POST',
             dataType:'json',
             async:false,
             data:{'renpinID':$("#renpin input").val()},
             url:'?r=renpin/bless',
             success:function(json) {
                 $("#renpin input").val(json.renpinID);
                 $("#renpin span").text(json.content);
             }
         });
     });
 })


</script>
<!--
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Primary',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
)); ?>
-->
<!--
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
-->
<!--
百度地图
 #l-map{height:400px;width:78%;float:left;border-right:2px solid #bcbcbc;}
 #r-result{height:400px;width:20%;float:left;}
<div id="l-map"></div>
<div id="r-result"></div>
<script type="text/javascript">
/*
    // 百度地图API功能
    var map = new BMap.Map("l-map");            // 创建Map实例
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
    var local = new BMap.LocalSearch(map, {
        renderOptions: {map: map, panel: "r-result"}
    });
    local.setPageCapacity(4);
    local.search("华为");
    */
</script>
-->
