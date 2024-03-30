<?php

class giohang{
    function addHangHoa($mahh,$mausac,$size,$soluong){
        $sanpham = new hanghoa();
        $sp = $sanpham->getHangHoaID($mahh);
        $tenhh = $sp['tenhh'];
        $dongia = $sp['dongia'];
        $total = $soluong * $dongia;
        $mau = $sanpham->getHangHoaMauIDMau($mausac);
        $tenmau = $mau['mausac'];
        $hinh = $sanpham->getHangHoaHinhMauSize($mahh,$mausac,$size);
        $img = $hinh['hinh'];
        $flag = false;
        foreach ($_SESSION['cart'] as $key => $item){
            if ($item['mahh'] == $mahh && $item['mausac'] == $tenmau && $item['size'] == $size){
                $flag = true;
                $soluong += $item['soluong'];
                $this -> updateHH($key,$soluong);
            }
        }
        if ($flag == false){
            $item = array(
                'mahh' => $mahh,
                'tenhh' => $tenhh,
                'hinh' => $img,
                'dongia' => $dongia,
                'mausac' => $tenmau,
                'size' => $size,
                'soluong' => $soluong,
                'thanhtien' => $total
            );
        }
        $_SESSION['cart'][] = $item;
    }
    function updateHH($index,$soluong){
        if ($soluong <= 0){
            unset($_SESSION['cart'][$index]);
        }else{
            $_SESSION['cart'][$index]['soluong'] = $soluong;
            $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
            $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
        }
    }
    function getSubTotal()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item){
            $subtotal += $item['thanhtien'];
        }
        $subtotal = number_format($subtotal,2);
        return $subtotal;
    }
}