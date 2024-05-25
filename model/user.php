<?php
require_once 'pdo.php';

function nguoidung_insert($ten, $sdt, $DiaChi, $email, $pass, $quyen, $trangthai)
{
    $sql = "INSERT INTO nguoidung(ten, sdt, DiaChi, email, pass, quyen, trangthai) VALUES ('$ten', '$sdt', '$DiaChi','$email','$pass', '$quyen', '$trangthai')";
    pdo_execute($sql);
}

function khach_hang_update_admin($id, $ten_new, $sdt_new, $DiaChi_new, $email_new, $quyen_new, $trangthai_new)
{
    $sql = "UPDATE nguoidung SET ten='$ten_new',sdt='$sdt_new',email='$email_new',
    DiaChi='$DiaChi_new', quyen='$quyen_new',trangthai='$trangthai_new'  WHERE id=" . $id;
    pdo_execute($sql);
}
function khach_hang_update_byEmail($email, $ten_new, $sdt_new, $DiaChi_new, $email_new)
{
    $sql = "UPDATE nguoidung SET ten='$ten_new',sdt='$sdt_new',email='$email_new',
    DiaChi='$DiaChi_new' WHERE email= '$email' ";
    pdo_execute($sql);
}
function delete_user($id)
{
    $sql = "DELETE FROM nguoidung  WHERE id=" . $id;
    pdo_execute($sql);
}

function user_select_all()
{
    $sql = "SELECT * FROM nguoidung";
    return pdo_query($sql);
}

function user_select_by_id($id)
{
    $sql = "SELECT * FROM nguoidung WHERE id=" . $id;
    return pdo_query($sql);
}
function user_select_by_email($email)
{
    $sql =  "SELECT * FROM nguoidung WHERE email='$email'";
    return pdo_query($sql);
}
function khach_hang_exist($ma_kh)
{
    $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

function khach_hang_change_password($email, $passnew)
{
    $sql = "UPDATE nguoidung SET pass = '$passnew' WHERE email = '$email'";
    pdo_execute($sql);
}
