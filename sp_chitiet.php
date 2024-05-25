<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php?pg=home">Trang chủ</a>
                <span class="breadcrumb-item active"><?= $spone[0]['TenSP'] ?></span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <form action="index.php?pg=cart" method="post">
        <input type="hidden" name="id" value="../HinhAnh/Laptop/<?= $spone[0]['id'] ?>">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img src="HinhAnh/Laptop/<?= $spone[0]['HinhAnh'] ?>" width="100%" alt="">
                            <input type="hidden" name="img" value="../HinhAnh/Laptop/<?= $spone[0]['HinhAnh'] ?>">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto     ">
                <div class="h-100 bg-light p-30">
                    <h3><?= $spone[0]['TenSP'] ?></h3>
                    <input type="hidden" name="tensp" value="<?= $spone[0]['TenSP'] ?> ">
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>

                    <h4>Thông số kỹ thuật:</h4> <br>
                    <p>CPU: <?= $spone[0]['TenSP'] ?></p>
                    <p>RAM: <?= $spone[0]['Ram'] ?></p>
                    <p>Dung lương: <?= $spone[0]['Rom'] ?></p>
                    <p>VGA: <?= $spone[0]['CardMH'] ?></p>
                    <p>Màn hình: <?= $spone[0]['ManHinh'] ?></p>
                    <br> <br>
                    <?php
                    $giamgia = ($spone[0]['Gia'] - ($spone[0]['Gia'] * ($spone[0]['sale'] / 100)));
                    if ($spone[0]['sale'] > 0) { ?>
                        <div class="d-flex">
                            <h3 class="font-weight-semi-bold "> Giá: <?= number_format($giamgia) ?>đ </h3>
                            <h5 class="text-muted ml-2"><del><?= number_format($spone[0]['Gia']) . 'đ' ?></del> </h5>
                            <input type="hidden" name="giasp" value="<?= $giamgia ?> ">
                        </div>
                    <?php } else { ?>
                        <h3 class="font-weight-semi-bold mb-4"> Giá: <?= number_format($spone[0]['Gia']) ?>đ</h3>
                        <input type="hidden" name="giasp" value="<?= $spone[0]['Gia'] ?> ">
                    <?php
                    }
                    ?>
                    <br>
                    <div class="d-flex">
                        <h6>Tình trạng: <?= $spone[0]['TinhTrang'] ?> |</h6>
                        <h6 class="ml-2">Lượt xem: <?= $spone[0]['view'] ?></h6>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <input class="btn btn-primary" name="dathang" type="submit" value="Thêm vào giỏ hàng">
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Chia sẻ:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-3">Bình luận</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">Đánh giá "<?= $spone[0]['TenSP'] ?>"</h4>
                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>

                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Để lại đánh giá</h4>
                                <small>Email của bạn sẽ không được hiển thị công khai. Các trường bắt buộc được đánh dấu *</small>
                                <form action="index.php?pg=binhluan" method="post">
                                    <div class="form-group">
                                        <label for="message">Bình luận của bạn *</label>
                                        <textarea name="commentPro" id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="comment" value="Xác nhận" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Shop Detail End -->