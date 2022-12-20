<?php include '_header.php'; 
include '_config.php';
?>
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Data Gallery</h5>
        <div class="card-body">
            <h5 class="card-title">Lihat Gallery</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                Tambah Data Gallery
            </button>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">id user</th>
                        <th scope="col">keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $data = mysqli_query($con, "SELECT * FROM gallery");
                    foreach ($data as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><img height="100" width="100" src="<?= 'img_artikel/fotogaleri/'.$row['gambar']?>" alt="">
                        </td>
                        <td><?= $row['id_user'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td>
                            <a class="badge badge-success" href="galery_edit.php?id=<?= $row['id'] ?>">Edit</a>
                            <a class="badge badge-danger" style="color: white;"
                                onclick="return deleteGaleri(<?= $row['id']?>)">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ./content -->

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Foto Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="gallery_add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger " data-dismiss="modal"
                            onclick="history.go(-1)">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ./Modal add -->

<!-- Modal Update -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user_edit.php" method="POST">
                    <div class="form-group">
                        <label for="">user</label>
                        <input type="text" name="user" class="form-control" required value="<?= $row['nama_user'] ?>">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger " data-dismiss="modal"
                            onclick="history.go(-1)">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary ">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ./Modal Update -->
<script type="text/javascript">
function deleteGaleri(id) {
    Swal.fire({
        title: 'Delete Galeri ini? ',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Delete',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = 'galery_delete.php?id=' + id
        }
    })
}
</script>


<?php include '_footer.php'; ?>