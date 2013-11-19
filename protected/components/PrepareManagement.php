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
        $prepares = array();
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
            if($pic == "")
                $pic = 'upload/grava.jpg';
            $companyName = $user['companyName'];
            $position = $user['position'];
            $time = $user['time'];
            $address = '北京';
            $prepareForm = new PrepareForm($username,$pic,$prepareID,$time,$address,$companyName,$position);
            $tmp = TransformUtil::objectToArray($prepareForm);
            $prepares[] = $tmp;
            $i++;
        }
        return $prepares;
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
     * 获取该用户最近n条准备的面试主表信息
     * @param $username 用户名
     * @param $n
     * @return Prepare对象数组
     */
    public function getMyPrepare($username,$n){
        $prepareArray = Yii::app()->db->createCommand()
            ->select('prepareID,user_name,companyName,position,date_format(time,\'%Y-%c-%d\') time')
            ->from('prepare')
            ->where('user_name=\''.$username.'\'')
            ->order('time desc')
            ->limit($n)
            ->queryAll();
        return $prepareArray;
    }

    /**
     * 根据面试准备ID获取具体的url信息
     * @param $prepareID
     * @return
     */
    public function getMyPrepareDetail($prepareID){
        $details = Yii::app()->db->createCommand()
            ->select('title,url')
            ->from('prepare_detail')
            ->where('prepareID='.$prepareID)
            ->queryAll();
        return $details;
    }

    public function getRelatePrepare($company,$position){
        $relates = Yii::app()->db->createCommand()
            ->select('prepareID,user.user_name,companyName,position,user.pic,prepare.time time')
            ->from('prepare,user')
            ->where('prepare.user_name=user.user_name and ((companyName=\''.$company.'\' and position=\''.$position.'\') or(position=\''.$position.'\'))')
            ->order('prepare.time desc')
            ->limit(10)
            ->queryAll();
        $i = 1;
        $prepares = array();
        foreach ($relates as $relate ){
            $prepareID = $relate['prepareID'];
            $username = $relate['user_name'];
            $pic = $relate['pic'];
            if($pic == "")
                $pic = 'upload/grava.jpg';
            $companyName = $relate['companyName'];
            $position = $relate['position'];
            $time = $relate['time'];
            $address = '北京';
            $prepareForm = new PrepareForm($username,$pic,$prepareID,$time,$address,$companyName,$position);
            $tmp = TransformUtil::objectToArray($prepareForm);
            $prepares[] = $tmp;
            $i++;
        }
        return $prepares;
    }

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