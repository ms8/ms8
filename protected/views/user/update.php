<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_name=>array('view','user_name'=>$model->user_name),
	'Update',
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'View User','url'=>array('view','id'=>$model->userID)),
	array('label'=>'Manage User','url'=>array('admin')),
);
?>

<!--    <div class="top3">-->
<!--        我的信息-->
<!--    </div>-->
<!--    <div >-->
<!--        <a --><?php //if($this->action->id == 'info'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/user/update'); ?><!--">基本设置</a>-->
<!--        <a --><?php //if($this->action->id == 'myscore'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/user/myscore'); ?><!--">我的积分</a>-->
<!--    </div>-->

    <ul class="nav nav-tabs" id="myTab">
        <li class="active">
            <a href="<?php echo $this->createUrl('/user/update'); ?>">基本设置</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('/user/changePic'); ?>">更换头像</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('/user/changepwd'); ?>">修改密码</a>
        </li>
        <li >
            <a href="<?php echo $this->createUrl('/user/myscore'); ?>">我的积分</a>
        </li>
    </ul>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>