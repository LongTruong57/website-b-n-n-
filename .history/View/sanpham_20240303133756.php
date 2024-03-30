  <!-- quảng cáo -->
  <?php
  include "quangcao.php";
  ?>
  <!-- end quảng cáo -->
  <!--  Phân trang-->
  <?php
  // B1: xác định trang mình đang phân có bao nhiêu sản phẩm
  $hh = new hanghoa();
//  $count = $hh -> getCountHangHoaAll();
  $count = $hh->getHangHoaAll()->rowCount();
  // B2: Điều kiện phân trang, giới hạn phân trang
  $limit = 8;
  // B3: tính ra số trang dựa trên tổng sản phẩm và limit
  $trang = new page();
  $page = $trang->findPage($count, $limit);
  $start = $trang->findStart($limit);
  ?>

  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
  <!-- Cùng 1 view để gọi nhiều dữ liệu khác-->
  <?php
$ac = 1;
if (isset($_GET['action'])){
    if (isset($_GET['act'])&&$_GET['act']=='sanphamkhuyenmai'){
        $ac = 2;
    } elseif (isset($_GET['act'])&&$_GET['act']=='timkiem') {
        $ac = 3;
    }else {
        $ac = 1;
    }
}
?>
  <!--Section: Examples-->
  <section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row">
      <div class="col-md-7 mt-3 text-right">
        <?php
                if ($ac == 1) {
                    echo "<h3 class='mb-2 font-weight-bold' style='color: red'>TẤT CẢ SẢN PHẨM</h3>";
                }
                if ($ac == 2) {
                    echo "<h3 class='mb-2 font-weight-bold' style='color: red'>TẤT CẢ SẢN PHẨM SALE</h3>";
                }
                if ($ac == 3) {
                    echo "<h3 class='mb-2 font-weight-bold' style='color: red'>SẢN PHẨM TÌM KIẾM LÀ</h3>";
                }
             ?>
      </div>

    </div>
    <!--Grid row-->
    <div class="row">
      <?php
          $hh = new hanghoa();
          if ($ac==1){
//              $result = $hh->getHangHoaAll();
              $result = $hh->getHangHoaAllPage($start,$limit);
          }
          if ($ac==2){
              $result = $hh->getHangHoaAllSale();
          }
          if ($ac==3){
              if (isset($_POST['txtsearch'])){
                  $tk = $_POST['txtsearch'];
                  $result = $hh->timkiemSP($tk);
              }
          }
          while ($set = $result->fetch()):
              ?>
      <!--Grid column-->
      <div class="col-lg-3 col-md-4 mb-3 text-left">

        <div class="view overlay z-depth-1-half">
          <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
          <div class="mask rgba-white-slight"></div>
        </div>

        <?php
                  if ($ac == 1){
                      echo "<h5 class='my-4 font-weight-bold' style='color: red;'>
                      ".number_format($set['dongia'])."<sup><u>đ</u></sup>
                  </h5>";
                  }
                  if ($ac == 2){
                      echo "<h5 class='my-4 font-weight-bold'>
                      <font color='red'>".number_format($set['giamgia'])."<sup><u>đ</u></sup></font>
                      <strike>".number_format($set['dongia'])."</strike><sup><u>đ</u></sup>
                  </h5>";
                  }
                  ?>
        <!--                  <h5 class="my-4 font-weight-bold" style="color: red;">
                      <?php /*echo number_format($set['dongia']); */?><sup><u>đ</u></sup>
                  </h5>
                  <h5 class="my-4 font-weight-bold">
                      <font color="red"><?php /*echo number_format($set['giamgia'])*/?><sup><u>đ</u></sup></font>
                      <strike><?php /*echo number_format($set['dongia'])*/?></strike><sup><u>đ</u></sup>
                  </h5>
-->
        <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
          <span><?php echo $set['tenhh']."-".$set['mausac'] ?></span></br></a>
        <button class="btn btn-danger" id="may4" value="lap 4">New</button>
        <h5 class="mt-3">Số lượt xem: <?php echo $set['soluotxem'] ?></h5>
      </div>
      <?php
          endwhile;
          ?>
    </div>

    <!--Grid row-->

  </section>


  <!-- end sản phẩm mới nhất -->


  <div class=" col-md-6 div col-md-offset-3">
    <ul class="pagination">
      <?php
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    if ($current_page>1 && $page>1) {
                        echo '<li><a href="index.php?action=sanpham&page='.($current_page-1).'">Previous</a></li>';
                        }
                    for ($i = 1; $i <= $page; $i++) {
                        ?>
      <li><a href="index.php?action=sanpham&page=<?php echo $i; ?>"><?php echo $i ?></a></li>
      <?php
                    }
                        if ($current_page<$page && $page>1) {
                            echo '<li><a href="index.php?action=sanpham&page='.($current_page+1).'">Next</a></li>';
                        }
                        ?>
    </ul>
  </div>