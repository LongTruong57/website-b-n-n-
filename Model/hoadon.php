<?php
class hoadon{
    function insertHoaDon($makh){
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d'); //mặc định database là 'Y-m-d'
        $query = "insert into hoadon(masohd, makh, ngaydat, tongtien) VALUES (null, $makh, '$ngay', 0)";
        $db->exec($query);
        $select = "select a.masohd from hoadon a order by a.masohd desc limit 1";
        $masohd = $db->getInstance($select);
        return $masohd[0];
    }
    //phương thức insert vào bảng cthoadon
    function insertCTHoaDon($masohd,$mahh,$soluongmua,$mausac,$size,$thanhtien){
        $db=new connect();
        $query = "insert into cthoadon(masohd, mahh, soluongmua, mausac, size, thanhtien, tinhtrang) 
                    VALUES ($masohd, $mahh, $soluongmua, '$mausac', $size, $thanhtien, 0)";
        $db->exec($query);
    }
    // phương thức cập nhật tổng tiền
    function updateTongTien($masohd,$makh,$tongtien){
        $db = new connect();
        $query = "update hoadon set hoadon.tongtien = '$tongtien' where hoadon.masohd = '$masohd' and hoadon.makh = '$makh'";
        $db->exec($query);
    }
    //lấy thông tin khách hàng dựa vào mã số hd
    function selectThongTinKhachHang($masohd){
        $db = new connect();
        $query = "select hoadon.masohd, khachhang.tenkh, khachhang.diachi, khachhang.sodienthoai, hoadon.ngaydat
                    from hoadon
                    left join khachhang on hoadon.makh = khachhang.makh
                    where hoadon.masohd = ".$masohd;
        $result = $db->getInstance($query);
        return $result;
    }
    function selectThongTinHoaDon($masohd){
        $db = new connect();
        $select = "select DISTINCT hanghoa.tenhh, cthoadon.mausac, cthoadon.size, cthanghoa.dongia, cthoadon.soluongmua
                    from hanghoa left join
                    cthanghoa on hanghoa.mahh = cthanghoa.idhanghoa
                    left join cthoadon on hanghoa.mahh = cthoadon.mahh
                    where cthoadon.masohd = ".$masohd;
        $result = $db->getList($select);
        return $result;
    }
}