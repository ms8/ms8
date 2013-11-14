<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hohowu
 * Date: 13-11-11
 * Time: 下午9:31
 * To change this template use File | Settings | File Templates.
 */

class SummaryForm {
    public $summaryID;
    public $username;
    public $picPath;
    public $time;
    public $companyName;
    public $position;
    public $title;
    public $experience;

    public function __construct($summaryID,$username,$picPath,$time,$companyName,$position,$title,$experience){
        $this->summaryID = $summaryID;
        $this->username = $username;
        $this->picPath = $picPath;
        $this->time = $time;
        $this->companyName = $companyName;
        $this->position = $position;
        $this->title=$title;
        $this->experience=$experience;
    }
}