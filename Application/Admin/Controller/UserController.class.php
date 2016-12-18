<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function add(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        if (IS_POST) {
            // 实例化article对象
            $Student = D('Student');
            if ($Student->create()) {
                $result = $Student->add();
                if ($result) {
                    $this->success('用户添加成功',U('User/add'));
                } else {
                    $this->error('用户添加失败');
                }
            } else {
                $this->error($Student->getError());
            }
        }else{
            $Student = M('Student'); // 实例化User对象
            $count      = $Student->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            //$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
            $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $Student->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }
    }
    public function addadmin(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        if (IS_POST) {
            // 实例化article对象
            $Admin = D('Admin');
            if ($Admin->create()) {
                $result = $Admin->add();
                if ($result) {
                    $this->success('用户添加成功',U('User/addadmin'));
                } else {
                    $this->error('用户添加失败');
                }
            } else {
                $this->error($Admin->getError());
            }
        }else{
            $Admin = M('Admin'); // 实例化User对象
            $count      = $Admin->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $Admin->order('uid')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }
    }

    public function del(){
        $Student = M('Student');
        if($Student->where('id="'.$_GET['id'].'"')->delete()){
            $this->success('删除成功',U('User/add'));
        }
        else{
            $this->error('删除失败');
        }
    }
    public function edit(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $Student = D('Student');
        $id=(int)$_GET['id'];
        $list=$Student->where("id=$id")->find();
        $this->assign('vo',$list);
        $this->display();
    }
    public function update(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $Student = D('Student');
        if($Student->create()){
            $result =   $Student->save();
            if($result){
                $this->success('操作成功！',U('User/add'));
            }
            else{
                $this->error('操作失败! 内容没有改变.');
            }
        }else{
            $this->error($Student->getError());
        }
    }
    public function deladmin(){
        $Student = M('Admin');
        $id=(int)$_GET['uid'];
        if($Student->where("uid=$id")->delete()){
            $this->success('删除成功',U('User/addadmin'));
        }
        else{
            $this->error('删除失败');
        }
    }
    public function editadmin(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $Student = D('Admin');
        $id=(int)$_GET['uid'];
        $list=$Student->where("uid=$id")->find();
        $this->assign('vo',$list);
        $this->display();
    }
    public function updateadmin(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $Student = D('Admin');
        if($Student->create()){
            $result =   $Student->save();
            if($result){
                $this->success('操作成功！',U('User/addadmin'));
            }
            else{
                $this->error('操作失败! 内容没有改变.');
            }
        }else{
            $this->error($Student->getError());
        }
    }
    //Excel导入
    public function excel_runimport(){
        import("Org.Util.PHPExcel");
        $PHPExcel=new \PHPExcel();
        import("Org.Util.PHPExcel.Reader.Excel5");

        if (! empty ( $_FILES ['file_stu'] ['name'] ))
        {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower ( $file_type ) != "xls")
            {
                $this->error ( '不是Excel文件，重新上传' );
            }
            /*设置上传路径*/
            $savePath = './Uploads/';
            /*以时间来命名上传的文件*/
            $str = date ( 'Ymdhis' );
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (! copy ( $tmp_file, $savePath . $file_name ))
            {
                $this->error ( '上传失败' );
            }
            /*
              *对上传的Excel数据进行处理生成编程数据,这个函数会在下面第三步的ExcelToArray类中

             注意：这里调用执行了第三步类里面的read函数，把Excel转化为数组并返回给$res,再进行数据库写入
            */
            $res = $this->read ( $savePath . $file_name );
            /*
              重要代码 解决Thinkphp M、D方法不能调用的问题
              如果在thinkphp中遇到M 、D方法失效时就加入下面一句代码
            */
            //spl_autoload_register ( array ('Think', 'autoload' ) );
            /*对生成的数组进行数据库的写入*/
            foreach ( $res as $k => $v )
            {
                if ($k != 0)
                {
                    $data ['id'] = $v [0];
                    $data ['name'] = $v [1];
                    $data ['password'] = md5($v [2]);
                    $data ['major'] = $v [3];
                    $result = M ( 'student' )->add ( $data );
                    if (!$result){
                        $this->error ('导入数据库失败');
                    }
                }
            }
            $this->success ('导入数据库成功');
        }
    }

    public function read($filename,$encode='utf-8'){
        $objReader = \PHPExcel_IOFactory::createReader(Excel5);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filename);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
        $excelData = array();
        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
        }
        return $excelData;
    }
}