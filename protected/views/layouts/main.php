<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/screen.css" media="screen, projection" />-->
    <!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/print.css" media="print" />-->
    <!--[if lt IE 8]>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />-->
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/css/flat-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/images/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/progress.stap.css" />

    <!-- 个人头像 -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.imgPre.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/font-awesome/css/font-awesome.css" />
    <?php
    Yii::app()->bootstrap->register();
    ?>

    <!-- 百度地图js script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=2fce860d4f8d37ec4e70626f59ccf9ca"></script-->
    <style type="text/css">
        .row-fluid input[class*='span'] {min-height: 20px}
        #content{padding: 40px 0 0 0;}
        #container{padding: 40px 0 0 0;}
        #sidebar {padding: 20px;min-height:800px;}
        #footer{border: none}
        .input-prepend .add-on{margin: 0.2em 0 0.5em 0;border: 2px solid #ccc;border-right: 0px}
        .items{padding-bottom: 20px;}
        .items li{list-style: none;display: inline-block;width:49%;margin-bottom: 20px;}
        .items .info{letter-spacing: normal; word-spacing: normal;  padding: 0px 5px 5px 10px;font-size: 13px;word-wrap: break-word;}
        .items .info a:hover{ text-decoration: none;}
        .items .info .datetime{margin-top:5px;font: 13px Helvetica,Arial,sans-serif;}
        .home_wrapper .list-view{padding-top: 0;}
        .table{font-size: 13px;}
        .table thead th{background: white;}
        .table .introduction{color:gray;}
        .search-result a:visited{color:green;}
        .search-result a:link{ color:#0060a1;}
        .search-result a:hover{ color:#00a0e2;}
        .search-result a:active{ color:#005188;}
        .grid-view .table th,.grid-view .table td {border-top-width:0;}

        /*add by shenyuede 面试总结css*/
        .col-md-3{
            margin-top:10px;
        }
        .radio-label{
            float:left;
            margin-right:15px;
        }

    </style>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id="header">
    <?php
    $this->widget('bootstrap.widgets.TbNavbar', array(
        // 'type'=>'inverse', // null or 'inverse'
        'brand'=>'面试吧',
        'brandUrl'=>'#',
        'collapse'=>true, // requires bootstrap-responsive.css
        'items'=>array(
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'items'=>array(
                    array('label'=>'首页', 'url'=>array('/site/index')),
                    array('label'=>'面试准备', 'url'=>array('/prepare/listall')),
                    array('label'=>'面试经验', 'url'=>array('/summary/list')),
                    array('label'=>'求人品', 'url'=>array('/renpin')),
                    array('label'=>'个人中心', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                        array('label'=>'我的面试准备', 'url'=>array('/prepare/interview')),
                        array('label'=>'自我介绍', 'url'=>array('/selfIntroduction')),
                        array('label'=>'我的面试经验', 'url'=>array('/summary')),
                        array('label'=>'我关注的面试', 'url'=>array('/concern')),
                        array('label'=>'我的人品', 'url'=>array('/renpin')),
                        array('label'=>'个人信息', 'url'=>array('/user/update')))
                    ),
                ),
            ),
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'htmlOptions'=>array('class'=>'pull-right'),
                'items'=>array(
                    array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'('.Yii::app()->user->name.')退出', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'注册', 'url'=>array('/site/register'),'visible'=>Yii::app()->user->isGuest),
                ),
            ),
        ))) ?>
    <!--
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>-->
</div><!-- header -->

<div id="mainmenu">
    <!--
		<?php
        $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		-->

</div><!-- mainmenu -->
<!--
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
	<?php endif?>
    -->
<?php echo $content; ?>

<div class="clear"></div>

<div id="footer">
    <p>
        <a href="http://www.mianshi8.com">面试吧</a> |
        <a href="http://www.mianshi8.com/index.php?r=prepare/listall">面试准备</a> |
        <a href="http://www.mianshi8.com/index.php?r=summary/list">面试经验</a> |
        <a href="#">友情链接</a> |
        <a href="#">意见反馈</a>|
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fe50cb621fc9afc02536c47e42586a85c' type='text/javascript'%3E%3C/script%3E"));
        </script>
    </p>
    &copy; <?php echo date('Y'); ?> MIANSHI8.COM 京ICP备11042501号-6<br/>
</div><!-- footer -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/js/html5shiv.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/js/flatui-radio.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/js/flatui-checkbox.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/js/jquery.tagsinput.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/flatui/js/jquery.stacktable.js"></script>

<!-- 个人头像-->
<script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js"></script>
<script  type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.imgPre.js"></script>
<!--start of feedback code powered by geekui-->
<script type="text/javascript" src="http://geekui.com/static/js/widgets.js"></script>
<script type="text/javascript" charset="utf-8">
    var options = {};
    options.company_sub_url = "ms8";
    options.placement = "right";
    options.tab_define = false;
    options.display = "overlay";
    options.style = "green_right.png";
    var feedback_widget = new GKFN.feedback_widget(options);
</script>
<!--end of feedback code powered by geekui-->


</body>
</html>
