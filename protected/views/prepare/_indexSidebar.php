<div class="row-fluid" style="margin-bottom: 20px;">
    <div class="span3 pic">
        <a href="#">
            <?php echo CHtml::image(Yii::app()->request->baseUrl."$data[picPath]","",array("width"=>50,"class"=>"img-polaroid")); ?>
        </a>
    </div>
    <div class="span9 info">
        <a href="#">
            <?php echo "$data[username]  面试了"."$data[companyName]".
                "<strong>$data[position]</strong>" ?>
        </a>
        <div class="datetime">时间：<?php echo "$data[time]" ?></div>
    </div>

</div>