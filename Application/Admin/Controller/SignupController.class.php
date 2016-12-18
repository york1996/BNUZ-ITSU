<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/4/5
 * Time: 16:30
 */
namespace Admin\Controller;
use Think\Controller;
class SignupController extends Controller {
    public function index(){
        $active = M('active');
        $list = $active ->order('id desc')->select();
        $this->assign("list",$list);
        $this->display();
    }

    public function add(){
        $active = M('active');
        if(IS_POST){
            $map['title'] = $_POST['title'];
            $map['writer'] = $_POST['writer'];
            $map['time'] = strtotime($_POST['time']);
            $map['content'] = $_POST['content'];
            $result=$active->create($map);
            if($result){
                $active->add($map);
                $this->success('发布成功',U('Signup/Index'));
            }else{
                $this->error('发布失败,请联系管理员');
            }
        }else{
            $this->display();
        }
    }

    public function edit($id=0){
        $active = M('active');
        if(IS_POST){
            $map['id'] = $_POST['id'];
            $map['title'] = $_POST['title'];
            $map['writer'] = $_POST['writer'];
            $map['time'] = strtotime($_POST['time']);
            $map['content'] = $_POST['content'];
            $result=$active->create($map);
            if($result){
                $active->save($map);
                $this->success('修改成功',U('Signup/Index'));
            }else{
                $this->error('修改失败,请联系管理员');
            }
        }else{
            $vo=$active -> where("id=$id")->find();
            $this->assign("vo",$vo);
            $this->display();
        }
    }

    public function del($id=0){
        $active = M('active');
        $result=$active->where("id=$id")->delete();
        if($result){
            $this->success('删除成功',U('Signup/Index'));
        }else{
            $this->error('删除失败');
        }
    }

    public function info($id=0){
        $active = M('active');
        $sginfo = M('signup');
        $list = $sginfo->where("classify=$id")->select();
        $this->assign("list",$list);
        $this->display();
    }

    public function delinfo($tid){
        $sginfo=M('signup');
        $result=$sginfo->where("tid=$tid")->delete();
        if($result){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}