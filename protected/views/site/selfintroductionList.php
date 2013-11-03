<?php
$this->breadcrumbs=array(
	'自我介绍',
);

?>

<h1>自我介绍</h1>

<?php //$this->widget('bootstrap.widgets.TbListView',array(
	//'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
//)); ?>


<?php
function formatButton(){
    return 'CHtml::link("求点评","index.php?r=SelfIntroduction/view&id=$data[intro_id]",array("class"=>"btn btn-primary"))';
}

$this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$dataProvider,
    'type'=>'striped bordered condensed',
    'hideHeader'=>true,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'self_introduction','value'=>'mb_substr($data->self_introduction,0,100,"utf-8")."......"',),
        array(
            'type'=>'raw',
            'htmlOptions'=>array("width"=>"100"),
            'value'=>formatButton(),
            // 'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
))  ?>
