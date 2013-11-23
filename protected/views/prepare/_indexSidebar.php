<div class="row-fluid" style="margin-bottom: 20px;">
    <div class="span3 pic">
        <a href="#">
            <?php echo CHtml::image(Yii::app()->request->baseUrl."/"."$data[picPath]","",array("class"=>"img-polaroid2")); ?>
        </a>
    </div>
    <div class="span9 info">
        <a href="?r=prepare/interview&username=<?php echo $data['username'] ?>&prepareID=<?php echo $data['prepareID'] ?>">
            <?php echo "$data[username]  面试了"."$data[companyName]".
                "<strong>$data[position]</strong>" ?>
        </a>
        <div class="datetime">时间：<?php echo "$data[time]" ?></div>
    </div>

</div>