
<h1>面试总结</h1>


<div class="row-fluid">
    <div class="span12">
        <?php

        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_summaryview',
            "itemsCssClass"=>"row-fluid items",
            'template'=>'<div class="list">{items}</div>',
            'sorterCssClass'=>'sorter_container',//定义sorter的div容器的class
            'sorterHeader'=>'更改排序：',//定义的文字显示在sorter可排序属性的前面
            'sorterFooter'=>'',//定义的文字显示在sorter可排序属性的后面
        ));
        ?>
    </div>
</div>