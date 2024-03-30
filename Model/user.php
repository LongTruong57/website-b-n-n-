<?php

class user{
    function checkUser($user,$email){
        $db = new connect();
        $select = "select username,email 
                    from khachhang
                    where username = '$user' or email = '$email'";
        $result = $db->getList($select);
        return $result;
    }
    function addUser($tenkh,$diachi,$sdt,$username,$email,$password){
        $db = new connect();
        $sql = "insert into khachhang(tenkh,diachi,sodienthoai,username,email,matkhau)
                values('$tenkh','$diachi','$sdt','$username','$email','$password')";
        $result = $db->exec($sql);
        return $result;
    }

    function logKhachHang($user,$pass){
        $db = new connect();
        $select = "select a.makh, a.tenkh, a.username
                    from khachhang a
                    where a.username = '$user' and a.matkhau = '$pass'";
        $result = $db->getInstance($select);
        return $result;
    }
    function checkEmail($email){
        $db = new connect();
        $select = "select *
                    from khachhang
                    where email = '$email'";
        $result = $db->getList($select);
        return $result;
    }
    function updateEmail($email,$pass){
        $db = new connect();
        $query = "update khachhang set matkhau='$pass' where email='$email'";
        echo $query;
        $db -> exec($query);
    }
}