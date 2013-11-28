<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-19
 * Time: 下午8:09
 * To change this template use File | Settings | File Templates.
 */

class RegisterForm extends CFormModel{
    public $username;
    public $password;
    public $confirmpassword;
    public $email;

    private $_userManagement;
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('username, password,confirmpassword,email', 'required'),
            array('username', 'checkUser'),
            array('email', 'checkEmail'),
            array('confirmpassword', 'compare', 'compareAttribute'=>'password')
            // password needs to be authenticated
            //array('password', 'authenticate'),
        );
    }

    public function checkUser($attribute,$params){
        $this->_userManagement=new UserManagement();
        if($this->_userManagement->checkUser($this))
            $this->addError('username','已经存在此用户');
    }

    public function checkEmail($attribute,$params){
        $this->_userManagement=new UserManagement();
        if($this->_userManagement->checkEmail($this))
            $this->addError('email','此邮箱已被注册');
    }

/*
    public function getErrors($attribute=null)
    {
        $errors = array(
            'username' => '用户名',
            'email' => '邮箱',
            'password' => '密码'
        );
        if($attribute===null)
            return $this->_errors;
        else
            return isset($this->_errors[$attribute]) ? $this->_errors[$attribute] : array();
    }
*/
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'username' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
            'confirmpassword'=>'确认密码'
        );
    }



    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function register()
    {
        $user = new User();
        $user->user_name=$this->username;
        $user->password=$this->password;
        $user->email=$this->email;
        $user->pic = 'upload/grava.jpg';
        if($this->_userManagement===null)
        {
            $this->_userManagement=new UserManagement();
            $this->_userManagement->register($user);
        }
        return true;
    }
}