<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="home_wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
                <div id="sidebar">
                    <?php
                    /*
                    $this->beginWidget('zii.widgets.CPortlet', array(
                        'title'=>'个人中心',
                    ));
                    $this->widget('zii.widgets.CMenu', array(
                        'items'=>$this->menu,
                        'htmlOptions'=>array('class'=>'operations'),
                    ));
                    $this->endWidget();*/
                    $this->widget('bootstrap.widgets.TbTabs', array(
                        'type'=>'tabs',
                        'placement'=>'left', // 'above', 'right', 'below' or 'left'
                        'tabs'=>$this->menu
                    ));
                    ?>
                </div><!-- sidebar -->
                <div id="content">
                    <?php echo $content; ?>
                </div><!-- content -->
            <?php $this->endContent(); ?>
        </div>
    </div>
</div>