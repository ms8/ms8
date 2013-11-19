<div class="container-fluid">
<?php
/* @var $this SiteController */
/* @var $model RegisterForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 注册';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>
<style>
    .outers-site a {margin-left: 20px;font-size: 26px;}
    .outers-site i {color: darkslateblue;}
</style>
<div class="form" style="min-height: 400px;margin: 40px 0;">
<?php
    $inputattr = array("class"=>"input-xlarge focused");
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>true,
        'enableAjaxValidation'=>true,
        'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <fieldset>
        <div class="control-group">
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username',$inputattr); ?>
            <?php echo $form->error($model,'username',$inputattr); ?>
        </div>
        <div class="control-group">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password',$inputattr); ?>
            <?php echo $form->error($model,'password',$inputattr); ?>
        </div>
        <div class="control-group">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email',$inputattr); ?>
            <?php echo $form->error($model,'email',$inputattr); ?>
        </div>
        <input type="submit" class="btn btn-primary" name="yt0" value="注册" />

    </fieldset>

   <!--
    <div class="row-fluid">

        <div class="span6">
            <h2>快速注册</h2>

            <form class="">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">用户名</label>
                        <div class="controls">
                            <input type="text" placeholder="不超过7个汉字或14个英文，数字、_和-" id="username" class="input-xlarge focused">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">邮箱</label>
                        <div class="controls">
                            <input type="text" placeholder="填写你常用的邮箱作为登录帐号" id="email" class="input-xlarge focused">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">密码</label>
                        <div class="controls">
                            <input type="password" placeholder="6-20位数字、字母和符号，区分大小写" id="password" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">确认密码</label>
                        <div class="controls">
                            <input type="password" placeholder="再次输入密码" id="confirm_password" class="input-xlarge">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="yt0" value="注册" />
                </fieldset>
            </form>


        </div>

        <div class="span6 pull-right">
            <h2>使用合作网站账号登录</h2>
                <fieldset>
                    已有账号？<a class="btn btn-primary" href="dashboard.html">请登录</a>
                    <hr>
                    <div class="control-group  outers-site">
                        <a href="dashboard.html"><i class="icon-weibo"></i></a>
                        <a href="dashboard.html"><i class="icon-renren"></i></a>
                    </div>


                </fieldset>
        </div>

    </div>

-->


    <?php $this->endWidget(); ?>
</div><!-- form -->
</div>
