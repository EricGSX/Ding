<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/4/4
 * Time: 1:44
 */
namespace Admin\Controller;
use Think\Controller;

class DingController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
    }


    /**
     * 登录验证
     *
     * @access public
     */
    public function checkLogin()
    {
        $info = $_SESSION;
        if(empty($info))
        {
            $this->redirect('Admin/login', array(),1, '请登录后访问！！！');
        }
    }
}