<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
    <div class="home_wrapper">
        <div class="container-fluid">
            <div class="row-fluid">
                    <div id="sidebar" class="span3">
                        <div  class="well">
                        <?php

                        /*$this->beginWidget('zii.widgets.CPortlet', array(
                            'title'=>'个人中心',
                        ));
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>$this->menu,
                            'htmlOptions'=>array('class'=>'operations'),
                        ));
                        $this->endWidget();*/
                        $this->widget('bootstrap.widgets.TbMenu', array(
                            'type'=>'list',
                            'items'=>$this->menu,
                        ));

                        /*$this->widget('bootstrap.widgets.TbTabs', array(
                            'type'=>'tabs',
                            'placement'=>'left', // 'above', 'right', 'below' or 'left'
                            'tabs'=>$this->menu
                        ));*/
                        ?>
                        </div>
                    </div><!-- sidebar -->
                    <div id="container" class="span9">
                        <div class="well">
                        <?php echo $content; ?>
                        </div>
                    </div><!-- content -->

            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>