<?php
class page{

// Phương thức tính số trang dựa vào tổng số sp và limit
    function findPage($count,$limit)
    {
        $page = ($count % $limit)==0 ? $count/ $limit:ceil($count / $limit);
        return $page;
    }
    // phương thức tính điểm bắt đầu cần lấy giá trị trong SQL
//  dựa vào current_page trên URL, thông qua biến tự đặt là page
    function findStart($limit)
    {
        if (!isset($_GET['page'])|| $_GET['page'] == 1){
            $start = 0;
        } else {
            $start = ($_GET['page']-1) * $limit;
        }
        return $start;
    }
}