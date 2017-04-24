<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/3/30
 * Time: 22:22
 */
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller
{
    /**
     *  管理员登录
     *
     * @access public
     */
    public function login()
    {
        if($_POST['nickname'])
        {
            $content = I('post.');
            $map     = array(
                'nickname' => $content['nickname'],
                'password' => md5($content['password'] . 'GD'),
            );
            $info = D('admin')->where($map)->find();
            if($info)
            {
                $_SESSION = array(
                    'admin_id'       => $info['id'],
                    'nickname' => $info['nickname'],
                );
                $map = array(
                    'online_time' => time(),
                );
                $id = $info['id'];
                D('admin')->where("id = $id")->save($map);
                $this->success('登陆成功',U('Index/index'),1);
            }
        }else
        {
            $this->display('ding');
        }
    }


    /**
     *  退出登录
     *
     * @access public
     */
    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        header('location:/index.php/Admin/admin/login');
    }
}
