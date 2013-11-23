
<h1>面试准备</h1>

<div class="row-fluid">
    <div class="span12">
        <?php

        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_prepareview',
            "itemsCssClass"=>"row-fluid items",
//            'template'=>'<div class="list">{items}{pager}</div>',
            'template'=>'<div class="summary">{summary}</div><div class="sorter">{sorter}</div><div class="list">{items}</div><div class="pager">{pager}</div>',
            'sorterCssClass'=>'sorter_container',//定义sorter的div容器的class
            'sorterHeader'=>'更改排序：',//定义的文字显示在sorter可排序属性的前面
            'sorterFooter'=>'',//定义的文字显示在sorter可排序属性的后面
            'pager' => array(//pager 的配置信息。默认为array('class'=>'CLinkPager').也可以自己配置
                'pageSize'=> 1,
                'nextPageLabel' => '下一页 »',
                'prevPageLabel' => '« 上一页'
            ),
        ));
        $this->widget('CLinkPager',array( 'pages'=>$dataProvider->pagination))
        ?>
    </div>
</div>