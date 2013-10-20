<div class="container-fluid">
<?php
/* @var $this SiteController */
/* @var $model LoginForm3 */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="row-fluid form" style="height: 400px;margin-top: 50px;">
    <?php
     $inputattr = array("class"=>"input-xlarge focused");
     $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    <div class="span2"></div>
    <fieldset class="span8">
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
    <div class="span2"></div>
    <?php $this->endWidget(); ?>

</div><!-- form -->
</div>