<?php
include_once ".View/sanpham.php";
$act = 'sanpham';
// Controller điều phối đến những view khác thông qua 1 biến
// biến đó tên là act
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'timkiem':
    case 'sanphamkhuyenmai':
    case 'sanpham':
        include_once "./View/sanpham.php";
        break;
    case 'sanphamchitiet' :
        include_once "./View/sanphamchitiet.php";
        break;
}