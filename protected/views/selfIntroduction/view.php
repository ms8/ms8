 <?php
$this->breadcrumbs=array(
	'Self Introductions'=>array('index'),
	$model->intro_id,
);

$this->menu=array(
	array('label'=>'自我介绍列表','url'=>array('index')),
	array('label'=>'新建自我介绍','url'=>array('create')),
	array('label'=>'更新自我介绍','url'=>array('update','id'=>$model->intro_id)),
	array('label'=>'删除自我介绍','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->intro_id),'confirm'=>'确定要删除这条自我介绍?')),
	array('label'=>'管理自我介绍','url'=>array('admin')),
);
?>
<?/*php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'self_introduction:html:',
	),
)); */?>

 <div class="jumbotron">
     <h1>自我介绍</h1>
     <p><?php echo $model->self_introduction; ?></p>
     <p><a class="btn btn-primary btn-lg" role="button" href="index.php?r=SelfIntroduction/update&id=<?php echo $model->intro_id; ?>">编辑</a></p>
 </div>

<?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'SelfIntroductionComment',
    "action"=>array("selfIntroductionComment/createIndex"),
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
)); ?>

    <div>
        <input type="textArea" name="SelfIntroductionComment[content]" rows=5 class="span12">
        <input type="hidden" name="SelfIntroductionComment[intro_id]" value=<?php echo $model->intro_id ?> >
    </div>

    <div class="span2">
        <button type="submit" class="btn btn-primary">评论</button>
    </div>
<?php $this->endWidget(); ?>
<br>
    <h2>评论列表</h2>
<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_viewcomment',
)); ?>