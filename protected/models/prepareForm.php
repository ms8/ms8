<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-21
 * Time: 上午11:14
 * 用于传递给首页的用户最新面试信息
 */

class prepareForm {
    public $userID;
    public $username;
    public $picPath;
    public $prepareID;
    public $title;
    public $time;

    /**
     * 构造函数，new prepareForm(...)时调用
     * @param $userID
     * @param $username
     * @param $picPath
     * @param $prepareID
     * @param $title
     * @param $time
     */
    function __construct($userID,$username,$picPath,$prepareID,$title,$time) {
        $this->userID = $userID;
        $this->username = $username;
        $this->picPath = $picPath;
        $this->prepareID = $prepareID;
        $this->title = $title;
        $this->time = $time;
    }
}