<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-21
 * Time: 上午11:14
 * 用于传递给首页的用户最新面试信息
 */

class PrepareForm {
    public $userID;
    public $username;
    public $picPath;
    public $prepareID;
    public $time;
    public $address;
    public $companyName;
    public $position;

    public function __construct($userID,$username,$picPath,$prepareID,$time,$address,$companyName,$position){
        $this->userID = $userID;
        $this->username = $username;
        $this->picPath = $picPath;
        $this->prepareID = $prepareID;
        $this->time = $time;
        $this->address = $address;
        $this->companyName = $companyName;
        $this->position = $position;
    }
}