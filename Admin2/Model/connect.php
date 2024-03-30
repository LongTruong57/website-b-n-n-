<?php
class connect
{
    var $db = null;
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=shopgiay';
//    Lưu ý : Đoạn dsn kết nối với PDO không được có khoảng trắng
        $user = 'root';
        $pass = '';
        try {
            $this->db = new PDO($dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
//            echo "Kết nối thành công";
        } catch (\Exception $e) {
            echo "Kết nối không thành công";
            echo $e;
        }
    }
    // Phương thức lấy 1 bảng
    function getList($select){
        $result = $this->db->query($select);
        return $result;
    }
    // Phương thức trả về 1 dòng
    function getInstance($select){
        $results = $this->db->query($select);
        $result = $results -> fetch(); // Lấy 1 dòng
        return $result;
    }
    //Dùng exec cho lệnh insert, update,delete
    function exec($query){
        $results = $this->db->exec($query);
        return $results;
    }
    // prepare thực thi tất cả
    function execp($query){
        $statement = $this->db->prepare($query);
        return $statement;
    }
}