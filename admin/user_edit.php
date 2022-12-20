<?php include '_header.php'; 
include '_config.php';
?>
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Edit Data User</h5>
        <div class="card-body">
            <h5 class="card-title">Form Edit User</h5>

            <?php
            $id_user = $_GET['id'];
           
            //$kategori = isset($_GET['kategori']);
            $data = mysqli_query($con, "SELECT * FROM user WHERE id_user = $id_user");
            foreach ($data as $row) : 
            ?>

            <form action="user_edit_proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_user" class="form-control" value="<?= $id_user ?>">
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <img width="150" height="150" src="./img_artikel/fotouser/<?= $row['foto']?>" alt="">
                    </div><br>
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_user" class="form-control" value="<?= $row['nama_user'] ?>">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $row['username']?>">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" value="<?= $row['password']?>">
                    <label for="">Foto</label>
                    <input type="file" name="gambar" class="form-control" value="<?= $row['foto']?>"><br>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger " onclick="history.go(-1)">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary ">Update</button>
                    </div>
            </form>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- ./content -->
<?php include '_footer.php'; ?>