<?php
/* @var $this ConcernController */
/* @var $dataProvider CActiveDataProvider */

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/timeline.css");

$this->breadcrumbs=array(
	'Concerns',
);

//$this->menu=array(
//	array('label'=>'Create Concern', 'url'=>array('create')),
//	array('label'=>'Manage Concern', 'url'=>array('admin')),
//);
?>

<h1>
    <?php
    echo "我关注的面试";
    ?>

</h1>
<hr>
<div class="search-result">
    <?php
    $this->widget('bootstrap.widgets.TbListView',array(
        'dataProvider'=>$dataInterview,
        'itemView'=>'_interview',
        "itemsCssClass"=>"",
        'template'=>'<ul class="timeline">{items}</ul>',
    ));
    ?>
</div>
<!--    <br>-->
<?php //$this->widget('CLinkPager',array(
//    'pages'=>$dataProvider->pagination))?>