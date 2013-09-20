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
            array('username, password,email', 'required'),
            // password needs to be authenticated
            //array('password', 'authenticate'),
        );
    }



    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function register()
    {
        $user = new User();
        $user->username=$this->username;
        $user->password=$this->password;
        $user->email=$this->email;
        if($this->_userManagement===null)
        {
            $this->_userManagement=new UserManagement();
            $this->_userManagement->register($user);
        }
        return true;
    }
}