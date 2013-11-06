<ul class="unstyled" style="line-height: 25px;height:25px;">
    <div style="float: left"><?php echo CHtml::link(CHtml::encode($data['title']),$data['url'],array("target"=>"_blank","type"=>$data['type'])); ?></div>
    <button class='btn btn-primary' style='float:left;margin-left:20px;display: none;'>收藏</button>
</ul>