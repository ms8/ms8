<?php
if ($index%2===0 && $index !=0){
    echo "</div><div class='row-fluid items'>";
}
?>
<div class="span6">
    <div class="span4 pic">
    <a href="#">
        <?php echo CHtml::image(Yii::app()->request->baseUrl."$data[picPath]","",array("width"=>100,"class"=>"img-polaroid")); ?>
    </a>
    </div>
    <div class="span8 info">
        <a href="#">
            <?php echo "$data[username]  面试了<br/>"."$data[companyName]<br/>".
                "<strong>$data[position]</strong>" ?>
        </a>
        <div class="datetime"><?php echo "$data[time]于$data[address]" ?></div>
    </div>

</div>