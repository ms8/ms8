    <div class="top3">
        我的积分
    </div>
    <div >
        <a <?php if($this->action->id == 'info'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/user/update'); ?>">基本设置</a>
        <a <?php if($this->action->id == 'changepwd'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/user/changepwd'); ?>">修改密码</a>
		<a <?php if($this->action->id == 'myscore'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/user/myscore'); ?>">我的积分</a>
	</div>

    <div >
        <h1>当前积分：<?php echo $model->score; ?></h1>

    </div>