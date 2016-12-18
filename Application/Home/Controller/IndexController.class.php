<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $article = M('article');
        $list = $article->order("create_time desc")->limit(10)->select();
        $list2 = M('active')->order("id desc")->limit(4)->select();
        $this->assign('list',$list);
        $this->assign('list2',$list2);
        $this->display();
    }
    public function login($username = null, $password = null){
        if(IS_POST){
            $db = M('student');
            $map['id'] = $username;
            $user = $db->where($map)->find();
            if(!$user){
                $this->error('帐号不存在或被禁用');
            }
            if($user['password'] != md5($password)){
                $this->error('密码错误');
            }
            /* 记录登录SESSION */
            session('name',$user['name']);
            session('id',$user['id']);

            $this->success('登录成功！', U('Index/Index'));

        } else {
            $this->display();
        }
    }

    public function logout(){
        if(session('name')!=null){
            session('name', null);
            session('id', null);
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }
    }
}