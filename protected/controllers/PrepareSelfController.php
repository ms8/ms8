<?php

class PrepareSelfController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column3';


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PrepareSelf;
//获取收藏信息
//1.从url中获取prepareID
        $prepareid= $_REQUEST['prepareid'];
        $preparedata=new CActiveDataProvider('PrepareDetail', array(
            'criteria'=>array(
                //这里的user_id要用当前登录用户的
                'condition'=>'prepareID='."'". $prepareid."'",
                'order'=>'detailID',
            ),
        ));
        //获取公司名称和职位信息
        //$company="华为";
       $company= $_REQUEST['company'];
        $position =$_REQUEST['position'];
        //获取面试语言
        $en=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and language='en'")->queryScalar();
        $cn=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and language='cn'")->queryScalar();
       $others=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and language='other'")->queryScalar();
//获取着装信息
        $zhengzhuang=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and dress='0'")->queryScalar();
        $xiuxian=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and dress='1'")->queryScalar();
//获取面试形式
        $danmian=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and format='0'")->queryScalar();
        $qunmian=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and format='1'")->queryScalar();
        //获取面试气氛
        $jinzhang=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and  atmosphere='0'")->queryScalar();
        $qingsong=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and  atmosphere='1'")->queryScalar();
//平均几轮面试
        $rounds=Yii::app()->db->createCommand("SELECT AVG(rounds) FROM summary where company_name='".$company."'")->queryScalar();
//获取职场环境
        $bad=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and  impression='0'")->queryScalar();
        $normal=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and  impression='1'")->queryScalar();
        $good=Yii::app()->db->createCommand("SELECT COUNT(*) FROM summary where company_name='".$company."' and  impression='2'")->queryScalar();

        //获取自我介绍信息

        $user_name =Yii::app()->user->name;
        $selfintroduction=new CActiveDataProvider('SelfIntroduction', array(
            'criteria'=>array(
                //这里的user_id要用当前登录用户的
                'condition'=>'user_name='."'".$user_name."'",
                'order'=>'intro_id DESC',
            ),
        ));

        // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PrepareSelf']))
		{
			$model->attributes=$_POST['PrepareSelf'];
            $model->prepare_id=$prepareid;

			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
                $this->redirect(array('prepare/interview'));
		}

		$this->render('create',array(
			'model'=>$model,
            'en'=>$en,
            'cn'=>$cn,
            'others'=>$others,
            'zhengzhuang'=>$zhengzhuang,
            'xiuxian'=>$xiuxian,
            'danmian'=>$danmian,
            'qunmian'=>$qunmian,
            'jinzhang'=>$jinzhang,
            'qingsong'=>$qingsong,
            'rounds'=>$rounds,
            'bad'=>$bad,
            'normal'=>$normal,
            'good'=>$good,
            'selfintroduction'=>$selfintroduction,
            'preparedata'=>$preparedata,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PrepareSelf']))
		{
			$model->attributes=$_POST['PrepareSelf'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PrepareSelf');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PrepareSelf('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PrepareSelf']))
			$model->attributes=$_GET['PrepareSelf'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=PrepareSelf::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prepare-self-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
