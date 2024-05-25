    <?php
    require_once 'pdo.php';

    function binhluan_insert($id_user, $id_sp, $NoiDung, $NgayLap)
    {
        $sql = "INSERT INTO binhluan(id_user, id_sp , NoiDung, NgayLap) VALUES ('$id_user', '$id_sp' , '$NoiDung',' $NgayLap')";
        pdo_execute($sql);
    }

    function binhluan_update($id, $id_user, $id_sp, $NoiDung, $NgayLap)
    {
        $sql = "UPDATE binhluan SET id_user=?,id_sp =?,NoiDung=?,NgayLap=? WHERE id=?";
        pdo_execute($sql, $id_user, $id_sp, $NoiDung, $NgayLap, $id);
    }

    function binhluan_delete($id_cmt)
    {
        $sql = "DELETE FROM binhluan WHERE id=" . $id_cmt;
        pdo_execute($sql);
    }

    function binhluan_select_all()
    {
        $sql = "SELECT * FROM binhluan bl ORDER BY NgayLap DESC";
        return pdo_query($sql);
    }

    function binhluan_select_by_id($id)
    {
        $sql = "SELECT * FROM binhluan WHERE id=?";
        return pdo_query_one($sql, $id);
    }

    function binhluan_exist($id)
    {
        $sql = "SELECT count(*) FROM binhluan WHERE id=?";
        return pdo_query_value($sql, $id) > 0;
    }
    //-------------------------------//
    function binhluan_select_by_hang_hoa($id_sp)
    {
        $sql = "SELECT b.*, h.ten_hh FROM binhluan b JOIN hang_hoa h ON h.id_sp =b.id_sp  WHERE b.id_sp =? ORDER BY NgayLap DESC";
        return pdo_query($sql, $id_sp);
    }
