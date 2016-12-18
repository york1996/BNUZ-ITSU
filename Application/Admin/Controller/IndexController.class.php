<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }else{
            $Article = M('article');
            $student = M('student');
            $admin = M('admin');

            $count = $Article->count();
            $count1 = $student->count();
            $count2= $admin->count();
            $time = NOW_TIME;
            $this->assign('vo',$count);
            $this->assign('no',$count1);
            $this->assign('so',$count2);
            $this->assign('time',$time);
            $this->display();
        }

    }
}