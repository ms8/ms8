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
        //进入首页时，取1.最新10条用户动态，即最新的面试准备信息；2.最新的10条自我介绍 3.最新10条求人品
        /* */
        $management = new PrepareManagement();
        $prepareForms = $management->getLatestPrepare();
        $userManagement = new UserManagement();
        $selfIntroductions = $userManagement->getLatestIntroduction();
        $preparedata= new CArrayDataProvider($prepareForms);
        $introductiondata = new CArrayDataProvider($selfIntroductions);
        $loginForm = new LoginForm();
        //$prepareForm = new PrepareForm();

        $this->render('index',array('preparedata'=>$preparedata,'introductiondata'=>$introductiondata,'loginForm'=>$loginForm));

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
                $this->redirect(Yii::app()->user->returnUrl);
               // $this->redirect('index.php');
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