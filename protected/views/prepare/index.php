
<?php
$this->breadcrumbs=array(
	'Prepares',
);

/*$this->menu=array(
	array('label'=>'我的面试','url'=>array('create')),
	array('label'=>'自我介绍','url'=>array('admin')),
    array('label'=>'站内信','url'=>array('create')),
    array('label'=>'我关注的面试','url'=>array('admin')),
    array('label'=>'个人信息','url'=>array('admin')),
);*/
?>
<?php $this->menu=array(
    array('label'=>'Section 1', 'content'=>'<p>I\'m in Section 1.</p>', 'active'=>true),
    array('label'=>'Section 2', 'content'=>'<p>Howdy, I\'m in Section 2.</p>'),
    array('label'=>'Section 3', 'content'=>'<p>What up girl, this is Section 3.</p>'),
); ?>

<h1>Prepares</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
echo $information["url"];
echo $information["title"];
?>
       </div>
    </div>
