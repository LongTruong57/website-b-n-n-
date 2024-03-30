<?php
//unset($_SESSION['cart']);
// Trước khi điều hướng qua View, thì kiểm tra người dùng có giỏ hàng chưa
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
$act = 'giohang';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'giohang':
        include_once "../View/cart.php";
        break;
        case 'giohang_action':
            // Những thông tin cần mua
            // Nhận được mahh,mausac,size,soluong
            $mahh= 0;
            $mausac = '';
            $size = 0;
            $soluong = 0;
            if (isset($_POST['mahh'])){
                $mahh = $_POST['mahh'];
                $mausac = $_POST['mymausac'];
                $size = $_POST['size'];
                $soluong = $_POST['soluong'];
//                $_SESSION['cart'][$mahh] = array(
//                    'mahh' => $mahh,
//                    'mausac' => $mausac,
//                    'size' => $size,
//                    'soluong' => $soluong
//                );
                $gh = new giohang();
                $gh -> addHangHoa($mahh, $mausac, $size, $soluong);
                echo '<meta http-equiv="refresh" content="0;URL=../index.php?action=giohang">';
            }
            break;
    case 'delete_cart':
        if (isset($_GET['id'])){
            $vt = $_GET['id'];
            unset($_SESSION['cart'][$vt]);
            echo "<meta http-equiv='refresh' content='0;URL=../index.php?action=giohang'>";
        }
        break;
        case 'update_cart':
            if (isset($_POST['newqty'])){
                $newqty = $_POST['newqty'];
                foreach ($newqty as $key => $value){
                    if ($_SESSION['cart'][$key]['soluong'] != $value){
                        $gh = new giohang();
                        $gh -> updateHH($key, $value);
                    }
                }
                echo '<meta http-equiv="refresh" content="0;URL=../index.php?action=giohang">';
            }
            break;
}