<li class="event">
    <input type="radio" name="interview" <?php if($index == 0)echo "checked"; ?>/>
    <label></label>
    <div class="thumb"><?php echo $data['date'] ?></div>
    <div class="content-perspective">
        <div class="content">
            <div class="content-inner fa fa-caret-left">
                <?php if($data['type'] == "prepare"){?>
                <h4>准备了<strong><?php echo $data['companyName']."-".$data['position'] ?></strong>面试
                    <button class="btn btn-primary"
                            onclick="concern('<?php echo $data['id']?>',
                                '<?php echo $data['userName']?>',
                                '<?php echo $data['companyName']?>',
                                '<?php echo $data['position']?>')">
                        关注</button>
                </h4>
                <p>
                <?php foreach($data['prepareUrl'] as $prepareUrl){
                        echo CHtml::link(CHtml::encode($prepareUrl['title']),$prepareUrl['url'],array("target"=>"_blank"))."<br/>";
                }?>
                </p>
                <?php }elseif($data['type'] == "summary"){?>
                <h4>
                    <a href="javascript:;">对<strong><?php echo $data['companyName']."-".$data['position'] ?></strong>做了面试总结</a>
                    <button class="btn btn-primary"
                            onclick="concern('<?php echo $data['id']?>',
                                '<?php echo $data['userName']?>',
                                '<?php echo $data['companyName']?>',
                                '<?php echo $data['position']?>')">
                        关注</button>
                </h4>
                <p><?php echo mb_substr($data['content'],0,90,"utf-8")."......<a  href='javascript:;'>详细内容</a>" ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</li>

<script type="text/javascript">
    function concern(id,userName,company,position){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'id':id,'userName':userName,'company':company,'position':position},
            url:'?r=concern/create',
            success:function(json) {
                if(json.prepareId != ""){
                    alert('关注成功');
                }
            }
        });
    }
</script>