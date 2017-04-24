<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/4/2
 * Time: 21:55
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{

    /**
     *  论坛首页
     *
     * @access public
     */
    public function index()
    {
        $userInfo = array();
        if(!$_SESSION['id'])
        {
            $visitor = 1;
        }else
        {
            $uid   = $_SESSION['id'];
            $userInfo = M('user')->find($uid);
        }

        for($i=0;$i<10;$i++)
        {
            $table  = 'mg' . $i;
            $info[] = M($table)->where('del = 0')->order('creat_time desc')->select();
        }
        $rec = array_filter($info);
        foreach($rec as $v)
        {
            foreach($v as $value)
            {
                $result[] = $value;
            }
        }

        $this->assign('visitor',$visitor);
        $this->assign('userInfo',$userInfo);
        $this->assign('info',$result);
        $this->display();
    }


    /**
     * 单个帖子详情
     *
     * @access public
     */
    public function detail()
    {
        for($i=0;$i<10;$i++)
        {
            $table  = 'mg' . $i;
            $info[] = M($table)->where('del = 0')->order('creat_time desc')->select();
        }
        $rec = array_filter($info);
        foreach($rec as $v)
        {
            foreach($v as $value)
            {
                $result[] = $value;
            }
        }

        $params = I('param.');
        $uid    = $params['uid'];
        $aid    = $params['aid'];
        $db     = $uid%10;
        $table  = 'mg' . $db;
        $info   = M($table)->find($aid);

        $adb    = $aid%10;
        $tab    = 'replay' . $adb;
        $rep    = M($tab)->where("mid=$aid")->order('creat_time desc')->select();

        $this->assign('replay',$rep);
        $this->assign('info',$info);
        $this->assign('new_info',$result);
        $this->display();
    }
}