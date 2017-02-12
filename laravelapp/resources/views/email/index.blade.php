@extends('layout.layouts')

@section('title', 'BackStage')

@section('content')



    {{--css--}}
    <style>
        /*游客表单背景色*/
        .guestForm{
            color:#fff;
            background-color:#5bc0de;
            border-color:#46b8da
        }

        /*管理员表单背景色*/
        .adminForm {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
        }
    </style>

    {{--html--}}
    <div class="row">
        {{--左边栏--}}
        <div class="col-md-4"></div>

        {{--中间栏--}}
        <div id="formContent" class="col-md-4 guestForm">
            {{--游客或管理员选择按钮--}}
            <div>
                <div class="row">
                    <div class="col-md-6 btn btn-info" onclick="showGuest()">游客</div>
                    <div class="col-md-6 btn btn-danger" onclick="showAdmin()">管理员</div>
                </div>
            </div>

            <br/>

            {{--游客登录表单--}}
            <form id="guestForm" class="form-horizontal" role="form" action="/signIn" onsubmit="return checkTextGuest()" method="post">
                {{--姓名输入栏--}}
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
                    </div>
                </div>

                {{--邮件输入栏--}}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                    </div>
                </div>

                {{--电话输入栏--}}
                <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">手机</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="phone">
                    </div>
                </div>

                {{--提交按钮--}}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">提交</button>
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

            {{--管理员登录表单--}}
            <form id="adminForm" class="form-horizontal" role="form" action="/emailAdmin" onsubmit="return checkTextAdmin();" method="post" style="display: none">
                {{--用户名栏--}}
                <div class="form-group">
                    <label for="inputUserName" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUserName" placeholder="UserName" name="userName">
                    </div>
                </div>

                {{--密码栏--}}
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                    </div>
                </div>

                {{--提示栏--}}
                <div class="form-group">
                    <label id="wrongPassword" class="col-sm-6 control-label"  style="visibility:hidden">密码错误！！！</label>
                    <div class="col-sm-6" style="visibility:hidden">
                        <input class="form-control">
                    </div>
                </div>

                {{--登录按钮--}}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">登录</button>
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>

        {{--右边栏--}}
        <div class="col-md-4"></div>
    </div>

    {{--js--}}
    <script>
//        显示游客表单，隐藏管理员表单
        function showGuest() {
            document.getElementById('guestForm').style.display = 'block';
            document.getElementById('adminForm').style.display = 'none';
            var formContent = document.getElementById('formContent');
            formContent.className = "col-md-4 guestForm";
        }

//        显示管理员表单，隐藏游客表单
        function showAdmin() {
            document.getElementById('guestForm').style.display = 'none';
            document.getElementById('adminForm').style.display = 'block';
            var formContent = document.getElementById('formContent');
            formContent.className = "col-md-4 adminForm";
        }

//        游客表单提交前的排查不填和填写错误
        function checkTextGuest(){
            if(document.getElementById('inputName').value == '')
            {
                alert('姓名不可以为空');
                return false;
            }
            else if(document.getElementById('inputEmail3').value == '')
            {
                alert('邮箱不可以为空');
                return false;
            }
            else if(document.getElementById('inputPhone').value == '')
            {
                alert('手机不可以为空');
                return false;
            }
            else if(!(/^1[34578]\d{9}$/.test(document.getElementById('inputPhone').value)))
            {
                alert('请输入正确的11位手机号码');
                return false;
            }

            return true;
        }

//        管理员表单提交前的排查不填和填写错误
        function checkTextAdmin(){
            if(document.getElementById('inputUserName').value == '')
            {
                alert('用户名不可以为空');
                return false;
            }
            else if(document.getElementById('inputPassword').value == '')
            {
                alert('密码不可以为空');
                return false;
            }
            return true;
        }

        function sleep(n) { //n表示的毫秒数
            var start = new Date().getTime();
            while (true) if (new Date().getTime() - start > n) break;
        }

    </script>
    <?php

    if(isset($login_status)){
        if($login_status == false){
            echo "
                    <script>
                        showAdmin();
//                        document.getElementById('wrongPassword').style.visibility = 'visible';
//                        sleep(3000);
//                        document.getElementById('wrongPassword').style.visibility = 'hidden';
                    </script>
                ";
        }
    }

    ?>
@endsection

