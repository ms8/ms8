<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hohowu
 * Date: 13-11-11
 * Time: 下午9:20
 * To change this template use File | Settings | File Templates.
 */

class SummaryManagement {

    public $summary = array();
    public function getLatestSummary(){
        $summary = array();
        $results = Yii::app()->db->createCommand()
            ->select('summary_id, summary.user_name, pic,company_name,position_name,title,time,experience')
            ->from('summary,user')
            ->where('summary.user_name=user.user_name and summary.status=1')
            ->order('summary.time desc')
            ->limit(10)
            ->queryAll();
        foreach ($results as $sum ){
            $summaryID=$sum['summary_id'];
             $username=$sum['user_name'];
             $picPath=$sum['pic'];
             $time=$sum['time'];
             $companyName=$sum['company_name'];
             $position=$sum['position_name'];
             $title=$sum['title'];
             $experience=$sum['experience'];
            $summaryForm = new SummaryForm($summaryID,$username,$picPath,$time,$companyName,$position,$title,$experience);
            $tmp = TransformUtil::objectToArray($summaryForm);
            $summary[] = $tmp;
        }
        return $summary;
    }
}