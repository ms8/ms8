<?php

class SelfIntroductionController extends Controller
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
				'actions'=>array('index','view','indexAll'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),//原来是@
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),//原来是admin
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

        //获取该自我介绍ID下的所有的评论信息
        $dataProvider=new CActiveDataProvider('SelfIntroductionComment', array(
            'criteria'=>array(
                //这里的user_id要用当前登录用户的
                'condition'=>'intro_id='."'".$id."'",
                'order'=>'time DESC',
            ),
            'pagination'=>array(
                'pageSize'=>5,
            ),
        ));
        //获得该id下的自我介绍内容
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SelfIntroduction;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SelfIntroduction']))
		{
			$model->attributes=$_POST['SelfIntroduction'];
            $model->user_name=Yii::app()->user->name;
			if($model->save())
				$this->redirect(array('view','id'=>$model->intro_id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['SelfIntroduction']))
		{
			$model->attributes=$_POST['SelfIntroduction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->intro_id));
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
	 * Lists all models.当前用户的自我介绍，用于个人中心
	 */
	public function actionIndex()
	{
        //获取当前登录用户下的自我介绍列表；
            $user_name=Yii::app()->user->name;

        $dataProvider=new CActiveDataProvider('SelfIntroduction', array(
            'criteria'=>array(
                //这里的user_id要用当前登录用户的
                'condition'=>'user_name='."'".$user_name."'",
                'order'=>'intro_id DESC',
            ),
            'pagination'=>array(
                'pageSize'=>20,
            ),
        ));
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
	}
    /**
     * Lists all models.用于首页的更多，这个方法要放到site里去
     *
     */
    public function actionIndexAll()
    {
        $dataProvider=new CActiveDataProvider('SelfIntroduction');
        $this->render('/site/selfintroductionList',array(
            'dataProvider'=>$dataProvider,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SelfIntroduction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SelfIntroduction']))
			$model->attributes=$_GET['SelfIntroduction'];

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
		$model=SelfIntroduction::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='self-introduction-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
