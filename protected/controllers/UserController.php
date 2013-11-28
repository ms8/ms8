<?php

class UserController extends Controller
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
				'actions'=>array('create','update','myscore','changepwd','changePic','savePic','changepwdSave'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
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
	public function actionView($user_name)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($user_name),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->userID));
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
	public function actionUpdate()
	{
        $id=Yii::app()->user->id;
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','user_name'=>$model->user_name));

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

    public function actionIndex()
    {
        //获取当前登录用户；
        $user_name=Yii::app()->user->name;
        $model=$this->loadModel($user_name);

//        $dataProvider=new CActiveDataProvider('User', array(
//            'criteria'=>array(
//                //这里的user_id要用当前登录用户的
//                'condition'=>'user_name='."'".$user_name."'",
//            ),
//            'pagination'=>array(
//                'pageSize'=>20,
//            ),
//        ));

//        $this->render('index',array(
//            'dataProvider'=>$dataProvider,
//        ));
        $this->render('index',array(
            'model'=>$model,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    //修改密码
    public function actionChangepwd()
    {
        $user_name=Yii::app()->user->name;
        $model=$this->loadModel($user_name);

//        if(!empty($_POST['User'])){
//            //获取验证错误,需要制定验证字段
//            $ajaxRes = CActiveForm::validate($model, array('oldpass','newpass','queren'),true,true);
//            $ajaxResArr = CJSON::decode($ajaxRes);
//            //验证结果为空入库
//            if(empty($ajaxResArr)){
//
//                $model->password = md5($model->password.$model->salt);
//
//                if($model->save(false)){
//                    $res = $model->attributes;
//                    $res['status'] = 1;
//                    die(CJSON::encode($res));
//                }else{
//                    die(CJSON::encode(array('status'=>0)));
//                }
//            }else{
//                die($ajaxRes);
//            }
//        }
        $this->render('changepwd',array('model'=>$model));
    }

    public function actionChangepwdSave(){
        $user_name=Yii::app()->user->name;
        $model=$this->loadModel($user_name);
        $model->password = $_POST['password'];
        $um = new UserManagement();
        $um->register($model);
        $result = json_encode(array("result"=>"ok"));
        echo $result;
    }

    //我的积分
    public function actionMyscore(){

        $id=Yii::app()->user->id;
        $model=$this->loadModel($id);
        $this->render('myscore',array(
            'model'=>$model,
        ));

    }

    /**
     * 更换头像
     */
    public function actionChangePic(){
        $id=Yii::app()->user->id;
        $model=$this->loadModel($id);
        $this->render('mypic',array(
            'model'=>$model,
        ));
    }

    /**
     * 保存新头像
     */
    public function actionSavePic(){
        $action = $_GET['act'];
        $userName=Yii::app()->user->id;
        $model=$this->loadModel($userName);
        if($action=='delimg'){
            $filename = $_POST['imagename'];
            if(!empty($filename)){
                unlink('files/'.$filename);
                echo '1';
            }else{
                echo '删除失败.';
            }
        }else{
            $picname = $_FILES['sampleImage']['name'];
            $picsize = $_FILES['sampleImage']['size'];
            if ($picname != "") {
                if ($picsize > 1024000) {
                    echo '图片大小不能超过1M';
                    exit;
                }
                $type = strstr($picname, '.');
                $type = strtolower($type);
                if ($type != ".gif" && $type != ".jpg"  && $type != ".pjpeg" && $type != ".jpeg" && $type != ".png" ) {
                    echo '图片格式不对！';
                    exit;
                }
                $pic_path = "upload/touxiang/".$userName."_". $_FILES["sampleImage"]["name"];
                move_uploaded_file($_FILES["sampleImage"]["tmp_name"],$pic_path);

            }
            $oldPath = $model->getAttribute("pic");
            $model->setAttribute('pic',$pic_path);
            //更新失败就用系统默认头像
            if(!$model->update()){
                $pic_path = 'upload/grava.jpg';
            }
            //删除原有照片,但如果原有照片是默认头像，则不能删除
            if($oldPath != "" && file_exists($oldPath) && $oldPath != "upload/grava.jpg"){
                unlink($oldPath);
            }

            $size = round($picsize/1024,2);
            $arr = array(
                'name'=>$picname,
                'pic'=>$pic_path,
                'size'=>$size
            );

            echo json_encode($arr);
        }
    }

    /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByAttributes( array('user_name' =>$id));

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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
