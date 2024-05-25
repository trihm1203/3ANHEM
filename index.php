<?php
session_start();
ob_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
include "model/pdo.php";
include "model/user.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/binhluan.php";
include "model/Bill.php";
include "header.php";
if (isset($_GET["pg"])) {
    $pg = $_GET["pg"];
    switch ($pg) {
        case 'contact':
            include "contact.php";
            break;
        case 'home':
            include "home.php";
            break;
        case 'sanpham':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $iddm = $_GET['id'];
                $dssp = sanpham_select_danhmuc($iddm);
            } else {
                $dssp = sanpham_select_page();
            }

            include "sanpham.php";
            break;
        case 'login':
            include "login.php";
            break;
        case 'register':
            include "register.php";
            break;
        case 'cart':
            //Thêm vào giỏ hàng
            if (isset($_POST['dathang']) && ($_POST['dathang'])) {
                // Lấy giá trị
                $img = $_POST['img'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['giasp'];
                $id = $_POST['id'];
                if (isset($_POST['sl']) && ($_POST['sl'] > 0)) {
                    $sl = $_POST['sl'];
                } else {
                    $sl = 1;
                }
                //Check trung sp
                if (checktrungsp($id) >= 0) {
                    $vitrisptrung = checktrungsp($id);
                    updatesoluong($vitrisptrung);
                    header('location: index.php');
                } else {
                    //tạo mảng con
                    $sp = array($id, $img, $tensp, $gia, $sl);
                    //add vào giỏ hàng
                    array_push($_SESSION['cart'], $sp);
                    header('location: index.php');
                }
            }
            include 'cart.php';
            break;
        case 'delcart':
            // Xóa giỏ hàng
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['cart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['cart'] = [];
            }
            header('Location: index.php?pg=cart');
            break;
        case 'checkout':
            include "checkout.php";
            break;
        case 'taodonhang': {
                if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
                    // Lấy thông tin từ Form để tạo đơn hàng
                    $ten = $_POST['ten'];
                    $sdt = $_POST['sdt'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $pttt = 0;
                    $tongtien = tongdonhang();
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date("Y-m-d H:i:s");
                    //Tạo một đơn hàng mới 
                    add_hoadon($ten, $sdt, $email, $diachi, $pttt, $tongtien, $date);
                    // Tạo chi tiết giỏ hàng
                    foreach (bill() as $bill) {
                        $idbill = $bill['  '];
                    }
                    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                        $id_sp = $_SESSION['cart'][$i][0];
                        $soluong = $_SESSION['cart'][$i][4];
                        $dongia = $_SESSION['cart'][$i][3];
                        $hinhanh = $_SESSION['cart'][$i][1];
                        $tensp = $_SESSION['cart'][$i][2];
                        $thanhtien = $dongia * $soluong;
                        add_hoadon_chitiet($id_sp, $soluong, $dongia, $hinhanh, $tensp, $idbill);
                    }
                    $ttkh = '  <div class="col-lg-8">
                    <h3 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">THÔNG TIN ĐƠN ĐẶT HÀNG</span></h3> <br>
                    <h5 class="text-danger">Mã đơn hàng: ' . $idbill . ' </h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ & Tên</label>
                                <button class="form-control">' . $ten . '</button>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <button class="form-control">' . $sdt . '</button>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <button class="form-control">' . $email . '</button>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ giao hàng</label>
                                <button class="form-control">' . $diachi . '</button>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Ngày đặt</label>
                                <button class="form-control">' . $date . '</button>
                            </div>
                        </div>
                    </div>
                </div>';
                    include 'thongtindathang.php';
                }
            }
        case 'sp_chitiet':
            $view = 1;
            // Lấy 1 sp
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $spone = sanpham_select_by_id($id);
                foreach (sanpham_select_by_id($id) as $row) {
                    $view += $row['view'];
                    sanpham_view($id, $view);
                }
                //
                include "sp_chitiet.php";
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $ten = $_POST['ten'];
                $pass = md5($_POST['pass']);
                $sdt = $_POST['sdt'];
                $DiaChi = $_POST['DiaChi'];
                $quyen = 1; //user
                $trangthai = 1; //dang hoat dong
                $check_email = "SELECT * FROM nguoidung WHERE email = '$email'";
                $check_sdt = "SELECT * FROM nguoidung WHERE sdt = '$sdt'";
                $conn = pdo_get_connection();
                $cout_mail = $conn->prepare($check_email);
                $cout_mail->execute();
                $cout_sdt = $conn->prepare($check_sdt);
                $cout_sdt->execute();
                if ($cout_mail->rowCount() > 0) {
                    $error = "Email này đã có người sử dụng ! ";
                } elseif ($cout_sdt->rowCount() > 0) {
                    $error = "Số điện thoại này đã có người sử dụng ! ";
                } else {
                    nguoidung_insert($ten, $sdt, $DiaChi, $email, $pass, $quyen, $trangthai);
                    $error1 = "Đăng ký thành công ! ";
                }
                include 'login.php';
            }
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $conn = pdo_get_connection();
                $email = $_POST['email'];
                $pass = md5($_POST['pass']);
                $check = "SELECT * FROM nguoidung WHERE email = '$email' AND pass = '$pass' AND trangthai = :trangthai AND quyen = :quyen";
                $count = $conn->prepare($check);
                $count->execute(array(
                    'quyen' => 1,
                    'trangthai' => 1
                ));
                $check_admin = "SELECT * FROM nguoidung WHERE email = '$email' AND pass = '$pass' AND quyen= :quyen AND trangthai = :trangthai ";
                $cout_admin = $conn->prepare($check_admin);
                $cout_admin->execute(array(
                    ':quyen' => 0,
                    ':trangthai' => 1
                ));
                if ($cout_admin->rowCount() > 0) {
                    $_SESSION['admin'] = $email;
                    header('location: index.php');
                } elseif ($count->rowCount() > 0) {
                    $_SESSION['user'] = $email;
                    header('location: index.php');
                } else {
                    $error = "Email hoặc mật khẩu chưa đúng hoặc tài khoản của bạn đã bị khóa!";
                }
                include 'login.php';
            }
            break;
        case 'thongtin_update':
            if (isset($_GET['email'])) {
                $email = $_GET['email'];
                $user = user_select_by_email($email);
                include 'thongtin_update.php';
            }
            if (isset($_POST['edit_user'])) {
                $email = $_POST['email'];
                $ten_new = $_POST['ten'];
                $sdt_new =  $_POST['sdt'];
                $email_new =  $_POST['email'];
                $DiaChi_new = $_POST['DiaChi'];
                khach_hang_update_byEmail($email, $ten_new, $sdt_new, $DiaChi_new, $email_new);
                include 'home.php';
            }
            break;
        case 'update_pass':
            if (isset($_GET['email'])) {
                $email = $_GET['email'];
                $user = user_select_by_email($email);
                if (isset($_POST['update_pass'])) {
                    $pass = md5($_POST['pass']);
                    $passnew = md5($_POST['passnew']);
                    $passconfirm = md5($_POST['passconfirm']);
                    if ($passnew != $passconfirm) {
                        $error = "Nhập lại mật khẩu chưa chính xác!";
                    } else {
                        $conn = pdo_get_connection();
                        $sql = "SELECT * FROM nguoidung WHERE email = '$email' AND pass = '$pass'";
                        $check = $conn->prepare($sql);
                        $check->execute();
                        if ($check->rowCount() > 0) {
                            khach_hang_change_password($email, $passnew);
                            $error1 = "Đổi mật khẩu thành công!";
                        } else {
                            $error2 = "Mật khẩu cũ không đúng, vui lòng thử lại!";
                        }
                    }
                }
            }
            include 'update_pass.php';

            break;
        case 'dangxuat':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                header("Location: index.php");
            } elseif (isset($_SESSION['admin'])) {
                unset($_SESSION['admin']);
                header("Location:index.php");
            }
            break;

        case 'search':
            if (isset($_POST['search'])) {
                $name = $_POST['name'];
                // echo $name;
            }
            $number = Count_sp($name);
            $search = sanpham_search($name);
            include 'search.php';
            break;
        case 'binhluan':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $spone = sanpham_select_by_id($id);
                foreach (sanpham_select_by_id($id) as $row) {
                    $id_sp  = $row['id'];
                }
                //
                include "sp_chitiet.php";
            }
            if (isset($_GET['id_comment'])) {
                $id_cmt = $_GET['id_comment'];
                binhluan_delete($id_cmt);
            }
            if (isset($_SESSION['user']) && isset($_POST['binhluan'])) {
                $ngaylap = date("Y/m/d");
                $email = $_SESSION['user'];
                $NoiDung = $_POST['commentPro'];
                foreach (user_select_by_email($email) as $row) {
                    $id_user = $row['id'];
                }

                binhluan_insert($id_user, $id_sp, $NoiDung, $NgayLap);
            } elseif (!isset($_SESSION['user']) && isset($_POST['comment'])) {
                echo "<script>alert('Vui lòng đăng nhập trước khi bình luận!')</script>";
            }
            break;

            break;
    }
} else {
    include "home.php";
}
include "footer.php";
