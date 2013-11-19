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
<div class="form" style="min-height: 600px;margin: 20px 0;">
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
    <div class="row-fluid">
        <div class="span5">
            <h2>使用合作网站账号登录</h2>
            <fieldset>
                已有账号？<a class="btn btn-primary" href="?r=site/login">请登录</a>
                <hr>
                <div class="control-group  outers-site">
                    <a href="dashboard.html"><img src="<?php echo Yii::app()->request->baseUrl.'/css/qq.jpg'; ?>" style="width:30px;"></a>
                    <a href="dashboard.html"><img src="<?php echo Yii::app()->request->baseUrl.'/css/renren.jpg'; ?>" style="width:50px;"></a>
                </div>
            </fieldset>
        </div>

        <div class="span7 pull-right">
            <h2>快速注册</h2>

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

        </div>

    </div>


    <?php $this->endWidget(); ?>
</div><!-- form -->
</div>
