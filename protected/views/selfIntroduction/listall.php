<?php
$this->breadcrumbs=array(
	'自我介绍',
);

?>

<h1>自我介绍</h1>
<?php
function dpButton(){
    return 'CHtml::link("求点评","index.php?r=SelfIntroduction/view&id=$data[intro_id]",array("class"=>"btn btn-primary"))';
}

$this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$dataProvider,
    'type'=>'striped bordered condensed',
    'hideHeader'=>true,
    'template'=>"{items}",
    'columns'=>array(
        array('type'=>'raw','name'=>'pic','value'=>'CHtml::image(Yii::app()->request->baseUrl."/".$data[pic],"",array("width"=>50,"class"=>"img-polaroid"))',),
        array('name'=>'self_introduction','value'=>'mb_substr($data[self_introduction],0,100,"utf-8")."......"',),
        array(
            'type'=>'raw',
            'htmlOptions'=>array("width"=>"100"),
            'value'=>dpButton(),
        ),
    ),
))  ?>
