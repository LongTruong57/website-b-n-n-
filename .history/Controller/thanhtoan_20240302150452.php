<?php
//controller iu cầu model gửi dữ liệu vào database
if (isset($_SESSION['makh'])){
    $makh = $_SESSION['makh'];
    $hoadon = new hoadon();
    $sohd = $hoadon->insertHoaDon($makh);
    $_SESSION['masohd'] = $sohd;
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $item){
        $hoadon->insertCTHoaDon($sohd,$item['mahh'],$item['soluong'],$item['mausac'],$item['size'],$item['thanhtien']);
        $total += $item['thanhtien'];
        // hàm cập nhật hàng tồn kho (BT);
    }

    $hoadon->updateTongTien($sohd,$makh,$total);
}
unset($_SESSION['cart']);
include_once './View/order.php';
