<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/3/24
 * Time: 23:37
 */
namespace Home\Controller;
use Think\Controller;
class JwController extends Controller{
    public function index(){
        $this->display();
    }
    public function bd($username,$password,$name,$major){
        $cookie_file = tempnam('./Uploads', '');
        $ch=curl_init("http://es.bnuz.edu.cn/default2.aspx");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        $str=curl_exec($ch);
        $info=curl_getinfo($ch);
        curl_close($ch);
        $pattern = '/<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*)" \/>/i';
        preg_match($pattern, $str, $matches);
        $view = urlencode($matches[1]);
        $pattern = '/<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="(.*)" \/>/i';
        preg_match($pattern, $str, $matches);
        $views = urlencode($matches[1]);
        $pattern = '/<input type="hidden" name="__PREVIOUSPAGE" id="__PREVIOUSPAGE" value="(.*)" \/>/i';
        preg_match($pattern, $str, $matches);
        $pr = urlencode($matches[1]);
        $pattern = '/<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="(.*)" \/>/i';
        preg_match($pattern, $str, $matches);
        $eve = urlencode($matches[1]);
        $login_url="http://es.bnuz.edu.cn/default2.aspx";
        $login="__VIEWSTATE={$view}&__VIEWSTATEGENERATOR={$views}&__PREVIOUSPAGE={$pr}&__EVENTVALIDATION={$eve}&TextBox1={$username}&TextBox2={$password}&RadioButtonList1=%E5%AD%A6%E7%94%9F&Button4_test=";
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL,$login_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $login);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        $str=curl_exec($ch);
        curl_close($ch);

        if(preg_match("/xs_main/",$str)){
            $Student = M('Student');
            $data ['id'] = $username;
            $data ['password'] = md5($password);
            $data ['name'] = $name;
            $data ['major'] = $major;
            if($Student->where("id=$username")->count()){
                $this->error('你已经登记过了哦~即将跳转至登录页面',U('Index/login'));
            }
            $Student->add($data);
            $this-> error("登记成功,稍后跳转登录页面",U('Index/login'));
        }else{
            $this-> error("输入的学号密码与教务系统不符或网络故障，登陆失败.");
            return false;
        }
    }
}