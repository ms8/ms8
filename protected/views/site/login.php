<div class="container-fluid">
<?php
/* @var $this SiteController */
/* @var $model LoginForm3 */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 登录';
?>

<div class="row-fluid form" style="height: 600px;margin-top: 20px;">
    <?php
     $inputattr = array("class"=>"input-xlarge focused");
     $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
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
    <div class="span7">
        <h2>登录</h2>
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
            <div class="row rememberMe">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $form->label($model,'rememberMe'); ?>
                <?php echo $form->error($model,'rememberMe'); ?>
                <a class="offset1" href="forgetPassword.php">忘记密码？</a>
            </div>
            <input type="submit" class="btn btn-primary" name="yt0" value="登录" />
        </fieldset>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->
</div>