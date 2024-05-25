<?php
require_once 'pdo.php';
function bill()
{
    $sql = "SELECT * FROM hoadon ";
    return pdo_query($sql);
}
function showallbill_id($id_hoadon)
{
    $sql = "SELECT * FROM hoadon WHERE id_hoadon=" . $id_hoadon;
    return pdo_query($sql);
}
function showallbill_idbill($id_hoadon)
{
    $sql = "SELECT * FROM chitiet_hoadon WHERE idbill=" . $id_hoadon;
    return pdo_query($sql);
}
function showallbill()
{
    $sql = "SELECT * FROM hoadon ORDER BY id_hoadon DESC";
    return pdo_query($sql);
}
function showall_chitiet($id_hoadon)
{
    $sql = "SELECT * FROM chitiet_hoadon WHERE idbill= " . $id_hoadon;
    return pdo_query($sql);
}
function tongdonhang()
{

    $tong = 0;
    if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))) {
        if (sizeof($_SESSION['cart']) > 0) {
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                $ttien = $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
                $tong += $ttien;
            }
        }
    }
    return ($tong + 24000);
}
function add_hoadon($ten, $sdt, $email, $diachi, $pptt, $tongtien, $date)
{
    $conn =  pdo_get_connection();
    $sql = "INSERT INTO hoadon(ten,sdt,email,diachi,pptt,tongtien, date) VALUES('$ten',' $sdt',' $email', '$diachi',' $pptt', '$tongtien','$date')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    $conn = NULL;
    return $last_id;
}
function add_hoadon_chitiet($id_sp, $soluong, $dongia, $hinhanh, $tensp, $idbill)
{
    $sql = "INSERT INTO chitiet_hoadon(id_sp,soluong,dongia,hinhanh,tensp,idbill) VALUES('$id_sp','$soluong','$dongia','$hinhanh','$tensp','$idbill')";
    pdo_execute($sql);
}
function delete_bill($id_hoadon)
{
    $sql = "DELETE FROM hoadon  WHERE id_hoadon=" . $id_hoadon;
    pdo_execute($sql);
}
function delete_bill_chitiet($id_hoadon)
{
    $sql = "DELETE FROM chitiet_hoadon  WHERE idbill=" . $id_hoadon;
    pdo_execute($sql);
}
