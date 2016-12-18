<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/3/6
 * Time: 12:04
 */

namespace Admin\Controller;
use Think\Controller;

class VoteController extends Controller
{
    public function index(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $vote = M('vote');
        $count      = $vote->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $vote->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }

    public function add(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $vote = M('vote');
        if(IS_POST){
            if ($vote->create()) {
                $result = $vote->add();
                if ($result) {
                    $this->success('添加成功',U('Vote/Index'));
                } else {
                    $this->error('添加失败');
                }
            } else {
                $this->error($vote->getError());
            }
        }else{
            $this->display();
        }
    }
    public function addlabel($id=0){
        $Form   =   M('voting');
        $list = $Form->where("id=$id")->select();
        $this->assign('voo',$id);
        $this->assign('list',$list);
        $this->display();
    }
    public function addlabelinfo(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $voting=M('voting');
        if(IS_POST){
            if ($voting->create()) {
                $result = $voting->add();
                if ($result) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加失败');
                }
            } else {
                $this->error($voting->getError());
            }
        }
    }
    public function del($id=0){
        $vote=M('vote');
        $voting=M('voting');
        if($vote->where("id=$id")->delete()){
            $voting->where("id=$id")->delete();
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }
    public function off($id=0){
        $vote=M('vote');
        if($vote->where("id=$id")->setField('state','0')){
            $this->success("关闭成功");
        }else{
            $this->error("失败");
        }
    }
    public function on($id=0){
        $vote=M('vote');
        if($vote->where("id=$id")->setField('state','1')){
            $this->success("开启成功");
        }else{
            $this->error("失败");
        }
    }
    public function dellabel($id=0){
        $voting=M('voting');
        if($voting->where("selectname='$id'")->delete()){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

}