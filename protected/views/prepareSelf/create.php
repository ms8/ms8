<?php
$this->breadcrumbs=array(
	'Prepare Selves'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrepareSelf','url'=>array('index')),
	array('label'=>'Manage PrepareSelf','url'=>array('admin')),
);
?>

<h1>面试准备</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cn'=>$cn,'en'=>$en,'others'=>$others,'zhengzhuang'=>$zhengzhuang,
'xiuxian'=>$xiuxian,
    'danmian'=>$danmian,
    'qunmian'=>$qunmian,
    'jinzhang'=>$jinzhang,
    'qingsong'=>$qingsong,
    'rounds'=>$rounds,
    'bad'=>$bad,
    'normal'=>$normal,
    'good'=>$good,
    'selfintroduction'=>$selfintroduction,
    'preparedata'=>$preparedata,
)); ?>