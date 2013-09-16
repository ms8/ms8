<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="home_wrapper">
<div class="container-fluid home_content">
    <div class="row-fluid hero_bar"><!-- start hero -->
        <div class="span12">
            <div class="row-fluid">
                <br>
                <div class="span9 offset1 home-hero">

                    <div class="row-fluid">
                        <div class="span11 offset1">
                            <div class="row-fluid">
                                <div class="span5">
                                    <h3>公司</h3>
                                </div>
                                <div class="span5">
                                    <h3>职位</h3>
                                </div>
                            </div>

                            <div class="row-fluid">

                                <div class="span5">
                                    <input type="text" class="span12 search_input" placeholder="您将面试的公司?">
                                </div>

                                <div class="span4">
                                    <select class="home_select">
                                        <option value="0">客户经理</option>
                                        <option value="0">开发人员</option>
                                    </select>
                                </div>

                                <div class="span2">
                                    <a class="btn btn-primary btn-success search_btn" href="browse.html">查找</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row-fluid">
                        <div class="span12">

                            <div class="row-fluid">
                                <div class="span3 offset1">
                                    <h3>Post a job</h3>
                                    <a href="post-job.html">Fast and free, with upgrade options</a><br>
                                </div>
                                <div class="span3 offset1">
                                    <h3>Browse jobs</h3>
                                    <a href="browse.html">Find the perfect job for you</a><br>
                                </div>
                                <div class="span3 offset1">
                                    <h3>Register</h3>
                                    <a href="register.html">Apply for jobs quickly and easily</a><br>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>




            </div>



        </div>


    </div>
</div><!-- end hero -->
<div class="container-fluid home_main_content">
<div class="row-fluid">

