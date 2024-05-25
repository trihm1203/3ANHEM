<?php
session_status();
ob_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/user.php";
include "../model/Bill.php";
include "header.php";
if (isset($_GET["pg"])) {
    $pg = $_GET["pg"];
    switch ($pg) {
        case 'danhmuc': {
                //Lấy toàn bộ danh mục
                $kq = danhmuc_select_all();
                include "danhmuc.php";
                break;
            }

        case 'add_dm': {
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $TenDanhMuc = $_POST['TenDanhMuc'];
                    danhmuc_insert($TenDanhMuc);
                }
                //Lấy toàn bộ danh mục
                $kq = danhmuc_select_all();
                include "danhmuc.php";
                break;
            }
        case 'delete_dm': {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    danhmuc_delete($id);
                }
                //Lấy toàn bộ danh mục
                $kq = danhmuc_select_all();
                include "danhmuc.php";
                break;
            }
        case 'edit_dm': {
                // LẤY 1 RECORD đúng vs id truyền vào
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $kqone = getonedm($id);
                    //dsdm
                    $kq = danhmuc_select_all();
                    include "danhmuc_edit.php";
                }
                if (isset($_POST['id']) || isset($_POST['TenDanhMuc'])) {
                    $id = $_POST['id'];
                    $TenDanhMuc = $_POST['TenDanhMuc'];
                    danhmuc_update($id, $TenDanhMuc);
                    //dsdm
                    $kq = danhmuc_select_all();
                    include "danhmuc.php";
                }
                break;
            }

        case 'sanpham': {
                //lấy all sanpham
                $kq = sanpham_select_all();
                include "sanpham.php";
                break;
            }
        case 'add_spForm':
            include "addSP.php";
            break;
        case 'add_sp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $TenSP = $_POST['TenSP'];
                $HinhAnh = $_FILES['HinhAnh'];
                $Gia = $_POST['Gia'];
                $SoLuong = $_POST['SoLuong'];
                $TinhTrang = $_POST['TinhTrang'];
                $sale = $_POST['sale'];
                $ManHinh = $_POST['ManHinh'];
                $Ram = $_POST['Ram'];
                $CPU = $_POST['CPU'];
                $Rom = $_POST['Rom'];
                $CardMH = $_POST['CardMH'];
                $Id_DanhMuc = $_POST['Id_DanhMuc'];
                $maxSize = 800000;
                $upload = true;
                $dir = "../HinhAnh/Laptop/";
                $target_file = $dir . basename($_FILES['HinhAnh']['name']);
                $type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowtypes    = array('jpg', 'png', 'jpeg');
                if ($HinhAnh["size"] > $maxSize) {
                    $error = "File ảnh quá lớn. Vui lòng chọn ảnh khác";
                    $upload = false;
                } else if (!in_array($type, $allowtypes)) {
                    $error = "Chỉ được upload các định dạng JPG, PNG, JPEG";
                    $upload = false;
                } else {
                    $imgname = uniqid() . "-" . $HinhAnh['name'];
                    if (move_uploaded_file($HinhAnh['tmp_name'], $dir . $imgname)) {
                    }
                    $conn = pdo_get_connection();
                    $check = "SELECT * FROM sanpham WHERE TenSP = '$TenSP'";
                    $cout = $conn->prepare($check);
                    $cout->execute();
                    if ($cout->rowCount() > 0) {
                        $error = "Sản phẩm đã tồn tại";
                    } else {
                        try {
                            sanpham_insert($TenSP, $imgname, $Gia, $SoLuong, $TinhTrang, $sale, $ManHinh, $Ram, $CPU, $Rom, $CardMH, $Id_DanhMuc);
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
            }
            //Lấy toàn bộ danh mục
            $kq = sanpham_select_all();
            include "sanpham.php";
            break;
        case 'delete_sp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                sanpham_delete($id);
            }
            //Lấy toàn bộ sanpham
            $kq = sanpham_select_all();
            include "sanpham.php";
            break;

        case 'update_sp': {
                // LẤY 1 RECORD đúng vs id truyền vào
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $spone = sanpham_select_by_id($id);
                    include "updateSP.php";
                }
                if (isset($_POST['edit_sp'])) {
                    $imgname = null;
                    $id = $_POST['id'];
                    $TenSP_new = $_POST['TenSP'];
                    $Gia_new = $_POST['Gia'];
                    $SoLuong_new = $_POST['SoLuong'];
                    $TinhTrang_new = $_POST['TinhTrang'];
                    $sale_new = $_POST['sale'];
                    $ManHinh_new = $_POST['ManHinh'];
                    $Ram_new = $_POST['Ram'];
                    $CPU_new = $_POST['CPU'];
                    $Rom_new = $_POST['Rom'];
                    $CardMH_new = $_POST['CardMH'];
                    $img_new = $_FILES['HinhAnh'];
                    $maxSize = 800000;
                    $upload = true;
                    $dir = "../HinhAnh/Laptop/";
                    $target_file = $dir . basename($_FILES['HinhAnh']['name']);
                    $type = pathinfo($target_file, PATHINFO_EXTENSION);
                    $allowtypes    = array('jpg', 'png', 'jpeg');
                    if ($img_new["size"] > $maxSize) {
                        $error = "File ảnh quá lớn. Vui lòng chọn ảnh khác";
                        $upload = false;
                    } else if (!in_array($type, $allowtypes)) {
                        $error = "Chỉ được upload các định dạng JPG, PNG, JPEG";
                        $upload = false;
                    } else {
                        $imgname = uniqid() . "-" . $img_new['name'];
                        move_uploaded_file($img_new['tmp_name'], $dir . $imgname);
                        sanpham_update(
                            $id,
                            $TenSP_new,
                            $imgname,
                            $Gia_new,
                            $SoLuong_new,
                            $TinhTrang_new,
                            $sale_new,
                            $ManHinh_new,
                            $Ram_new,
                            $CPU_new,
                            $Rom_new,
                            $CardMH_new
                        );
                        //Lấy toàn bộ danh mục
                        $kq = sanpham_select_all();
                        include "sanpham.php";
                    }
                    sanpham_update_noIMG($id, $TenSP_new,  $Gia_new, $SoLuong_new, $TinhTrang_new, $sale_new, $ManHinh_new, $Ram_new, $CPU_new, $Rom_new, $CardMH_new);
                    //Lấy toàn bộ danh mục
                    $kq = sanpham_select_all();
                    include "sanpham.php";
                }

                break;
            }

        case 'user':
            //dsuser
            $kq = user_select_all();
            include "user.php";
            break;

        case 'edit_user':
            // LẤY 1 RECORD đúng vs id truyền vào
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $kqone =  user_select_by_id($id);
                //dsuser
                $kq = user_select_all();
                include "user_edit.php";
            }
            if (isset($_POST['edit_user'])) {
                $id = $_POST['id'];
                $ten_new = $_POST['ten'];
                $sdt_new = $_POST['sdt'];
                $email_new = $_POST['email'];
                $DiaChi_new = $_POST['DiaChi'];
                $quyen_new = $_POST['quyen'];
                $trangthai_new = $_POST['trangthai'];
                khach_hang_update_admin($id, $ten_new, $sdt_new, $DiaChi_new, $email_new, $quyen_new, $trangthai_new);
                $kq = user_select_all();
                include "user.php";
            }
            break;
        case 'delete_user':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_user($id);
            }
            //dsuser
            $kq = user_select_all();
            include "user.php";
            break;
        case 'bill':
            include "donhang.php";
            break;
        case 'del_bill':
            if (isset($_GET['id_hoadon'])) {
                $id_hoadon = $_GET['id_hoadon'];
                delete_bill($id_hoadon);
                delete_bill_chitiet($id_hoadon);
            }
            showallbill();
            include "donhang.php";
            break;
        case 'chitiet_bill': {
                if (isset($_GET['id_hoadon'])) {
                    $id_hoadon = $_GET['id_hoadon'];
                    $kq = showallbill_id($id_hoadon);
                    $kq1 = showallbill_idbill($id_hoadon);
                    include 'chitiet_bill.php';
                }
            }
    }
} else {
    include "home.php";
}
include "footer.php";
