switch ($act) {
case 'giohang':
include_once "./View/cart.php";
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
// Thêm hàng hóa vào giỏ hàng
$gh = new giohang();
$gh -> addHangHoa($mahh, $mausac, $size, $soluong);
// Điều hướng người dùng về trang giỏ hàng
header("Location: ../index.php?action=giohang");
exit; // Đảm bảo không có mã PHP nào được thực thi sau khi điều hướng
}
break;
case 'delete_cart':
if (isset($_GET['id'])){
$vt = $_GET['id'];
unset($_SESSION['cart'][$vt]);
// Điều hướng người dùng về trang giỏ hàng
header("Location: ../index.php?action=giohang");
exit;
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
// Điều hướng người dùng về trang giỏ hàng
header("Location: ../index.php?action=giohang");
exit;
}
break;
}