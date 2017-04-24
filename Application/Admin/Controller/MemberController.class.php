<?php
/**
 * Created by PhpStorm.
 * User: Ding
 * Date: 2017/4/3
 * Time: 20:24
 */
namespace Admin\Controller;
use Think\Controller;

class MemberController extends DingController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  会员列表
     *  @access public
     */
    public function showlist()
    {
        $user  = M('user');
        $count = $user->count();
        $page  = new \Think\Page($count,2);
        $show  = $page->show();
        $list  = $user->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('info',$list);
        $this->display();
    }
}