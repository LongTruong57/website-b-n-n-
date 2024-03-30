<?php
$act = 'dangnhap';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once '../View/login.php';
        break;
    case 'dangnhap_action':
        //lấy thông tin từ form chuyển về dangnhap_action
        $username = '';
        $password = '';
        if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
            $username = $_POST['txtusername'];
            $password = $_POST['txtpassword'];
            $saltF = "N0203*";
            $saltL = "A1517#";
            $passnew = md5($saltF . $password . $saltL);
        }
        $kh = new user();
        $logkh = $kh->logKhachHang($username, $passnew);
        if ($logkh) {
            $_SESSION['makh'] = $logkh['makh'];
            $_SESSION['tenkh'] = $logkh['tenkh'];
            echo '<script> alert("Đăng nhập thành công!")</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../DuAnmau/index.php?action=home"/>';
        } else {
            echo '<script> alert("Đăng nhập không thành công!")</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../DuAnMau/index.php?action=dangnhap"/>';
        }
        break;
    case 'dangxuat':
        unset($_SESSION['makh']);
        unset($_SESSION['tenkh']);
        echo '<meta http-equiv="refresh" content="0;URL=.../DuAnMau/index.php?action=home"/>';
        break;
}