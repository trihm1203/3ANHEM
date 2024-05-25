<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>3AnhEmShop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="View/lib/animate/animate.min.css" rel="stylesheet">
    <link href="View/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="View/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <img src="HinhAnh/Logo/3AnhEm_Logo.png" height="100" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="index.php?pg=search" method="POST">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Tìm kiếm sản phẩm" required>
                        <input type="submit" class="btn btn-primary" name="search" value="Tìm kiếm"></input>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Chăm sóc khách hàng </p>
                <h5 class="m-0">(+84) 857 417 612</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <?php foreach (danhmuc_select_all() as $dm) {
                        ?>
                            <a class="nav-item nav-link" href="index.php?pg=sanpham&id=<?= $dm['id'] ?>">
                                <?= $dm['TenDanhMuc'] ?> </a>
                        <?php
                        }
                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php?pg=home" class="nav-item nav-link active">Trang chủ</a>
                            <a href="index.php?pg=sanpham" class="nav-item nav-link">Sản phẩm</a>
                            <a href="index.php?pg=contact" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <?php
                            if (isset($_SESSION['admin'])) { ?>
                                Admin: <a href="index.php?pg=thongtin_update&email=<?= $_SESSION['admin'] ?>"><?= $_SESSION['admin'] ?></a> ||
                                <a href="index.php?pg=dangxuat" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a> ||
                            <?php
                            } else  if (isset($_SESSION['user'])) { ?>
                                Xin chào: <a href="index.php?pg=thongtin_update&email=<?= $_SESSION['user'] ?>"><?= $_SESSION['user'] ?></a> ||
                                <a href="index.php?pg=dangxuat" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a>
                            <?php
                            } else {
                            ?>
                                <a href="index.php?pg=login" type="button">Đăng nhập / Đăng ký</a>
                            <?php } ?>
                            <?php
                            if (isset($_SESSION['admin'])) { ?>
                                <a href="admin/index.php"> Quản trị</a>
                            <?php
                            }
                            ?>

                            <a href="index.php?pg=cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <?php {
                                    $t = count($_SESSION['cart']);
                                ?>
                                    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?= $t ?> </span>
                                <?php
                                }
                                ?>
                            </a>

                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
</body>

<!-- Navbar End -->