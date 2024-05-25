<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */
function danhmuc_insert($TenDanhMuc)
{
    $sql = "INSERT INTO danhmuc(TenDanhMuc) VALUES('$TenDanhMuc')";
    pdo_execute($sql);
}
/**
 * Cập nhật tên loại
 * @param int $ma_loai là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function danhmuc_update($id, $TenDanhMuc)
{
    $sql = "UPDATE danhmuc SET TenDanhMuc='$TenDanhMuc' WHERE id=" . $id;
    pdo_execute($sql);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_loai là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function danhmuc_delete($id)
{
    $sql = "DELETE FROM danhmuc WHERE id=" . $id;
    pdo_execute($sql);
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_all()
{
    $sql = "SELECT * FROM danhmuc";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $ma_loai là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_by_id($id)
{
    $sql = "SELECT * FROM danhmuc WHERE id=" . $id;
    return pdo_query_one($sql);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $ma_loai là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function loai_exist($id)
{
    $sql = "SELECT count(*) FROM danhmuc WHERE id=" .$id;
    return pdo_query_value($sql, $id) > 0;
}
function getonedm($id)
{
    $sql = "SELECT * FROM danhmuc WHERE id=" .$id;
    return pdo_query($sql);
}
