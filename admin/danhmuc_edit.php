
<br> <br>
<div class="container">
    <h2>CẬP NHẬT DANH MỤC</h2>

    <?php
    ?>
    <form action="index.php?pg=edit_dm" method="POST">
        <div class="form-group">
            <label >Tên Danh Mục:</label>
            <input type="text" class="form-control" name="TenDanhMuc" value="<?= $kqone[0]['TenDanhMuc'] ?>">
            <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>">
            <br>
            <input type="submit" class="btn btn-primary"name="capnhat" value="Cập nhật"></input>
    </form>
</div>