<?php
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/protected/extensions/timeline/js/timeline.js");
//Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/protected/extensions/timeline/css/style.css");
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/protected/extensions/timeline/js/timeline.js");
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/timeline/css/style.css");
/* @var $model PrepareForm */

$this->breadcrumbs=array(
	'Prepares',
);
    /*array(array(
   "id"=>1,
    "url"=>"http://www.baidu.com/link?url=V6weCqeXVf5XWzmAg64jIhIM-bVSFPPLhu48JcBlSYSg_zRFB7vEXXSWOnCaswjnYY6p52cElOvQmre3oPFLE_",
    "title"=>"华为技术有限公司_百度百科")
));*/
/*$this->menu=array(
	array('label'=>'我的面试','url'=>array('create')),
	array('label'=>'自我介绍','url'=>array('admin')),
    array('label'=>'站内信','url'=>array('create')),
    array('label'=>'我关注的面试','url'=>array('admin')),
    array('label'=>'个人信息','url'=>array('admin')),
);*/
$this->menu= array(
    //array('label'=>'LIST HEADER'),
    array('label'=>'我的面试', 'icon'=>'home', 'url'=>array('interview'), 'active'=>true),
    array('label'=>'自我介绍', 'icon'=>'book', 'url'=>array('admin')),
    array('label'=>'站内信', 'icon'=>'pencil', 'url'=>array('create')),
    //array('label'=>'ANOTHER LIST HEADER'),
    array('label'=>'我关注的面试', 'icon'=>'user', 'url'=>'#'),
    array('label'=>'个人信息', 'icon'=>'cog', 'url'=>'#'),
);
?>
<?php
/*$this->menu=array(
    array('label'=>'Section 1', 'content'=>'<p>I\'m in Section 1.</p>', 'active'=>true),
    array('label'=>'Section 2', 'content'=>'<p>Howdy, I\'m in Section 2.</p>'),
    array('label'=>'Section 3', 'content'=>'<p>What up girl, this is Section 3.</p>'),
);*/ ?>

<h1>我的面试</h1>
<hr>
    <div class="search-result">
<?php
        $dataInterview = new CArrayDataProvider(array(
            array('id'=>1,'type'=>'prepare', 'date'=>'2009-09-09',
                'companyName'=>'华为科技有限公司','position'=>'客服经理',
                'prepareUrl'=>array(array('title'=>'华为科技公司','url'=>"www.baidu.com"),array('title'=>'华为科技公司面试题','url'=>"www.baidu.com"))),
            array('id'=>2,'type'=>'summary', 'date'=>'2009-09-20',
                'companyName'=>'华为科技有限公司','position'=>'客服经理',
                'content'=>"阿毛接到华为通知后通过面试吧查找了阿猫的面试总结，太牛逼了，然后就华丽丽的拿到了offer。阿毛接到华为通知后通过面试吧查找了阿猫的面试总结，太牛逼了，然后就华丽丽的拿到了offer。"),
            array('id'=>3,'type'=>'summary', 'date'=>'2013-09-09',
                'companyName'=>'百度','position'=>'客服经理',
                'content'=>"阿毛接到华为通知后通过面试吧查找了阿猫的面试总结，太牛逼了，然后就华丽丽的拿到了offer。阿毛接到华为通知后通过面试吧查找了阿猫的面试总结，太牛逼了，然后就华丽丽的拿到了offer。"),
        ));
        $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$dataInterview,
            'itemView'=>'_interview',
            "itemsCssClass"=>"",
            'template'=>'<ul class="timeline">{items}</ul>',
        ));
        Yii::app()->clientScript->registerScript('collect', "
        var data = [
  {
    'title': '华为-客户经理',
    'date': '2009-08-12',
    'type': 'prepare',
    'prepareUrl': ['http://builtbybalance.com/github-timeline','http://www.flickr.com/photos/mikebaird/2529507825/']
  },
  {
    'title': '华为-客户经理',
    'date': '2009-08-20',
    'type': 'summary',
    'content': 'Lorem ipsum dolor sit amet, catibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu'
  },
  {
    'title': 'This timeline uses JSON data directly',
    'date': '27 Mar 2008',
    'type': 'prepare',
    'prepareUrl': ['http://builtbybalance.com/github-timeline','http://www.flickr.com/photos/mikebaird/2529507825/']
  },
];
     ");
?>
    </div>