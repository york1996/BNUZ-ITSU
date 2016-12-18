<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    /*后台登录*/
    public function login($username = null, $password = null){
        if(IS_POST){
            $db = M('admin');
            $map['username'] = $username;
            $user = $db->where($map)->find();
            if(!$user){
                $this->error('帐号不存在或被禁用');
            }
            if($user['password'] != md5($password)){
                $this->error('密码错误');
            }
            /* 记录登录SESSION和COOKIES */
            $auth = array(
                'uid'             => $user['uid'],
                'username'        => $user['nickname'],
            );
            session('user', $auth);
            session('nickname',$user['nickname']);
            $this->success('登录成功！', U('Index/Index'));

        } else {
            if(is_login()){
                $this->redirect('Index/Index');
            }else{
                $this->display();
            }
        }
    }
    /* 退出登录 */
    public function logout(){
        if(is_login()){
            session('user', null);
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }
    }
}
?>