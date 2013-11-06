<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="content">
        <div class="home_wrapper">
            <div class="container-fluid sidebar_content">
                <div class="row-fluid">
                    <div id="container" class="span8">
                        <?php echo $content; ?>
                    </div><!-- content -->
                    <div id="sidebar" class="span4 sidebar">
                        <?php
//                        $this->widget('bootstrap.widgets.TbMenu', array(
//                            'type'=>'list',
//                            'items'=>$this->menu,
//                        ));
                        if( isset($this->sidebar) && !empty($this->sidebar)){
                            $this->widget($this->sidebar['widgets'],$this->sidebar['options']);
                        }
//                        $this->widget('bootstrap.widgets.TbListView',array(
//                            'dataProvider'=>$sidebarData,
//                            'itemView'=>'_search2',
//                            "itemsCssClass"=>"row-fluid items",
//                            'template'=>'<div class="list papertest">{items}</div>',
//                        ));

                        ?>
                    </div><!-- sidebar -->
                </div>
            </div>
        </div>
    </div>
<?php
Yii::app()->clientScript->registerScript('sidebar', "
    $('.sidebar').height($('.sidebar_content').height()+100);
");
$this->endContent(); ?>