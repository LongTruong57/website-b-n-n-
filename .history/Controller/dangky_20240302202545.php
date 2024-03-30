<?php
$act = "dangky";
if (isset($_GET['act'])){
    $act = $_GET['act'];
}
switch ($act){
    case 'dangky':
        include './view/';
        break;
    case 'dangky_action':
        //lấy thông tin từ form chuyển về dangky_action
        $tenkh = '';
        $diachi = '';
        $sdt = '';
        $username = '';
        $email = '';
        $password = '';
        if (isset($_POST['submit'])){
            $tenkh = $_POST['txttenkh'];
            $diachi = $_POST['txtdiachi'];
            $sdt = $_POST['txtsodt'];
            $username = $_POST['txtusername'];
            $email = $_POST['txtemail'];
            $password = $_POST['txtpass'];
            $saltF = "N0203*";
            $saltL = "A1517#";
            $passnew = md5($saltF.$password.$saltL);
            $kh = new user();
            $check = $kh->checkUser($username,$email)->rowCount();
            if ($check>=1){
                echo '<script> alert("Username hoặc Email đã tồn tại")</script>';
                echo '<meta http-equiv="refresh" content="0;URL=../index.php?action=dangky">';
            } else {
                //insert vào database
                $insert = $kh->addUser($tenkh,$diachi,$sdt,$username,$email,$passnew);
                if ($insert == true){
                    echo '<script> alert("Đăng ký thành công")</script>';
                    include_once "../View/home.php";
                } else {
                    echo '<script> alert("Đăng ký không thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0;URL=../index.php?action=dangky">';
                }
            }
        }
        break;
}