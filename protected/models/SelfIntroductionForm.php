<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-26
 * Time: 下午11:00
 * To change this template use File | Settings | File Templates.
 */

class SelfIntroductionForm {
    public $userID;
    public $username;
    public $picPath;
    public $intro_id;
    public $school;
    public $major;
    public $self_introduction;
    public $time;

    public function __construct($userID,$username,$picPath,$intro_id,$school,$major,$self_introduction,$time){
        $this->userID = $userID;
        $this->username = $username;
        $this->picPath = $picPath;
        $this->intro_id = $intro_id;
        $this->school = $school;
        $this->major = $major;
        $this->self_introduction = $self_introduction;
        $this->time = $time;
    }
}