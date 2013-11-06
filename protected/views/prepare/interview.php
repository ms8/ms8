<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/timeline.css");
/* @var $model PrepareForm */

$this->breadcrumbs=array(
	'Prepares',
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
//        $dataInterview = new CArrayDataProvider(array(
//            array('id'=>1,'type'=>'prepare', 'date'=>'2009-09-09',
//                'companyName'=>'华为科技有限公司','position'=>'客服经理',
//                'prepareUrl'=>array(array('title'=>'华为科技公司','url'=>"www.baidu.com"),array('title'=>'华为科技公司面试题','url'=>"www.baidu.com"))),
//            array('id'=>2,'type'=>'summary', 'date'=>'2009-09-20',
//                'companyName'=>'华为科技有限公司','position'=>'客服经理',
//                'content'=>"阿毛接到华为通知后通过面试吧查找了阿猫的面试总结，太牛逼了，然后就华丽丽的拿到了offer。阿毛接到华为通知后通过面试吧查找了阿猫的面试总结，太牛逼了，然后就华丽丽的拿到了offer。"),
//            array('id'=>3,'type'=>'summary', 'date'=>'2013-09-09',
//                'companyName'=>'百度','position'=>'客服经理',
//                'content'=>"阿毛接到华为通知后通过面试吧查找了阿猫的面试总结，太牛逼了，然后就华丽丽的拿到了offer。阿毛接到华为通知后通过面试吧查找了阿猫的面试总结，太牛逼了，然后就华丽丽的拿到了offer。"),
//        ));
        $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$dataInterview,
            'itemView'=>'_interview',
            "itemsCssClass"=>"",
            'template'=>'<ul class="timeline">{items}</ul>',
        ));
?>
    </div>