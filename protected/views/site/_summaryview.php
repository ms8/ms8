<?php
if ($index%2===0 && $index !=0){
    echo "</div><div class='row-fluid items'>";
}
?>
<div class="span6">
    <div class="span4 pic">
    <a href="index.php?r=summary/view&id=<?php echo $data[summaryID];?>">
        <?php echo CHtml::image(Yii::app()->request->baseUrl."/".$data[picPath],"",array("width"=>100,"class"=>"img-polaroid")); ?>
    </a>
    </div>
    <div class="span8 info">
        <?php echo "$data[username] 分享了面经:<br/>"?>
        <a href="index.php?r=summary/view&id=<?php echo $data[summaryID];?>"><?php echo $data[title];?></a>
        <div class="datetime"><?php echo "$data[time]" ?></div>
    </div>

</div>