<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/7/27
 * Time: 18:24
 */
namespace Home\Controller;
use Think\Controller;

class CheckController extends Controller{
    public function index(){
        $this->display();
    }
    public function check(){
        $id=(int)$_GET['id'];
        $name = M('student')->where("id=$id")->find();
        $tc=M('tc');
        $tcc = M('tcc');
        $tcInfo=$tc->where("id=$id")->select();//学生科技学时信息
        $this->assign('tcinfo',$tcInfo);
        $sumScore = $tc->where("id=$id")->sum('score');
        $this->assign('score',$sumScore);
        $tcInfo=$tcc->where("id=$id")->select();//学生服务时长信息
        $this->assign('tccinfo',$tcInfo);
        $sumScore2 = $tcc->where("id=$id")->sum('score');
        $this->assign('tccscore',$sumScore2);
        $this->assign('id',$id);
        $this->assign('name',$name);
        $this->display();
    }
}