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
            ->select('prepareID, prepare.userID, prepare.username, pic,companyName,position,from_unixtime(prepare.time) time')
            ->from('prepare,user')
            ->where('prepare.userID=user.userID')
            ->order('prepare.time desc')
            ->limit(10)
            ->queryAll();
        $i=1;
        foreach ($users as $user ){

            $prepareID = $user['prepareID'];
            $userID = $user['userID'];
            $username = $user['username'];
            $pic = $user['pic'];
            $companyName = $user['companyName'];
            $position = $user['position'];
            $time = $user['time'];
            $address = '北京';
            $prepareForm = new PrepareForm($i,$userID,$username,$pic,$prepareID,$time,$address,$companyName,$position);
            $tmp = TransformUtil::objectToArray($prepareForm);
            $prepares[] = $tmp;
            $i++;
        }
        return $this->prepares;
    }
}