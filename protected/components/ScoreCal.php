<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hohowu
 * Date: 13-11-10
 * Time: 下午1:22
 * To change this template use File | Settings | File Templates.
 */

class ScoreCal {
    public function scoreCalculate($action,$score)
    {
        $time =date("Y-m-d H:i:s");
        $user_name = Yii::app()->user->name;
        $sql1 = "insert into Score(time,action,user_name,score) values('".$time."','".$action."','".$user_name."','".$score."')";
        $sql2 ="update User set score =score+'".$score."' where user_name='".$user_name."'";
        $connection = Yii::app()->db;
        $trans = $connection->beginTransaction();
        try{
            $connection->createCommand($sql1)->execute();
            $connection->createCommand($sql2)->execute();
            $trans->commit();
        } catch (Exception $e) {
            $trans->rollBack();
        }
    }
}