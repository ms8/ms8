
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
    <li>
        <a href="<?php echo $this->createUrl('/user/changePic'); ?>">更换头像</a>
    </li>
    <li class="active">
        <a href="<?php echo $this->createUrl('/user/changepwd'); ?>">修改密码</a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('/user/myscore'); ?>">我的积分</a>
    </li>
</ul>

    <div class="con clear">

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'user-form',
                'enableAjaxValidation'=>false,
                'htmlOptions'=>array('class'=>'left2a'),
            )); ?>

        <div class="control-group">
            <label class="control-label" for="password1">密码</label>
            <input id="password1" type="password" value="">
        </div>
        <div class="control-group">
            <label class="control-label" for="password2">确认密码</label>
            <input id="password2" type="password" value="" onblur="checkvalue()">
        </div>
        <div style="width: 42%;padding: 0 0 0 150px;">
            <button onclick="submitForm()" class="btn btn-primary" >提交</button>
        </div>


        <?php $this->endWidget(); ?>
        <div class="right5a">
            <!-- <div class="right5a1">小组创建  · · · · · ·</div>
            <div class="right5a2">小组需要审核通过后才能完成创建,管理员会在3日内审核 申请, 审核结果会用豆邮通知你,请耐心等待。</div>
            <div class="right5a1">小组标签  · · · · · ·</div>
            <div class="right5a2">小组可以有不超过5个的标签，用来描述小组的目的。标签作为关键词可以被用户搜索到。 多个标签之间用空格分隔开。 </div>
            <div class="right5a2">比如，"Philip K. Dick小组"可以用 "作者 作家 科幻 科学幻想 迪克"， "关中辰木" 可以用 "本地 同城 西北 陕西 西安"。小组名称本身可以被搜索，就不用再加在标签里了。 小组的名称、介绍、标签在创立后都可以随时更改。 </div> -->
        </div>
        
    </div>

    <script>
        function checkvalue(){
            if($('#password2').val() != $('#password1').val() ){
                alert('两次填写密码不一致，请重新填写：）');
            }
        }
        function submitForm(){
            if($('#password2').val() != $('#password1').val() ){
                alert('两次填写密码不一致，请重新填写：）');
            }else{
                var password = $('#password1').val();
                $.ajax({
                    type:'POST',
                    dataType:'json',
                    data:{'password':password},
                    url:'?user/changepwdSave',
                    success:function(json) {
                        if(json.result != ""){
                            alert('修改成功');
                        }
                    }
                });
            }
        }
//验证提示
$('#member-form').ajaxForm({
    dataType:'json',
    success:function(data) {
      var items = [];
      $.each(data,function(key, val){var tem=[key,val];items.push(tem)});
      var length = items.length;
      if(data.status != 1){
        //items[i][0]错误节点名称
        //items[i][1]对应错误提示
        for(var i=0;i<length;i++){  
            alert(items[i][1]);
            return false;
        }
      }else{
        alert('修改基本信息成功');
      }
    }
  });

//提交验证
$('#sub').click( 
    function(){
        $('#user-form').submit();
        return false;
  }
);
</script>