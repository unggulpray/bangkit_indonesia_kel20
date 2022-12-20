<?php 
    include ('_header.php');
    include '_config.php';
    $id = $_POST['id'];
    $gambar = isset($_POST['gambar']);
    $id_user = $_SESSION['id_user'];
    $keterangan = $_POST['keterangan'];

    $namaFile = $_FILES['gambar']['name'];
    $tmpFile = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmpFile, 'img_artikel/fotogaleri/'. $namaFile);

    if(empty($namaFile)){
        $update = mysqli_query($con, "UPDATE gallery SET id_user=$id_user, keterangan='$keterangan' where id= $id");
    }else{
        $update = mysqli_query($con, "UPDATE gallery SET gambar='$namaFile', id_user=$id_user, keterangan='$keterangan' where id= $id");
    }

    if($update){?>
<script>
Swal.fire(
        'Data Gallery Diupdate',
        'Data dengan id <?= $id?> telah diupdate',
        'success')
    .then(() => {
        location.href = 'page_galeri.php'
    })
</script>
<?php }else{?>
<script>
Swal.fire(
        'Data Gallery Gagal Diupdate',
        'Data gallery dengan id <?= $id?> gagal diupdate ',
        'error')
    .then(() => {
        location.href = 'page_galeri.php'
    })
</script>
<?php }
                ?>