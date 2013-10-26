<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-21
 * Time: 上午11:34
 * To change this template use File | Settings | File Templates.
 */

class PrepareManagement {

    public $prepares = array();
    public function getLatestPrepare(){
        $users = Yii::app()->db->createCommand()
            ->select('prepareID, prepare.user_name, pic,companyName,position,prepare.time time')
            ->from('prepare,user')
            ->where('prepare.user_name=user.user_name')
            ->order('prepare.time desc')
            ->limit(10)
            ->queryAll();
        $i=1;
        foreach ($users as $user ){

            $prepareID = $user['prepareID'];
            $username = $user['user_name'];
            $pic = $user['pic'];
            $companyName = $user['companyName'];
            $position = $user['position'];
            $time = $user['time'];
            $address = '北京';
            $prepareForm = new PrepareForm($i,$username,$pic,$prepareID,$time,$address,$companyName,$position);
            $tmp = TransformUtil::objectToArray($prepareForm);
            $prepares[] = $tmp;
            $i++;
        }
        return $this->prepares;
    }

    public function savePrepare($prepare,$prepareDetailArray){
        $connection = Yii::app()->db;
        $transaction = $connection->beginTransaction();
        try
        {
            $prepare->save();
            $prepareId = $prepare->attributes['prepareID'];
            foreach ($prepareDetailArray as $detail ){
                $detail->prepareID = $prepareId;
                $detail->save();
            }
            $transaction->commit();
        } catch(Exception $e) {
            $transaction->rollBack();   // 在异常处理中回滚
        }
    }

    /**
     * 获取该用户最近n条准备的面试
     * @param $username 用户名
     * @param $n
     * @return Prepare对象数组
     */
    public function getMyPrepare($username,$n){
        $criteria=new CDbCriteria;
        $criteria->select='*';
        $criteria->condition='user_name=:username';
        $criteria->order='time desc';
        $criteria->limit=$n;
        $criteria->params=array(':username'=>$username);
        $prepareArray=Prepare::model()->find($criteria);
        return $prepareArray;
    }

//    /**
//     * 根据准备ID获取该次面试准备的url极其对应标题
//     * @param $prepareID
//     * @return PrepareDetail对象数组
//     */
//    public function getPrepareDetail($prepareID){
//        $criteria=new CDbCriteria;
//        $criteria->select='*'; // select all
//        $criteria->condition='prepareID=:prepareID';
//        $criteria->order='type';
//        $criteria->params=array(':prepareID'=>$prepareID);
//        $prepareDetailArray=PrepareDetail::model()->find($criteria);
//        return $prepareDetailArray;
//    }


    /**
     * 获取该用户最近一条准备的面试
     * @param $username 用户名
     * @return Prepare对象或者null
     */
    public function getMyLatestPrepare($username){
        $prepareArray=$this->getMyPrepare($username,1);
        if(count($prepareArray) > 0){
            return $prepareArray[0];
        }else{
            return null;
        }
    }


}