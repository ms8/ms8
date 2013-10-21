<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-21
 * Time: 上午11:14
 * 用于传递给首页的用户最新面试信息
 */

class PrepareForm {
    public $id;
    public $userID;
    public $username;
    public $picPath;
    public $prepareID;
    public $time;
    public $address;
    public $companyName;
    public $position;

    public function __construct($id,$username,$picPath,$prepareID,$time,$address,$companyName,$position){
        $this->id = $id;
        $this->username = $username;
        $this->picPath = $picPath;
        $this->prepareID = $prepareID;
        $this->time = $time;
        $this->address = $address;
        $this->companyName = $companyName;
        $this->position = $position;
    }
}