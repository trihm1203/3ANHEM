<?php
require_once 'pdo.php';

function updatesoluong($vitri)
{
    for ($i = 0; $i < sizeof($_SESSION["cart"]); $i++) {
        if ($i == $vitri) {
            $_SESSION['cart'][$i]['4'] += 1;
        }
    }
}

function checktrungsp($id)
{
    $vitri = -1;
    for ($i = 0; $i < sizeof($_SESSION["cart"]); $i++) {
        if ($_SESSION["cart"][$i]['0'] == $id) {
            $vitri = $i;
        }
    }
    return $vitri;
}

function sanpham_insert($TenSP, $imgname, $Gia, $SoLuong, $TinhTrang, $sale, $ManHinh, $Ram, $CPU, $Rom, $CardMH, $Id_DanhMuc)
{
    $sql = "INSERT INTO sanpham(TenSP, HinhAnh, Gia, SoLuong, TinhTrang, sale ,ManHinh, Ram, CPU, Rom, CardMH, Id_DanhMuc) 
    VALUES ('$TenSP', '$imgname', '$Gia', '$SoLuong', '$TinhTrang',' $sale',' $ManHinh', '$Ram', '$CPU', '$Rom', '$CardMH',' $Id_DanhMuc')";
    pdo_execute($sql);
}

function sanpham_update($id, $TenSP_new, $imgname, $Gia_new, $SoLuong_new, $TinhTrang_new, $sale_new, $ManHinh_new, $Ram_new, $CPU_new, $Rom_new, $CardMH_new)
{
    $sql = "UPDATE sanpham SET TenSP='$TenSP_new',HinhAnh='$imgname',Gia='$Gia_new',SoLuong='$SoLuong_new',
    TinhTrang='$TinhTrang_new',sale='$sale_new',ManHinh='$ManHinh_new',Ram='$Ram_new',CPU='$CPU_new',Rom='$Rom_new',CardMH='$CardMH_new' WHERE id=" . $id;
    pdo_execute($sql);
}
function sanpham_update_noIMG($id, $TenSP_new,  $Gia_new, $SoLuong_new, $TinhTrang_new, $sale_new, $ManHinh_new, $Ram_new, $CPU_new, $Rom_new, $CardMH_new)
{
    $sql = "UPDATE sanpham SET TenSP='$TenSP_new',Gia='$Gia_new',SoLuong='$SoLuong_new',
    TinhTrang='$TinhTrang_new',sale='$sale_new',ManHinh='$ManHinh_new',Ram='$Ram_new',CPU='$CPU_new',Rom='$Rom_new',CardMH='$CardMH_new' WHERE id=" . $id;
    pdo_execute($sql);
}
function sanpham_delete($id)
{
    $sql = "DELETE FROM sanpham WHERE  id =" . $id;
    pdo_execute($sql);
}
function sanpham_select_all()
{ // SHow full
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);
}
function sanpham_select_all_sale()
{ // SHow những sản phẩm chưa sale
    $sql = "SELECT * FROM sanpham WHERE sale = 0";
    return pdo_query($sql);
}
function sanpham_select_page()
{   //show 8 sản phẩm
    $sql = "SELECT * FROM sanpham ORDER BY RAND() DESC LIMIT 8 ";
    return pdo_query($sql);
}

function sanpham_select_danhmuc($iddm = 0)
{   // show sản phẩm theo danh mục
    $sql = "SELECT * FROM sanpham WHERE id_danhmuc= " . $iddm;
    return pdo_query($sql);
}
function sanpham_giamgia()
{   // SHow sản phẩm đang giảm giá
    $sql = "SELECT * FROM sanpham WHERE sale > 0";
    return pdo_query($sql);
}

function sanpham_select_by_id($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=" . $id;
    return pdo_query($sql);
}
function sanpham_search($name)
{
    $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%$name%' ORDER BY id";
    return pdo_query($sql);
}
function Count_sp($name)
{
    $conn = pdo_get_connection();
    $sql = "SELECT COUNT(*) FROM sanpham WHERE TenSP LIKE  '%$name%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $number = $stmt->fetchColumn();
    return $number;
}
function hang_hoa_exist($ma_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function sanpham_view($id, $view)
{
    $sql = "UPDATE sanpham SET view = '$view' WHERE id=" . $id;
    pdo_execute($sql);
}

function sanpham_select_topview()
{
    $sql = "SELECT * FROM sanpham WHERE view > 0 ORDER BY view DESC LIMIT 0, 4";
    return pdo_query($sql);
}

function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
    return pdo_query($sql);
}

function hang_hoa_select_page()
{
    if (!isset($_SESSION['page_no'])) {
        $_SESSION['page_no'] = 0;
    }
    if (!isset($_SESSION['page_count'])) {
        $row_count = pdo_query_value("SELECT count(*) FROM sanpham");
        $_SESSION['page_count'] = ceil($row_count / 6.0);
    }

    $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT " . $_SESSION['page_no'] . ", 6";
    return pdo_query($sql);
}
