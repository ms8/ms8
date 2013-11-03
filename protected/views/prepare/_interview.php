<li class="event">
    <input type="radio" name="interview" <?php if($index == 0)echo "checked"; ?>/>
    <label></label>
    <div class="thumb"><?php echo $data['date'] ?></div>
    <div class="content-perspective">
        <div class="content">
            <div class="content-inner fa fa-caret-left">
                <?php if($data['type'] == "prepare"){?>
                <h4>准备了<strong><?php echo $data['companyName']."-".$data['position'] ?></strong>面试</h4>
                <p>
                <?php foreach($data['prepareUrl'] as $prepareUrl){
                        echo CHtml::link(CHtml::encode($prepareUrl['title']),$prepareUrl['url'],array("target"=>"_blank"))."<br/>";
                }?>
                </p>
                <?php }elseif($data['type'] == "summary"){?>
                <h4><a href="javascript:;">对<strong><?php echo $data['companyName']."-".$data['position'] ?></strong>做了面试总结</a></h4>
                <p><?php echo mb_substr($data['content'],0,90,"utf-8")."......<a  href='javascript:;'>详细内容</a>" ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</li>