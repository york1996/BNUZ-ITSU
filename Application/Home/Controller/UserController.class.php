<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        if(!$_SESSION['id']){
            $this->error('未登录','__APP__');
        }
        //学时查询
        $student=M('student');
        $tc=M('tc');
        $tcc = M('tcc');
        $value = session('name');//获取姓名
        $id= session('id');//获取学号
        $info=$student->where("name='$value'")->find();//学生信息
        $this->assign('vo',$info);//视图赋值
        $tcInfo=$tc->where("id=$id")->select();//学生科技学时信息
        $this->assign('tcinfo',$tcInfo);
        $sumScore = $tc->where("id=$id")->sum('score');
        $this->assign('score',$sumScore);
        $tcInfo=$tcc->where("id=$id")->select();//学生服务时长信息
        $this->assign('tccinfo',$tcInfo);
        $sumScore = $tcc->where("id=$id")->sum('score');
        $this->assign('tccscore',$sumScore);
        $this->display();
    }

    public function update(){
        $student=M('student');
        $id= session('id');
        $password=md5($_POST['password']);
        $repasswd=md5($_POST['repasswd']);
        if($password!=$repasswd){
            $this->error('两次输入的密码不同,请重新输入');
        }else{
            $student-> where("id=$id")->setField('password',$password);
            $this->success('修改成功!');
        }

    }
}