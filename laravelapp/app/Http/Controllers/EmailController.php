<?php

namespace App\Http\Controllers;

use App\Email as EmailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * 存储客户信息和发送邮件
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function signIn(Request $request){
        if(!isset($_SESSION)){
            session_start();
        }

        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');

        $emailModel = new EmailModel();
        $emailModel->name = $name;
        $emailModel->email = $email;
        $emailModel->phone = $phone;
        $emailModel->save();

        $uid = '1';
        $code = 'ha';

        $data = ['email' => $email, 'name' => $name, 'uid' => $uid, 'activationcode' => $code];
        Mail::send('email\activeMail', $data, function ($message) use($data){
            $message->to($data['email'], $data['name'])->subject('青灵儿测试邮件');
        });

        return view('email.index');
    }

    public function admin(Request $request){
        if(!isset($_SESSION)){
            session_start();
        }

        $query = DB::select('select * from emailadmin where userName = :userName and password = :password',
            ['userName' => $request->get('userName'), 'password' => $request->get('password')]);

        if(count($query) == 1 ){
            $_SESSION['usernameEmailAdmin'] = $request->get('userName');

//          return  self::back();
          return redirect('/back');
        }
        else{
            return view('email.index', [
                'login_status' => false
            ]);
        }
    }

    public function back(){
        $query = EmailModel::select("*")->paginate(5);

        $data = [
            "posts" => $query
        ];

        return view('email.back', $data);
    }


    public function excelOutput(){
        $phpExcel = new \PHPExcel();

//        以下是一些设置 ，什么作者  标题啊之类的
        $phpExcel -> getProperties()
            -> setCreator("青灵儿")
            -> setLastModifiedBy( "青灵儿")          //设置最后修改者
            -> setTitle( "游客信息" )    //设置标题
            -> setSubject( "数据EXCEL导出" )  //设置主题
            -> setDescription( "备份数据") //设置备注
            -> setKeywords( "excel")        //设置标记
            -> setCategory( "result file");

        $objActSheet = $phpExcel -> setActiveSheetIndex(0);

        $query = DB::select('select * from emails');

        //echo dd($query);

        $objActSheet -> setCellValue('A1', '#');
        $objActSheet -> setCellValue('B1', '姓名');
        $objActSheet -> setCellValue('C1', '邮箱');
        $objActSheet -> setCellValue('D1', '手机');
        $objActSheet -> setCellValue('E1', '创建日期');
        $objActSheet -> setCellValue('F1', '更新日期');

        for($i = 0; $i < 6; $i++)
        {
            $objActSheet->getColumnDimension(chr(ord('A')+$i))->setAutoSize(true);
        }

        $count = 1;

        foreach ($query as $key=>$value)
        {
            $count++;
            $objActSheet -> setCellValue('A'. $count, $count-1);
            $objActSheet -> setCellValue('B'. $count, $value->name);
            $objActSheet -> setCellValue('C'. $count, $value->email);
            $objActSheet -> setCellValue('D'. $count, $value->phone);
            $objActSheet -> setCellValue('E'. $count, $value->created_at);
            $objActSheet -> setCellValue('F'. $count, $value->updated_at);
        }

        // 给当前活动的表设置名称
        $objActSheet->setTitle('游客信息');
        $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');
        $objWriter->save('C:\Users\Linger\Desktop\游客信息.xlsx');
    }

    public function emailAdminLogout(){
        if(!isset($_SESSION)){
            session_start();
        }
        session_unset('usernameEmailAdmin');
        return redirect('/email');
    }
}

