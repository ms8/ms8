<?php
if ($index%2===0 && $index !=0){
    echo "</div><div class='row-fluid items'>";
}
?>
<div class="span6">
    <div class="span4 pic">
    <a href="#">
        <?php echo CHtml::image(Yii::app()->request->baseUrl."/"."$data[picPath]","",array("width"=>100,"class"=>"img-polaroid")); ?>
    </a>
    </div>
    <div class="span8 info">
        <a href="?r=prepare/interview&username=<?php echo $data['username'] ?>&prepareID=<?php echo $data['prepareID'] ?>">
            <?php echo "$data[username]  面试了<br/>"."$data[companyName]<br/>".
                "<strong>$data[position]</strong>" ?>
        </a>
        <div class="datetime"><?php echo "$data[time]" ?></div>
    </div>

</div>