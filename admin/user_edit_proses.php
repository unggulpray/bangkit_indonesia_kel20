<?php
include('_header.php');
include '_config.php';
$id_user = $_POST['id_user'];
$foto = isset($_POST['gambar']);
$nama = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];

$namaFile = $_FILES['gambar']['name'];
$tmpFile = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmpFile, 'img_artikel/fotouser/'. $namaFile);

if(empty($namaFile)){
    $update = mysqli_query($con, "UPDATE user SET nama_user='$nama', username='$username', password='$password' where id_user= $id_user");
}else{
    $update = mysqli_query($con, "UPDATE user SET nama_user='$nama', foto='$namaFile', username='$username', password='$password' where id_user= $id_user");

}

if ($update) { ?>
<script>
Swal.fire(
        'Data User Diupdate',
        'Data dengan id <?= $id_user ?> telah diupdate',
        'success')
    .then(() => {
        location.href = 'page_user.php'
    })
</script>
<?php } else { ?>
<script>
Swal.fire(
        'Data User Gagal Diupdate',
        'Data dengan id <?= $id_user ?> gagal diupdate ',
        'error')
    .then(() => {
        location.href = 'page_user.php'
    })
</script>
<?php }
?>