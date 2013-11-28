
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
    <li class="active">
        <a href="<?php echo $this->createUrl('/user/changePic'); ?>">更换头像</a>
    </li>
    <li >
        <a href="<?php echo $this->createUrl('/user/changepwd'); ?>">修改密码</a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('/user/myscore'); ?>">我的积分</a>
    </li>
</ul>

    <div >
        <!-- 进度条 -->
        <div class="progress">
            <div class="bar" style="width: 0%;"></div>
        </div>

        <div class="demo" style="float: left">
            <div class="files" style="display: none"></div>
            <div style="height: 150px;width: 150px;margin-left:85px ">
                <img class="img-polaroid" id="showimg" src="<?php echo $model->pic ?>">
                <div style="background: #69BC87;height: 30px;width: 110px;font-size: 16px;text-align: center;color: #FFFFFF;padding: 8px 0 0 0;margin-top: 15px">
                    当前头像
                </div>
            </div>

        </div>

        <div   class="imagePre" data-provides="imagePre" style="float: right;margin-right: 100px;">
            <div class="thumbnail" style="width:200px;height:180px;float: left">
                <img style="width: 170px;height: 170px;" class="imagePreview" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
            </div>
            <span id="picOper" class="btn btn-file btn-primary" style="margin-top:10px;padding: 13px 0 0 0;">
                <span class="imagePre-new">选择新头像</span>
                <span class="imagePre-exists">选择新头像</span>
                <input type="file" name="file" id="fileupload" />
            </span>
            <button id="submitfile" name="mypic" class="btn btn-file btn-primary">上传</button>
        </div>

    </div>

    <script type="text/javascript">
        var p = 0;
//        $(function(){
//            run();
//        });
        function run(){

            $("div[class=bar]").css("width",p+"%");
            if(p<90){
                p+=15;
                var timer=setTimeout("run()",500);
            }
        }

        $(document).ready(function() {
            $("#picChange").hide();
            $("#passwordChange").hide();
            $("#myCollection").hide();
            //name 为文件输入的字段的名称, checkboxName即是否删除图片的字段名称
            $('div.imagePre').imagePre({'name':'sampleImage'});

        });

        function change(obj){
            $("#picChange").hide();
            $("#passwordChange").hide();
            $("#infoChange").hide();
            $("#myCollection").hide();
            $("#infoChange").removeAttr("class");
            $("#picChange").removeAttr("class");
            $("#passwordChange").removeAttr("class");
            $("#myCollection").removeAttr("class");

            $("#"+$(obj).attr("name")).show();
            $(obj).parent().siblings().each(function(){
                $(this).removeAttr("class");
            });
            $(obj).parent().attr("class", "active");
            $("#page_title").text($(obj).text());
        }
    </script>

    <script type="text/javascript">
//        function uploadProgress(event) {
//            // display uploading progress infomation...
//            var position = event.loaded || event.position; /*event.position is deprecated*/
//            var total = event.total;
//            if (event.lengthComputable) {
//                percent = Math.ceil(position / total * 100);
//            }
//            onprogress(event, position, total, percent);
//        };
//        var xhr_provider = function() {
//            var xhr = jQuery.ajaxSettings.xhr();
//            if(onprogress && xhr.upload) {
//                xhr.upload.addEventListener('progress', onprogress, false);
//            }
//            return xhr;
//        };

        $(function () {
            var bar = $('.bar');
            var percent = $('.percent');
            var showimg = $('#showimg');
            var progress = $(".progress");
            var files = $(".files");
            var btn = $("imagePre-exists");
            $("#picOper").wrap("<form id='myupload' action='?r=user/savePic&act=0' method='post' enctype='multipart/form-data'></form>");

            $("#picOper").live('click',function(){
                $("div[class=bar]").css("width","0%");
            });

            $("#submitfile").live('click',function(){
                $("div[class=bar]").css("width","0%");
                p=0;
                run();
                var upFiles = $("#fileupload").get(0).files;
                if(upFiles == undefined || upFiles.length == 0){
                    return;
                }
                $("#myupload").ajaxSubmit({
                    dataType:  'json',
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percent = 0;
                        var position = event.loaded || event.position; /*event.position is deprecated*/
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        uploadProgress(event, position, total, percent);

                        $("div[class=bar]").css("width",percentComplete+"%");
                    },
                    success: function(data) {
                        showimg.attr("src",data.pic);
                        btn = $("imagePre-new");
                        btn.html("选择新头像");
                        btn = $("imagePre-exists");
                        btn.html("选择新头像");
                        $("div[class=bar]").css("width","100%");
                        p=100;
                    },
                    error:function(xhr){
                        btn.html("上传失败");
                        alert(xhr.responseText);
                        bar.width('0')
                        files.html(xhr.responseText);
                    }
                });
            });


        });
    </script>