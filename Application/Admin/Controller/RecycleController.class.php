<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/4/4
 * Time: 0:06
 */
namespace Admin\Controller;
use Think\Controller;

class RecycleController extends DingController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     *  回收站
     *
     * @access public
     */
    public function rubbish()
    {
        for($i=0;$i<10;$i++)
        {
            $table  = 'mg' . $i;
            $info[] = M($table)->where('del = 1')->select();
        }
        $rec = array_filter($info);
        foreach($rec as $v)
        {
            foreach($v as $value)
            {
                $result[] = $value;
            }
        }
        $result = array_filter($result);
        $this->assign('info',$result);
        $this->display('showlist');
    }


    /**
     *  恢复
     *
     *  @access public
     */
    public function renew()
    {
        if($_GET)
        {
            $params = I('get.');
            $uid    = $params['uid'];
            $aid    = $params['aid'];
            $map  = array(
                'uid' => $uid,
                'id'  => $aid,
            );
            $data = array(
                'del' => 0,
            );
            $db     = $uid%10;
            $table  = 'mg' . $db;
            $result = D($table)->where($map)->save($data);
            if($result === 1)
            {
                $this->success('恢复成功');
            }else
            {
                $this->error('错误');
            }
        }
    }


    /**
     *  粉碎
     *
     *  @access public
     */
    public function smash()
    {
        if($_GET)
        {
            $params = I('get.');
            $uid    = $params['uid'];
            $aid    = $params['aid'];
            $map  = array(
                'uid' => $uid,
                'id'  => $aid,
            );
            $db     = $uid%10;
            $table  = 'mg' . $db;
            $result = D($table)->where($map)->delete();
            if($result === 1)
            {
                $this->success('粉碎成功');
            }else
            {
                $this->error('错误');
            }
        }
    }
}