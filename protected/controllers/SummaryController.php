<?php

class SummaryController extends Controller
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
				'actions'=>array('index','view','list'),
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
		$model=new Summary;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Summary']))
		{
			$model->attributes=$_POST['Summary'];
            $model->user_name=Yii::app()->user->name;
            $model->time=date("Y-m-d H:i:s");
			if($model->save())
            {
                $score= new ScoreCal;
                $score->scoreCalculate("分享面经",500);

                $this->redirect(array('view','id'=>$model->summary_id));
            }

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

		if(isset($_POST['Summary']))
		{
			$model->attributes=$_POST['Summary'];
            $model->user_name=Yii::app()->user->name;
            $model->time=date("Y-m-d H:i:s");
			if($model->save())
				$this->redirect(array('view','id'=>$model->summary_id));
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
        //获取当前登录用户下的自我介绍列表；
        $user_name=Yii::app()->user->name;

        $dataProvider=new CActiveDataProvider('Summary', array(
            'criteria'=>array(
                //这里的user_id要用当前登录用户的
                'condition'=>'user_name='."'".$user_name."'",
                'order'=>'summary_id DESC',
            ),
            'pagination'=>array(
                'pageSize'=>10,
            ),
        ));

        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
	}

    public function actionList()
    {
//        $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM summary')->queryScalar();
//        $sql='SELECT summary_id as id,summary_id, summary.user_name, pic,company_name,position_name,title,time,experience FROM user,summary
//         where summary.user_name=user.user_name and summary.status=1 order by summary.time
//         desc';
//        $dataProvider=new CSqlDataProvider($sql, array(
//            'totalItemCount'=>$count,
//            'pagination'=>array(
//                'pageSize'=>10,
//            ),
//        ));
        if (Yii::app()->request->isAjaxRequest) {
//            $rawdata = Yii::app()->db->createCommand('SELECT summary_id as id,summary_id, summary.user_name, pic,company_name,position_name,title,time,experience FROM user,summary  where summary.user_name=user.user_name and summary.status=1 order by summary.time')->queryAll();
//            $dataProvider=new CArrayDataProvider($rawdata, array(
//                'pagination'=>array(
//                    'pageSize'=>20,
//                ),
//            ));
            $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM summary')->queryScalar();
            $sql='SELECT summary_id as id,summary_id, summary.user_name, pic,company_name,position_name,title,time,experience FROM user,summary
             where summary.user_name=user.user_name and summary.status=1 order by summary.time
             desc';
            $dataProvider=new CSqlDataProvider($sql, array(
                'totalItemCount'=>2,
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            ));
            	$this->renderPartial('listall',array(
                         'dataProvider'=>$dataProvider,
	            ));
        }else{
            $rawdata = Yii::app()->db->createCommand('SELECT summary_id as id,summary_id, summary.user_name, pic,company_name,position_name,title,time,experience FROM user,summary  where summary.user_name=user.user_name and summary.status=1 order by summary.time')->queryAll();
            $dataProvider=new CArrayDataProvider($rawdata, array(
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));
            $this->render('listall',array(
                'dataProvider'=>$dataProvider,
            ));
        }
    }
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Summary('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Summary']))
			$model->attributes=$_GET['Summary'];

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
		$model=Summary::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='summary-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
