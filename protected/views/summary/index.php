<?php
$this->breadcrumbs=array(
	'Summaries',
);

$this->menu=array(
	array('label'=>'Create Summary','url'=>array('create')),
	array('label'=>'Manage Summary','url'=>array('admin')),
);
?>

<h1>我的面试总结</h1>  <a class="btn btn-primary btn-large post_job" href="index.php?r=summary/create">记录面试经历<br><small>(总结自己不断提升!)</small></a>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$dataProvider,
    'type'=>'striped bordered condensed',
    'hideHeader'=>true,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'title','value'=>'mb_substr($data->title,0,10,"utf-8")."......"',),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
))  ?>
