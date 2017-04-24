<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/4/2
 * Time: 21:17
 */
namespace Home\Controller;
use Think\Controller;

class PostController extends Controller
{
    /**
     *  发帖
     *
     * @access public
     */
    public function send()
    {
        $uid = $_SESSION['id'];
        if(!$uid)
        {
            $this->error('还没有登录，请登陆后访问。',U('Home/User/login'),1);
        }else
        {
            if($_POST)
            {
                $upload = new \Think\Upload();
                $upload->maxSize   =     3145728 ;
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath  =     '/Ding';
                $upload->saveName  =     'Ding' . time();
                $info   =   $upload->upload();
                if(!$info)
                {
                    $this->error($upload->getError());
                }else
                {
                    $data = array(
                        'image'      => $info['pic']['savepath'] . $info['pic']['savename'],
                        'title'      => $_POST['title'],
                        'content'    => $_POST['content'],
                        'uid'        => $uid,
                        'creat_time' => time(),
                    );
                    $db     = $uid%10;
                    $table  = 'mg' . $db;
                    $result = D($table)->add($data);
                    if($result)
                    {
                        $this->success('添加成功',U('Home/Index/index'));
                    }else
                    {
                        $this->error('添加失败');
                    }
                }
            }else
            {
                $this->display('post');
            }
        }
    }


    /**
     *  回帖
     *
     * @access public
     */
    public function replay()
    {
        $uid      = $_SESSION['id'];
        $username = $_SESSION['nickname'];
        $date = array(
            'username'   => $username,
            'uid'        => $uid,
            'mid'        => $_POST['mid'],
            'content'    => $_POST['content'],
            'creat_time' => time(),
        );
        $db     = $_POST['mid']%10;
        $table  = 'replay' . $db;
        $result = D($table)->add($date);
        if($result)
        {
            $this->success('回复成功');
        }else
        {
            $this->error('人品差，出问题了');
        }
    }
}