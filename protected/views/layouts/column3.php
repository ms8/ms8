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
                        /*
                        $this->widget('bootstrap.widgets.TbMenu', array(
                            'type'=>'list',
                            'items'=>$this->menu,
                        ));*/
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