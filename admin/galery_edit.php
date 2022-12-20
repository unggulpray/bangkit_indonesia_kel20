<?php include '_header.php'; include '_config.php';?>
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Udah Data Gallery</h5>
        <div class="card-body">
            <h5 class="card-title">Form Edit Gallery</h5>

            <?php
            $id_Gallery = $_GET['id'];
           
            //$kategori = isset($_GET['kategori']);
            $data = mysqli_query($con, "SELECT * FROM gallery WHERE id = $id_Gallery");
            foreach ($data as $row) : 
            ?>

            <form action="gallery_edit_proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" value="<?= $id_Gallery ?>">
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <img width="150" height="150" src="<?= 'img_artikel/fotogaleri/'.$row['gambar']?>" alt="">
                    </div><br>
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?= $row['keterangan']?>">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control" value="<?= $row['gambar'] ?>">
                </div>
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