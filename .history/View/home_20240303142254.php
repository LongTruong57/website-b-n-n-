  <!--Section: Examples-->
  <section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row">
      <div class="col-lg-7 text-right">
        <h3 class="mt-2" style="color: red;"><b>SẢN PHẨM MỚI NHẤT</b></h3>
      </div>
      <div class="col-lg-5 text-right mt-4">
        <a href="index.php?action=sanpham">
          <span style="color: black;"><b>Xem chi tiết</b></span>
      </div>
      </a>


    </div>
    <!--Grid row-->
    <div class="row">
      <?php
          $hh = new hanghoa();
          $result = $hh->getHangHoaNew();
          while($set = $result->fetch()):
              ?>
      <!--Grid column-->
      <div class="col-lg-3 col-md-4 mb-3 text-left">
        <div class="view overlay z-depth-1-half">
          <img src="./Content/imagetourdien/<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
          <div class="mask rgba-white-slight"></div>
        </div>
        <h5 class="my-1 font-weight-bold" style="color: red;margin-bottom:2px">
          <?php echo number_format($set['dongia'])?>
          <sup><u>đ</u></sup>
        </h5>
        <a href=" index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
          <span><?php echo $set['tenhh']."-".$set['mausac'] ?></php></span></br></a>
        <button class="btn btn-danger" id="may4" value="lap 4">New</button>
        <h5 class="mt-2">Số lượt xem:<?php echo $set['soluotxem'] ?></h5>
      </div>
      <?php
          endwhile;
          ?>
    </div>

    <!--Grid row-->

  </section>
  <!-- end sản phẩm mới nhất -->
  <!-- sản phẩm khuyến mãi -->
  <section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row">
      <div class="col-lg-7 text-right">
        <h3 class="mt-2" style="color: red;"><b>SẢN PHẨM KHUYẾN MÃI</b></h3>
      </div>
      <div class="col-lg-5 text-right mt-4">
        <a href="index.php?action=sanpham&act=sanphamkhuyenmai">
          <span style="color: black;"><b>Xem chi tiết</b></span>
      </div>
      </a>

    </div>
    <!--Grid row-->
    <div class="row">
      <?php
         $kq = $hh->getHangHoaSale();
         while ($set = $kq->fetch()):
         ?>

      <!--Grid column-->
      <div class="col-lg-3 col-md-4 mb-3 text-left">

        <div class="view overlay z-depth-1-half">
          <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
          <div class="mask rgba-white-slight"></div>
        </div>

        <h5 class="my-2 mt font-weight-bold" style="margin-bottom:2px">
          <font color="red"><?php echo number_format($set['giamgia'])?><sup><u>đ</u></sup></font>
          <strike><?php echo number_format($set['dongia'])?></strike><sup><u>đ</u></sup>
        </h5>

        <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
          <span><?php echo $set['tenhh']."-".$set['mausac']?></span></br></a>
        <button class="btn btn-danger" id="may4" value="lap 4">New</button>
        <h5 class="mt-2">Số lượt xem:<?php echo $set['soluotxem']?></h5>
      </div>
      <?php
         endwhile;
         ?>
    </div>

    <!--Grid row-->

  </section>
  <!-- end sản phẩm khuyến mãi -->