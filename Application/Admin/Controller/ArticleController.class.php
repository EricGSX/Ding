<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/4/3
 * Time: 13:12
 */
namespace Admin\Controller;
use Think\Controller;

class ArticleController extends DingController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 帖子列表
     *
     * @access public
     */
    public function showlist()
    {
        for($i=0;$i<10;$i++)
        {
            $table  = 'mg' . $i;
            $info[] = M($table)->where('del = 0')->select();
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
        $this->display();
    }


    /**
     * 删除商品
     *
     * @access public
     * @param  array $params
     * @return bool
     */
    public function del(array $params = array())
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
                'del' => 1,
            );
            $db     = $uid%10;
            $table  = 'mg' . $db;
            $result = D($table)->where($map)->save($data);
            if($result === 1)
            {
                $this->success('删除成功');
            }else
            {
                $this->error('错误');
            }
        }
    }


    /**
     *  审核
     *
     * @access public
     */
    public function audit()
    {
        if(!$_POST)
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
            $result = D($table)->where($map)->find();
            if($result )
            {
                $this->assign('info',$result);
            }else
            {
                $this->error('错误');
            }
            $this->display('detail');
        }elseif ($_POST)
        {
            $data = I('param.');
            $data['creat_time'] = time();
            $uid    = $data['uid'];
            $aid    = $data['aid'];
            $status = $data['status'];
            $map  = array(
                'uid' => $uid,
                'id'  => $aid,
            );
            $data = array(
                'status' => $status,
            );
            $db     = $uid%10;
            $table  = 'mg' . $db;
            $result = D($table)->where($map)->save($data);
            if($result)
            {
                $this->success('审核成功','showlist');
            }else
            {
                echo D()->getLastSql();die;
                $this->error('审核失败');
            }
        }
    }
}