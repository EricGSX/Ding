<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends DingController
{


    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  后台首页
     *
     * @access
     */
    public function index()
    {
        $this->display();
    }
}