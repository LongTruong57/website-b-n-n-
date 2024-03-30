<?php
class hanghoa{
        function getHangHoaNew(){
            $db = new connect();
            $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac 
                        from hanghoa a,cthanghoa b, mausac c 
                        WHERE a.mahh=b.idhanghoa AND b.idmau=c.Idmau ORDER by a.mahh DESC limit 8";
            $result = $db->getList($select);
            return $result;
        }

        function getHangHoaSale(){
            $db= new connect();
            $select = 'select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac, b.giamgia 
                        from hanghoa a,cthanghoa b, mausac c 
                        WHERE a.mahh=b.idhanghoa AND b.idmau=c.Idmau and giamgia!=0 
                        ORDER by a.mahh DESC limit 4';
            $result = $db->getList($select);
            return $result;
        }
        function getHangHoaAll()
        {
            $db = new connect();
            $select = "select a.mahh, a.tenhh, a.soluotxem, b.hinh, b.dongia, c.mausac 
from hanghoa a, cthanghoa b, mausac c 
where a.mahh = b.idhanghoa and b.idmau = c.Idmau
and b.giamgia=0 order by a.mahh desc";
            $result = $db->getList($select);
            return $result;
        }
    function getHangHoaAllSale()
    {
        $db = new connect();
        $select = "select a.mahh, a.tenhh, a.soluotxem, b.hinh, b.dongia, c.mausac, b.giamgia 
from hanghoa a, cthanghoa b, mausac c 
where a.mahh = b.idhanghoa and b.idmau = c.Idmau
and b.giamgia!=0 order by a.mahh desc";
        $result = $db->getList($select);
        return $result;
    }
    //Phương  thức đếm số lượng trên trang 14 sản phẩm
    function getCountHangHoaAll()
    {
        $db = new connect();
        $select = "select count(a.mahh)
                    from hanghoa a, cthanghoa b, mausac c 
                    where a.mahh = b.idhanghoa and b.idmau = c.Idmau and b.giamgia=0";
        $result = $db -> getInstance($select);
        return $result[0];
    }
    //Phương  thức phân trang
    function getHangHoaAllPage($start,$limit){
        $db = new connect();
        $select = "select a.mahh, a.tenhh, a.soluotxem, b.hinh, b.dongia, c.mausac 
                    from hanghoa a, cthanghoa b, mausac c 
                    where a.mahh = b.idhanghoa and b.idmau = c.Idmau
                            and b.giamgia=0 order by a.mahh desc limit ".$start.",".$limit;
        $result = $db->getList($select);
        return $result;
    }
    function gethanghoaid($id){
        $db = new connect();
        $select = "select DISTINCT a.mahh, a.tenhh,a.mota,b.dongia
                   from hanghoa a, cthanghoa b
                   where a.mahh = b.idhanghoa and a.mahh = ".$id;
//        echo $select;
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaMau($id){
    $db = new connect();
    $select = "select DISTINCT b.Idmau, b.mausac
                       from cthanghoa a, mausac b
                       where a.idmau = b.Idmau and a.idhanghoa = ".$id;
    $result = $db->getList($select);
    return $result;
    }
    function getHangHoaSize($id){
    $db = new connect();
    $select = "select DISTINCT b.Idsize, b.size
                       from cthanghoa a, sizegiay b
                       where a.idsize = b.Idsize and a.idhanghoa = ".$id;
    $result = $db->getList($select);
    return $result;
    }
    function getHangHoaHinh($id){
    $db = new connect();
    $select = "select DISTINCT a.hinh
                       from cthanghoa a
                       where a.idhanghoa = ".$id;
    $result = $db->getList($select);
    return $result;
    }
    function getHangHoaHinhMauSize($id,$mau,$size){
        $db = new connect();
        $select = "select DISTINCT a.hinh from cthanghoa a, mausac b, sizegiay c
                   where a.idmau = b.Idmau and a.idsize = c.Idsize and a.idhanghoa = $id and b.Idmau = $mau and c.size = $size";
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaMauIDMau($idmau){
        $db = new connect();
        $select = "select a.mausac
                    from mausac a 
                    where a.Idmau = $idmau";
        $result = $db->getInstance($select);
        return $result;
    }

    function timkiemSP($timkiem){
        $db = new connect();
        $select = "select a.mahh, a.tenhh, a.soluotxem, b.hinh, b.dongia, c.mausac
                    from hanghoa a, cthanghoa b, mausac c
                    where a.mahh = b.idhanghoa and b.idmau = c.Idmau and b.giamgia=0 
                      and tenhh like '%$timkiem%' ORDER BY a.mahh DESC";
        $result = $db->getList($select);
        return $result;
    }
}