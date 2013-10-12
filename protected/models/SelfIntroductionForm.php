<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-26
 * Time: 下午11:00
 * To change this template use File | Settings | File Templates.
 */

class SelfIntroductionForm {
    public $id;
    public $userID;
    public $username;
    public $picPath;
    public $intro_id;
    public $school;
    public $major;
    public $selfintroduction;
    public $time;
    public $address;

    public function __construct($id,$userID,$username,$picPath,$intro_id,$school,$major,$self_introduction,$time){
        $this->id = $id;
        $this->userID = $userID;
        $this->username = $username;
        $this->picPath = $picPath;
        $this->intro_id = $intro_id;
        $this->school = $school;
        $this->major = $major;
        $this->selfintroduction = $self_introduction;
        $this->time = $time;
        $this->address = '上海';
    }
}