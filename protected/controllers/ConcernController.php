<?php

class ConcernController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'users'=>array('@'),
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
        $concern = new Concern();
        //关注的是谁的面试准备或总结
        $concern->prepare_user = $_POST['userName'];
        //对应了面试准备或总结的ID
        $concern->prepareID = $_POST['id'];
        $concern->companyName = $_POST['company'];
        $concern->position = $_POST['position'];
        $concern->user_name = Yii::app()->user->name;
        $concern->time = date("Y-m-d H:i:s");
        $concern->save();
        $concernId = $concern->attributes['concernID'];
        $concernId = json_encode(array("concernId"=>$concernId));
        echo $concernId;
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

		if(isset($_POST['Concern']))
		{
			$model->attributes=$_POST['Concern'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->concernID));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

//        $dataProvider=new CActiveDataProvider('Concern', array(
//            'criteria'=>array(
//                'condition'=>'user_name= :userName',
//                'params'=>array(':userName'=>Yii::app()->user->name),
//            ),
//            'pagination'=>array(
//                'pageSize'=>2,
//            ),
//        ));

        $ms = array();
        $pm  = new PrepareManagement();
        //取该用户最近十条面试准备信息
        $myPrepares = $pm->getMyConcerns(Yii::app()->user->name,10);
        foreach($myPrepares as $prepare){
            //取每条面试准备信息所保存的url和标题信息
            $details = $pm->getMyPrepareDetail($prepare['prepareID']);
            $prepares = array('id'=>$prepare['prepareID'],
                'type'=>'prepare','date'=>$prepare['time'],'companyName'=>$prepare['companyName'],
                'position'=>$prepare['position'],'userName'=>$prepare['prepare_user'],'prepareUrl'=>$details);
            $ms[] = $prepares;
        }
        $dataInterview = new CArrayDataProvider($ms);
        $this->render('index',array(
            'dataInterview'=>$dataInterview,
        ));

//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Concern('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Concern']))
			$model->attributes=$_GET['Concern'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Concern the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Concern::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Concern $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='concern-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
