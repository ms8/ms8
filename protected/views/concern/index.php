<?php
/* @var $this ConcernController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Concerns',
);

$this->menu=array(
	array('label'=>'Create Concern', 'url'=>array('create')),
	array('label'=>'Manage Concern', 'url'=>array('admin')),
);
?>

<h1>Concerns</h1>

<?php
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//));
?>

<?php foreach($dataProvider->data as $concern):?>
    <?php echo $concern->prepare_user.'-'.$concern->companyName.'-'.$concern->position?>
    <br>
<?php endforeach ?>
<br>
<?php $this->widget('CLinkPager',array(
    'pages'=>$dataProvider->pagination))?>
