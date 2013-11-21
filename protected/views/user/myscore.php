
<div class="well" style="background-color: #F5F5F5;border: 1px solid #E3E3E3;padding: 10px;">
    <div style="width: 260px;float: left;margin-left: 20px;">
        <span style="font-weight: bold;">用户名：</span>
        <span ><?php echo $model->user_name ?></span>
    </div>

    <div  style="width: 300px;float: left;margin-left: 10px;">
        <span style="font-weight: bold;">注册邮箱：</span>
        <span ><?php echo $model->email ?></span>
    </div>
</div>

<ul class="nav nav-tabs" id="myTab">
    <li >
        <a href="<?php echo $this->createUrl('/user/update'); ?>">基本设置</a>
    </li>
    <li >
        <a href="<?php echo $this->createUrl('/user/changePic'); ?>">更换头像</a>
    </li>
    <li >
        <a href="<?php echo $this->createUrl('/user/changepwd'); ?>">修改密码</a>
    </li>
    <li class="active">
        <a href="<?php echo $this->createUrl('/user/myscore'); ?>">我的积分</a>
    </li>
</ul>

    <div >
        <h1>当前积分：<?php echo $model->score; ?></h1>

    </div>