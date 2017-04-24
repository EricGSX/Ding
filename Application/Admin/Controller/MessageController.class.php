<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/4/2
 * Time: 23:23
 */
namespace Admin\Controller;
use Think\Controller;

class MessageController extends  DingController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  网站信息
     *
     * @access public
     */
    public function web()
    {
        $this->display();
    }


    /**
     * 个人信息
     *
     * @access public
     */
    public function my()
    {
//        $_SESSION['admin_id'] = 57;
        $admin_id = $_SESSION['admin_id'];
        $info     = M('admin')->where("id = $admin_id")->find();
        $info['ip'] = $_SERVER["REMOTE_ADDR"];
        $this->assign('admin_info',$info);
        $this->display();
    }

}