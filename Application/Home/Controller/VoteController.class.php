<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/3/15
 * Time: 13:11
 */

namespace Home\Controller;
use Think\Controller;

class VoteController extends Controller{
    public function index(){
        $Article = M('vote'); // 实例化User对象
        $count      = $Article->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Article->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    public function view($id=0){
        $Article=M('vote');
        $voting = M('voting');
        $list=$Article->where("id=$id")->find();
        $this->assign('vo',$list);
        $vote = $voting->where("id=$id")->select();
        $this->assign('vote',$vote);
        $this->display();

    }
    public function voting(){
        if(!$_SESSION['id']){
            $this->error('请登录后再投票');
        }
        $vote = M('voting');
        $votes = M('votes');
        $student=$data ['student'] = session('id');
        $selectname = $data ['selectname'] = $_POST['vote'];
        $id = $data ['classify'] = $_POST['id'];
        if($votes->where("student=$student AND classify=$id")->count()){
            $this->error('你只能投一次票哦~');
        }
        $votes->add($data);
        $vote->where("selectname='$selectname' AND id=$id")->setInc('countvotes',1);
        $this->success('投票成功');
    }
}