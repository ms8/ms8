<div class="container-fluid">
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
    <?php
     $inputattr = array("class"=>"input-xlarge focused");
     $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
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
        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>
        <input type="submit" class="btn btn-primary" name="yt0" value="注册" />

    </fieldset>
    <?php $this->endWidget(); ?>

</div><!-- form -->
</div>