<div class="span9">

    <div class="row-fluid">

        <div class="span12">
            <h2>featured jobs</h2>
            <table class="table table-striped">
                <tbody>
                <tr class="success">
                    <td> <span class="label label-warning">Full time</span> </td>
                    <td><strong><a href="view-job.html">Mobile Software Engineer</a></strong><br>
                        <a href="#">Teleworm Corp</a> – Posted by <a href="#">Teleworm</a>
                    </td>
                    <td>Austin<br>Texas, United States</td>
                    <td> 10 Jan 2013</td>
                </tr>
                <tr class="success">
                    <td><span class="label label-success">Part time</span></td>
                    <td><strong><a href="view-job.html">Lead UI Programmer</a></strong><br>
                        <a href="#">ArmySpy Corp</a> – Posted by <a href="#">ArmySpy</a>
                    </td>
                    <td>New York<br>NY, United States</td>
                    <td> 12 Jan 2013</td>
                </tr>
                <tr class="">
                    <td><span class="label label-info">Temporary</span></td>
                    <td><strong><a href="view-job.html">PHP (Zend, Magento) Developer (Permanent)</a></strong><br>
                        <a href="#">DayRep Corp</a> – Posted by <a href="#">DayRep</a>
                    </td>
                    <td>Montreal<br>QC, Canada</td>
                    <td> 17 Jan 2013</td>
                </tr>
                <tr class="">
                    <td><span class="label label-info">Temporary</span></td>
                    <td><strong><a href="view-job.html">Node.js developer (6+ month project)</a></strong><br>
                        <a href="#">BioWare</a> – Posted by <a href="#">RevivalToys</a>
                    </td>
                    <td>London<br>Tottenham, Great Britain</td>
                    <td> 23 Jan 2013</td>
                </tr>	                <tr class="">
                    <td><span class="label label-inverse">Freelance</span></td>
                    <td><strong><a href="view-job.html">Refrigeration Repair Technician</a></strong><br>
                        <a href="#">DietDisorder Corp</a> – Posted by <a href="#">DietDisorder</a>
                    </td>
                    <td>Cambridge<br>Cambridge, Great Britain</td>
                    <td> 23 Jan 2013</td>
                </tr>	                <tr class="">
                    <td><span class="label label-inverse">Freelance</span></td>
                    <td><strong><a href="view-job.html">Senior Windows Administrator</a></strong><br>
                        <a href="#">BioWare</a> – Posted by <a href="#">RevivalToys</a>
                    </td>
                    <td>Hong Kong, China</td>
                    <td> 23 Jan 2013</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="row-fluid">

        <div class="span12">
            <h2>latest jobs</h2>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><span class="label label-success">Part time</span></td>
                    <td><strong><a href="view-job.html">Refrigeration Repair Technician</a></strong><br>
                        <a href="#">Sears Corp</a> – Posted by <a href="#">appthemedemo</a>
                    </td>
                    <td>Austin<br>Texas, United States</td>
                    <td> 23 Jan 2013</td>
                </tr>
                <tr class="success">
                    <td><span class="label label-warning">Full time</span></td>
                    <td><strong><a href="view-job.html">UI Developer</a></strong><br>
                        <a href="#">BioWare Intl</a> – Posted by <a href="#">Bio</a>
                    </td>
                    <td>New York<br>NY, United States</td>
                    <td> 23 Jan 2013</td>
                </tr>
                <tr class="">
                    <td><span class="label label-success">Part time</span></td>
                    <td><strong><a href="view-job.html">Refrigeration Repair Technician</a></strong><br>
                        <a href="#">Sears Corp</a> – Posted by <a href="#">Casino</a>
                    </td>
                    <td>London<br>Tottenham, Great Britain</td>
                    <td> 23 Jan 2013</td>
                </tr>
                <tr class="">
                    <td><span class="label label-success">Part time</span></td>
                    <td><strong><a href="view-job.html">Sr. Information Security Analyst</a></strong><br>
                        <a href="#">Pivotal Labs</a> – Posted by <a href="#">Paul Smith</a>
                    </td>
                    <td>Austin<br>Texas, United States</td>
                    <td> 23 Jan 2013</td>
                </tr>	                <tr class="success">
                    <td><span class="label label-inverse">Freelance</span></td>
                    <td><strong><a href="view-job.html">Linux System Administrator</a></strong><br>
                        <a href="#">Poker Studios</a> – Posted by <a href="#">Moker man</a>
                    </td>
                    <td>London<br>Tottenham, Great Britain</td>
                    <td> 23 Jan 2013</td>
                </tr><tr class="">
                    <td><span class="label label-inverse">Freelance</span></td>
                    <td><strong><a href="view-job.html">Front-end Developer</a></strong><br>
                        <a href="#">Scripts Snapper</a> – Posted by <a href="#">Snapper</a>
                    </td>
                    <td>Hong Kong, China</td>
                    <td> 23 Jan 2013</td>
                </tr><tr class="">
                    <td><span class="label label-inverse">Freelance</span></td>
                    <td><strong><a href="view-job.html">Software Developer PHP and/or C# and .NET</a></strong><br>
                        <a href="#">Sears Corp</a> – Posted by <a href="#">appthemedemo</a>
                    </td>
                    <td>Austin<br>Texas, United States</td>
                    <td> 23 Jan 2013</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="span3">
    <h2>&nbsp;</h2>
    <div class="row-fluid">
        <div class="span12 center">
            <a class="btn btn-primary btn-large post_job" href="post-job.html">post a job<br><small>(it's free!)</small></a>
        </div>
    </div>
    <br>
    <h2>Browse jobs</h2>
    <div class="row-fluid">
        <div class="span12">
            <select class="span12" id="job_term_cat" name="job_term_cat">
                <option value="">Job category...</option>
                <option value="38" class="level-0">Automotive</option>
                <option value="43" class="level-1">&nbsp;&nbsp;&nbsp;Electrical</option>
                <option value="40" class="level-1">&nbsp;&nbsp;&nbsp;Inspection</option>
                <option value="41" class="level-1">&nbsp;&nbsp;&nbsp;Painting</option>
                <option value="39" class="level-1">&nbsp;&nbsp;&nbsp;Service</option>
                <option value="42" class="level-1">&nbsp;&nbsp;&nbsp;Upholstry</option>
                <option value="20" class="level-0">Construction</option>
                <option value="29" class="level-1">&nbsp;&nbsp;&nbsp;Carpenter</option>
                <option value="44" class="level-1">&nbsp;&nbsp;&nbsp;Electrician</option>
                <option value="34" class="level-1">&nbsp;&nbsp;&nbsp;Flooring</option>
                <option value="36" class="level-1">&nbsp;&nbsp;&nbsp;Foundation Repair</option>
                <option value="33" class="level-1">&nbsp;&nbsp;&nbsp;General Maintence</option>
                <option value="37" class="level-1">&nbsp;&nbsp;&nbsp;Inspections</option>
                <option value="35" class="level-1">&nbsp;&nbsp;&nbsp;Insulation</option>
                <option value="31" class="level-1">&nbsp;&nbsp;&nbsp;Mason</option>
                <option value="32" class="level-1">&nbsp;&nbsp;&nbsp;Painter</option>
                <option value="30" class="level-1">&nbsp;&nbsp;&nbsp;Plumber</option>
                <option value="50" class="level-0">Fashion</option>
                <option value="23" class="level-0">Food Service</option>
                <option value="24" class="level-1">&nbsp;&nbsp;&nbsp;Bartender</option>
                <option value="28" class="level-1">&nbsp;&nbsp;&nbsp;Cook</option>
                <option value="25" class="level-1">&nbsp;&nbsp;&nbsp;Hosting</option>
                <option value="26" class="level-1">&nbsp;&nbsp;&nbsp;Waiter</option>
                <option value="21" class="level-0">Insurance</option>
                <option value="22" class="level-0">Realtors</option>
                <option value="19" class="level-0">Technology</option>
                <option value="45" class="level-1">&nbsp;&nbsp;&nbsp;Engineering</option>
                <option value="46" class="level-1">&nbsp;&nbsp;&nbsp;Programming</option>
                <option value="47" class="level-1">&nbsp;&nbsp;&nbsp;Sys Admin</option>
            </select>


            <select id="job_type" name="job_type" class="span12">
                <option>Job type...</option>
                <option>&nbsp;&nbsp;&nbsp;Freelance</option>
                <option>&nbsp;&nbsp;&nbsp;Full-Time</option>
                <option>&nbsp;&nbsp;&nbsp;Internship</option>
                <option>&nbsp;&nbsp;&nbsp;Part-Time</option>
                <option>&nbsp;&nbsp;&nbsp;Temporary</option>
            </select>


            <select class="span12" id="job_term_salary" name="job_term_salary">
                <option value="">Job salary...</option>
                <option value="9" class="level-0">&nbsp;&nbsp;&nbsp;Less than 20,000</option>
                <option value="10" class="level-0">&nbsp;&nbsp;&nbsp;20,000 – 40,000</option>
                <option value="11" class="level-0">&nbsp;&nbsp;&nbsp;40,000 – 60,000</option>
                <option value="12" class="level-0">&nbsp;&nbsp;&nbsp;60,000 – 80,000</option>
                <option value="13" class="level-0">&nbsp;&nbsp;&nbsp;80,000 – 100,000</option>
                <option value="14" class="level-0">&nbsp;&nbsp;&nbsp;100,000 and above</option>
            </select>

            <select class="span12" id="job_term_salary2" name="job_term_salary2">
                <option value="">Date posted...</option>
                <option value="">Today</option>
                <option value="">This week</option>
                <option value="">Last week</option>
                <option value="">This month</option>
            </select>

            <a class="btn btn-large pull-right search_btn" href="browse.html">Search</a>

        </div>
    </div>
    <h2>Stay connected</h2>
    <div class="row-fluid">
        <div class="span12">
            <ul class="social-icons">
                <li><a href="#"><i class="icon-facebook-sign icon-2x"></i></a></li>
                <li><a href="#"><i class="icon-twitter-sign icon-2x"></i></a></li>
                <li><a href="#"><i class="icon-google-plus-sign icon-2x"></i></a></li>
                <li><a href="#"><i class="icon-linkedin-sign icon-2x"></i></a></li>
                <li><a href="#"><i class="icon-pinterest-sign icon-2x"></i></a></li>
            </ul>
            <p>Stay connected to the latest jobs, events and career advice.</p>
        </div>
    </div>


</div>
</div>
</div></div>
<!--
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Primary',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
)); ?>
-->
<!--
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
-->
<!--
百度地图
 #l-map{height:400px;width:78%;float:left;border-right:2px solid #bcbcbc;}
 #r-result{height:400px;width:20%;float:left;}
<div id="l-map"></div>
<div id="r-result"></div>
<script type="text/javascript">
/*
    // 百度地图API功能
    var map = new BMap.Map("l-map");            // 创建Map实例
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
    var local = new BMap.LocalSearch(map, {
        renderOptions: {map: map, panel: "r-result"}
    });
    local.setPageCapacity(4);
    local.search("华为");
    */
</script>
-->
