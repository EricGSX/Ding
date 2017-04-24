<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/3/30
 * Time: 21:55
 */
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class UserController extends  Controller
{


    /**
     * 会员登录
     *
     * @access public
     */
    public function login()
    {
        if(!empty($_POST))
        {
            $content = I('post.');
            $map     = array(
                'nickname' => $content['nickname'],
                'password' => md5($content['password'] . 'GD'),
            );
            $info = D('user')->where($map)->find();
            if($info)
            {
                $_SESSION = array(
                    'id'       => $info['id'],
                    'nickname' => $info['nickname'],
                );
                $new = array(
                    'online_time' => time(),
                );
                $id = $info['id'];
                D('user')->where("id = $id")->save($new);
                $this->success('登陆成功',U('Index/index'),1);
            }
        }else
        {
            $this->display('ding_login');
        }
    }


    /**
     *  会员注册
     *
     * @access public
     */
    public function register()
    {
        $model = D('user');
        if(!empty($_POST))
        {

            $info  = $model->create();
            $error = $model->getError();
            if($info)
            {
                $content = I('post.');
                $captcha = new Verify();
                if($captcha->check($content['captcha']))
                {
                    $map = array(
                        'nickname'    => $content['nickname'],
                        'online_time' => time(),
                        'token'       => sha1(uniqid() . 'GD'),
                        'password'    => md5($content['password'] .'GD'),
                    );
                    $result = $model->add($map);
                    if($result)
                    {
                        $this->success('注册成功','login',1);
                    }else
                    {
                        $this->error('系统发生错误','register',1);
                    }
                }else
                {
                    $wrong = '验证码错误';
                    $this->assign('captcha',$wrong);
                }
            }else
            {
                $this->assign('error',$error);
            }

        }else
        {
            $this->display('ding_register');
        }
    }


    /**
     * 生成验证码
     *
     * @access public
     */
    public function captcha_img()
    {
        $verify = new Verify();
        $verify->imageH   = 45;
        $verify->imageW   = 150;
        $verify->fontSize = 21;
        $verify->length   = 4;
        $verify->entry();
    }


    /**
     * 获取用户信息
     *
     * @access public
     * @param  array $params
     */
    public function get_user_innfo(array $params = array())
    {
        if(!empty($_SESSION))
        {
            $uid = $_SESSION['id'];
        }
        $uid  = $params['id'];
        $info = M('user')->find($uid);

        $this->access('userInfo',$info);
        $this->display();
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
        header('location:/index.php/Home/User/login');
    }


    /**
     *  我的帖子
     *
     * @access public
     */
    public function myself()
    {
        $uid = $_SESSION['id'];
        if(!$uid)
        {
            $this->login();
        }else
        {
            $db    = $uid%10;
            $table = 'mg' . $db;
            $map   = array(
                'uid' => $uid,
            );
            $info  = M($table)->where($map)->order('creat_time desc')->select();

            $uinfo = M('user')->find($uid);

            $this->assign('userInfo',$uinfo);
            $this->assign('info',$info);
            $this->display('ding_myself');
        }
    }
}