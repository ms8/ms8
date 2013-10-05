<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $preparedata= new CArrayDataProvider(array(
            array('id'=>1, 'username'=>'古大飞','picPath'=>'/assets/user/1.jpg',
                'companyName'=>'华为科技有限公司','position'=>'客服经理',
                'prepareID'=>'01', 'address'=>'北京', 'time'=>'2013-02-10'),
            array('id'=>2,'userID'=>'2',  'username'=>'王天好','picPath'=>'/assets/user/10.jpg',
                'companyName'=>'百度科技有限公司','position'=>'高级产品经理',
                'prepareID'=>'02','address'=>'上海', 'time'=>'2013-02-10'),
            array('id'=>3, 'userID'=>'3', 'username'=>'沈中期','picPath'=>'/assets/user/2.jpg',
                'companyName'=>'微软科技有限公司','position'=>'开发工程师',
                'prepareID'=>'03','address'=>'深圳', 'time'=>'2013-02-10'),
            array('id'=>4, 'username'=>'古大飞','picPath'=>'/assets/user/3.jpg',
                'companyName'=>'华为科技有限公司','position'=>'客服经理',
                'prepareID'=>'01', 'address'=>'北京', 'time'=>'2013-02-10'),
            array('id'=>5,'userID'=>'2',  'username'=>'王天好','picPath'=>'/assets/user/4.jpg',
                'companyName'=>'百度科技有限公司','position'=>'高级产品经理',
                'prepareID'=>'02','address'=>'上海', 'time'=>'2013-02-10'),
            array('id'=>6, 'userID'=>'3', 'username'=>'沈中期','picPath'=>'/assets/user/5.jpg',
                'companyName'=>'微软科技有限公司','position'=>'开发工程师',
                'prepareID'=>'03','address'=>'深圳', 'time'=>'2013-02-10'),
            array('id'=>7, 'username'=>'古大飞','picPath'=>'/assets/user/6.jpg',
                'companyName'=>'华为科技有限公司','position'=>'客服经理',
                'prepareID'=>'01', 'address'=>'北京', 'time'=>'2013-02-10'),
            array('id'=>8,'userID'=>'2',  'username'=>'王天好','picPath'=>'/assets/user/7.jpg',
                'companyName'=>'百度科技有限公司','position'=>'高级产品经理',
                'prepareID'=>'02','address'=>'上海', 'time'=>'2013-02-10'),
            array('id'=>9, 'userID'=>'3', 'username'=>'沈中期','picPath'=>'/assets/user/8.jpg',
                'companyName'=>'微软科技有限公司','position'=>'开发工程师',
                'prepareID'=>'03','address'=>'深圳', 'time'=>'2013-02-10'),
            array('id'=>10, 'userID'=>'3', 'username'=>'沈中期','picPath'=>'/assets/user/9.jpg',
                'companyName'=>'微软科技有限公司','position'=>'开发工程师',
                'prepareID'=>'03','address'=>'深圳', 'time'=>'2013-02-10'),
        ));
        $introductiondata = new CArrayDataProvider(array(
            array('id'=>1,'userID'=>'1', 'username'=>'古大飞','picPath'=>'/assets/user/5.jpg',
                'school'=>'清华大学','major'=>'计算机',
                'selfintroduction'=>'北航计算机硕士，创业公司www.souchang.com 搜畅网络技术公司(已经关闭)技术负责人,阿里巴巴高级工程师，京东商城技术经理，高级架构师. 我关注的项目特点：技术密集，功能简单，现有的主流应用，用新技术去颠覆。其他项目尽量不要ping 我. . . . . .', 'address'=>'上海', 'time'=>'2013-02-10'),
            array('id'=>2,'userID'=>'2',  'username'=>'王天好','picPath'=>'/assets/user/3.jpg',
                'school'=>'北京大学','major'=>'动漫设计',
                'selfintroduction'=>'互联网资深产品经理，曾经在雅虎、腾讯等大型互联网公司工作过，对于互联网产品丰富的实战经验；也曾独立创业过。目前在有道云笔记担任高级产品经理，负责有道云笔记的产品。. . . . . .','address'=>'杭州', 'time'=>'2013-02-10'),
            array('id'=>3, 'userID'=>'3', 'username'=>'沈中期','picPath'=>'/assets/user/7.jpg',
                'school'=>'华南理工大学','major'=>'动物医学',
                'selfintroduction'=>'1、六年资深教师，对中小学教育领悟深刻； 2、创业三年，拥有建班子、定战略、带队伍的成功经历； 3、目前正在二次创业，筹建一个将教育融入互联网的网站； ——创业资金、办公场地等都准备就绪，急需一个建站经验丰富的技术合伙人，有诚意者欢迎站内联系！. . . . . .','address'=>'天津', 'time'=>'2013-02-10'),
        ));
        $this->render('index',array('preparedata'=>$preparedata,'introductiondata'=>$introductiondata));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                //$this->redirect(Yii::app()->user->returnUrl);
                $this->redirect('index.php');
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    /**
     * Displays the register page
     */
    public function actionRegister()
    {
        $model=new RegisterForm();

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['RegisterForm']))
        {
            $model->attributes=$_POST['RegisterForm'];
            // validate user input and redirect to the previous page if valid
            /*if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
            */
            $model->register();
            $this->redirect('index.php');
            //注册成功后跳到首页
        }
        // display the login form
        //$this->render('login',array('model'=>$model));
        /**/
        $tmp = "";
        $this->render('register',array('model'=>$model));

    }
}