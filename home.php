 <!-- Banner -->
 <div class="container-fluid mb-3">
     <div class="row px-xl-5">
         <div class="col-lg-8">
             <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                 <ol class="carousel-indicators">
                     <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                     <li data-target="#header-carousel" data-slide-to="1"></li>
                     <li data-target="#header-carousel" data-slide-to="2"></li>
                 </ol>
                 <div class="carousel-inner">
                     <div class="carousel-item position-relative active" style="height: 430px;">
                         <img class="position-absolute w-100 h-100" src="View/img/carousel-1.1.jpg" style="object-fit: cover;">
                     </div>
                     <div class="carousel-item position-relative" style="height: 430px;">
                         <img class="position-absolute w-100 h-100" src="View/img/carousel-2.2.jpg" style="object-fit: cover;">
                     </div>
                     <div class="carousel-item position-relative" style="height: 430px;">
                         <img class="position-absolute w-100 h-100" src="View/img/carousel-3.3.jpg" style="object-fit: cover;">
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">
             <div class="product-offer mb-30" style="height: 200px;">
                 <img class="img-fluid" src="View/img/offer-1.1.png" alt="">
             </div>
             <div class="product-offer mb-30" style="height: 200px;">
                 <img class="img-fluid" src="View/img/offer-2.2.png" alt="">
             </div>
         </div>
     </div>
 </div>
 <!-- banner End -->

 <!-- Featured Start -->
 <div class="container-fluid pt-5">
     <div class="row px-xl-5 pb-3">
         <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
             <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                 <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                 <h5 class="font-weight-semi-bold m-0">Sản phẩm chính hảng</h5>
             </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
             <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                 <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                 <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
             </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
             <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                 <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                 <h5 class="font-weight-semi-bold m-0">14 ngày đổi trả</h5>
             </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
             <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                 <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                 <h5 class="font-weight-semi-bold m-0">24/7 Hỗ trợ</h5>
             </div>
         </div>
     </div>
 </div>
 <!-- Featured End -->
 <!-- Danh mục -->
 <div class="container-fluid pt-5">
     <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Danh mục</span></h2>
     <br>
     <div class="row px-xl-5 ">
         <?php
            foreach (danhmuc_select_all() as $dm) {
            ?>
             <div class="col-lg-3 col-md-4 col-sm-6 ">
                 <a href="index.php?pg=sanpham&id=<?= $dm['id'] ?>">
                     <div class="cat-item img-zoom mb-4 ml-5">
                         <img src="HinhAnh/DanhMuc/<?= $dm['HinhAnh'] ?>" width="170px" alt="">
                     </div>
                 </a>
             </div>

         <?php
            }
            ?>
     </div>
 </div>
 <!-- Danhmục End -->

 <!-- Sản phẩm giảm giá  -->
 <div class="container-fluid pt-5 pb-5">
     <h2 class=" section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM ĐANG GIẢM GIÁ</span></h2>
     <div class="row px-xl-5">
         <?php
            foreach (sanpham_giamgia() as $sp) {
                $giamgia = ($sp['Gia'] - ($sp['Gia'] * ($sp['sale'] / 100)));
            ?>
             <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                 <div class="product-item bg-light mb-4">
                     <form action="index.php?pg=cart" method="post">
                         <div class="product-img position-relative overflow-hidden">
                             <img src="HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>" width="100%" alt="">
                             <input type="hidden" name="img" value="HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>">
                         </div>
                         <div class="text-center py-4">
                             <a class="h6 text-decoration-none text-truncate" href="index.php?pg=sp_chitiet&id=<?= $sp['id'] ?>"><?= $sp['TenSP'] ?></a>
                             <input type="hidden" name="tensp" value="<?= $sp['TenSP'] ?> ">
                             <div class="d-flex align-items-center justify-content-center mt-3">
                                 <h5 class="text-danger"><?= number_format($giamgia) ?>đ</h5>
                                 <h6 class="text-muted ml-2"><del><?= number_format($sp['Gia']) . 'đ' ?></del> </h6>
                                 <input type="hidden" name="giasp" value="<?= $giamgia ?> ">
                                 <input type="hidden" name="id" value="<?= $sp['id'] ?> ">
                             </div>
                       
                             <p>Tình trạng: <?= $sp['TinhTrang'] ?></p>
                             <div class="d-flex align-items-center justify-content-center mb-1">
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small>(99)</small>
                             </div>
                             <p>Lượt xem: <?= $sp['view'] ?></p>
                             <input class="btn btn-primary" name="dathang" type="submit" value="Thêm vào giỏ hàng">
                         </div>
                     </form>
                 </div>
             </div>
         <?php
            }
            ?>
     </div>
 </div>

 <!-- Sản phẩm nổi bật -->
 <div class="container-fluid pt-5 pb-3">
     <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM NỔI BẬT</span></h2>
     <div class="row px-xl-5">
         <?php
            foreach (sanpham_select_page() as $sp) {
            ?>
             <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                 <div class="product-item bg-light mb-4">
                     <form action="index.php?pg=cart" method="post">
                         <div class="product-img position-relative overflow-hidden">
                             <img src="HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>" width="100%" alt="">
                             <input type="hidden" name="img" value="HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>">

                         </div>
                         <div class="text-center py-4">
                             <a class="h6 text-decoration-none text-truncate" href="index.php?pg=sp_chitiet&id=<?= $sp['id'] ?>"><?= $sp['TenSP'] ?></a>
                             <input type="hidden" name="tensp" value="<?= $sp['TenSP'] ?> ">
                             <div class="d-flex align-items-center justify-content-center mt-3">
                                 <h5 class="text-danger"><?= number_format($sp['Gia']) ?>đ</h5>
                                 <input type="hidden" name="giasp" value="<?= $sp['Gia'] ?> ">
                                 <input type="hidden" name="id" value="<?= $sp['id'] ?> ">

                             </div>
                             <p>Tình trạng: <?= $sp['TinhTrang'] ?></p>

                             <div class="d-flex align-items-center justify-content-center mb-1">
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small>(99)</small>
                             </div>
                             <p>Lượt xem: <?= $sp['view'] ?></p>
                             <input class="btn btn-primary" name="dathang" type="submit" value="Thêm vào giỏ hàng">

                         </div>
                     </form>
                 </div>
             </div>
         <?php
            }
            ?>
     </div>
 </div>

 <!-- Giới thiệu sản phẩm  -->
 <div class="container-fluid pt-5 pb-3">
     <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">GIỚI THIỆU SẢN PHẨM</span></h2>

     <div class="row px-xl-5">
         <div class="col-lg-8">
             <div class="carousel slide carousel-fade mb-30 mb-lg-0">
                 <div class="carousel-inner">
                     <div class="carousel-item position-relative active" style="height: 520px;">
                         <video width="918.800px" height="auto" autoplay loop muted>
                             <source src="HinhAnh/video/video1.1.mp4" type="video/mp4">
                         </video>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">
             <div class="product-offer mb-30" style="height: 245px;">
                 <video width="444.388px" height="auto" autoplay loop muted>
                     <source src="HinhAnh/video/video2.2.mp4" type="video/mp4">
                 </video>
             </div>
             <div class="product-offer mb-30" style="height: 245px;">
                 <video width="444.388px" height="auto" autoplay loop muted>
                     <source src="HinhAnh/video/video3.3.mp4" type="video/mp4">
                 </video>
             </div>
         </div>
     </div>
 </div>

 <!-- Top lượt xem  -->
 <div class="container-fluid pt-5 pb-3">
     <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">TOP Lượt XEM</span></h2>
     <div class="row px-xl-5">
         <?php
            foreach (sanpham_select_topview() as $sp) {
                $giamgia = ($sp['Gia'] - ($sp['Gia'] * ($sp['sale'] / 100)));
            ?>
             <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                 <div class="product-item bg-light mb-4">
                     <form action="index.php?pg=cart" method="post">

                         <div class="product-img position-relative overflow-hidden">

                             <img src="HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>" width="100%" alt="">
                             <input type="hidden" name="img" value="HinhAnh/Laptop/<?= $sp['HinhAnh'] ?>">
                         </div>
                         <div class="text-center py-4">
                             <a class="h6 text-decoration-none text-truncate" href="index.php?pg=sp_chitiet&id=<?= $sp['id'] ?>"><?= $sp['TenSP'] ?></a>
                             <input type="hidden" name="tensp" value="<?= $sp['TenSP'] ?> ">
                             <div class="d-flex align-items-center justify-content-center mt-3">
                                 <?php
                                    if ($sp['sale'] > 0) { ?>
                                     <h5 class="text-danger"><?= number_format($giamgia) ?>đ </h5>
                                     <h6 class="text-muted ml-2"><del><?= number_format($sp['Gia']) . 'đ' ?></del> </h6>
                                     <input type="hidden" name="giasp" value="<?= $giamgia ?> ">
                                 <?php } else { ?>
                                     <h5 class="text-danger"><?= number_format($sp['Gia']) ?>đ</h5>
                                     <input type="hidden" name="giasp" value="<?= $sp['Gia'] ?> ">
                                 <?php
                                    }
                                    ?>
                             </div>
                             <p>Tình trạng: <?= $sp['TinhTrang'] ?></p>
                             <div class="d-flex align-items-center justify-content-center mb-1">
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small class="fa fa-star text-primary mr-1"></small>
                                 <small>(99)</small>
                             </div>
                             <p>Lượt xem: <?= $sp['view'] ?></p>
                             <input class="btn btn-primary" name="dathang" type="submit" value="Thêm vào giỏ hàng">

                         </div>
                     </form>
                 </div>
             </div>
         <?php
            }
            ?>
     </div>
 </div>

 </div>
 <!-- Sản phẩm End -->