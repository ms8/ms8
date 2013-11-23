<?php
class PrepareController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column3';
    public $sidebar=array();
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
                'actions'=>array('index','view',"save","interview","list"),
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
        $model=new Prepare;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Prepare']))
        {
            $model->attributes=$_POST['Prepare'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->prepareID));
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

        if(isset($_POST['Prepare']))
        {
            $model->attributes=$_POST['Prepare'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->prepareID));
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
        $information  = new GetInformation;
        $inforesult = "";
        // collect user input data
        if(isset($_POST['PrapareForm']))
        {
            $information->company=$_POST['PrapareForm']['company'];
            $information->position=$_POST['PrapareForm']['position'];
            $infoCompany =  $information->getCompanyIntro();
            $information->type= "薪酬";
            $infoRemuneration = $information->getResultList();
            $information->type= "面试";
            $infoInterview = $information->getResultList();
            $information->type= "笔试";
            $infoPaperTest = $information->getResultList();
            $pm  = new PrepareManagement();
            $prepareForms = $pm->getRelatePrepare($information->company,$information->position);
            $i = 1;
        }

        //$dataProvider=new CActiveDataProvider('Prepare');
        $dataProvider=array();
        $dataCompany=array();
        $dataRemuneration=array();
        $dataInterview=array();
        $dataPaperTest=array();
        $preparedata=array();
        $dataCompany = new CArrayDataProvider($infoCompany);
        $dataRemuneration=new CArrayDataProvider($infoRemuneration);
        $dataInterview = new CArrayDataProvider($infoInterview);
        $dataPaperTest = new CArrayDataProvider($infoPaperTest);
        $preparedata= new CArrayDataProvider($prepareForms);

        //$this->actionSave();

        // display the login form
        $this->render('index',array('dataProvider'=>$dataProvider,'dataCompany'=>$dataCompany,'company'=>$information->company,'position'=>$information->position,
            'dataRemuneration'=>$dataRemuneration,'dataInterview'=>$dataInterview,
            'sidebarData'=>$preparedata,
            'dataPaperTest'=>$dataPaperTest));
    }

    public function actionSave(){
        $prepare = new Prepare();
        $prepareId = $_POST['prepareId'];
        //第一次保存，这时候创建prepare主表信息，并将prepareId传回去
        if($prepareId == ""){
            $prepare->companyName = $_POST['company'];
            $prepare->position = $_POST['position'];
            $prepare->user_name = Yii::app()->user->name;
            $prepare->time = date("Y-m-d H:i:s");
            $prepare->summary = "";
            $prepare->save();
            $prepareId = $prepare->attributes['prepareID'];
        }
        $prepareDetail = new PrepareDetail();
        $prepareDetail->prepareID = $prepareId;
        $prepareDetail->title = $_POST['title'];
        $prepareDetail->url = $_POST['url'];
        $prepareDetail->type = $_POST['type'];
        $prepareDetail->save();
        $prepareId = json_encode(array("prepareId"=>$prepareId));


        echo $prepareId;
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Prepare('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Prepare']))
            $model->attributes=$_GET['Prepare'];

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
        $model=Prepare::model()->findByPk($id);
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='prepare-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    /**
     * 我的面试.
     */
    public function actionInterview()
    {
        $userName =  Yii::app()->user->name;
        $prepareID = "";
        if(isset($_GET['username'])){
            $userName = $_GET['username'];
            $prepareID = $_GET['prepareID'];
        }
        $ms = array();
        $pm  = new PrepareManagement();
        //取该用户最近十条面试准备信息
        $myPrepares = $pm->getMyPrepare($userName,10);
        foreach($myPrepares as $prepare){
            //取每条面试准备信息所保存的url和标题信息
            $details = $pm->getMyPrepareDetail($prepare['prepareID']);
            $prepares = array('id'=>$prepare['prepareID'],
                'type'=>'prepare','date'=>$prepare['time'],'companyName'=>$prepare['companyName'],
                'position'=>$prepare['position'],'userName'=>$prepare['user_name'],'prepareUrl'=>$details);
            $ms[] = $prepares;
        }
        $dataInterview = new CArrayDataProvider($ms);
        $this->render('interview',array(
            'dataInterview'=>$dataInterview,
            'userName'=>$userName,
            'prepareID'=>$prepareID
        ));
    }
    /**
     * 面试列表页面.
     */
    public function actionList()
    {
        $ms = array();
        $pm  = new PrepareManagement();
        //取该用户最近十条面试准备信息
        $myPrepares = $pm->getMyPrepare(Yii::app()->user->name,10);
        foreach($myPrepares as $prepare){
            //取每条面试准备信息所保存的url和标题信息
            $details = $pm->getMyPrepareDetail($prepare['prepareID']);
            $prepares = array('id'=>$prepare['prepareID'],
                'type'=>'prepare','date'=>$prepare['time'],'companyName'=>$prepare['companyName'],
                'position'=>$prepare['position'],'userName'=>$prepare['user_name'],'prepareUrl'=>$details);
            $ms[] = $prepares;
        }
        $dataInterview = new CArrayDataProvider($ms);
        $this->render('interview',array(
            'dataInterview'=>$dataInterview,
            'userName'=>""
        ));
    }
}
