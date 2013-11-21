<?php
$this->breadcrumbs=array(
	'Summaries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Summary','url'=>array('index')),
	array('label'=>'Create Summary','url'=>array('create')),
	array('label'=>'Update Summary','url'=>array('update','id'=>$model->summary_id)),
	array('label'=>'Delete Summary','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->summary_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Summary','url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'company_name',
		'position_name',
		'language',
		'dress',
		'format',
		'atmosphere',
		'rounds',
		'impression',
		'result',
		'tips',
		'exam_content',
		'experience',
		'status',
	),
));
?>
<a class="btn btn-primary btn-lg" role="button" href="index.php?r=Summary/update&id=<?php echo $model->summary_id; ?>">编辑</a><br>

同步到：
<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
    <a class="bds_qzone"></a>
    <a class="bds_tsina"></a>
    <a class="bds_tqq"></a>
    <a class="bds_renren"></a>
    <a class="bds_t163"></a>
    <span class="bds_more"></span>
    <a class="shareCount"></a>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=378542" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->

