<?php
include '_config.php';
include '_header.php';

$nama = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$foto = isset($_POST['gambar']);

$namaFile = $_FILES['gambar']['name'];
$tmpFile = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmpFile, 'img_artikel/fotouser/'. $namaFile);


$query = "INSERT INTO user(nama_user, foto, username, password) VALUES ('$nama', '$namaFile', '$username', '$password')";
$result = mysqli_query($con, $query);

if ($result) { ?>
<script type="text/javascript">
Swal.fire(
        'Data User Ditambahkan',
        'Data <?= $nama?> berhasil ditambahkan',
        'success')
    .then(() => {
        location.href = 'page_user.php'
    })
</script>
<?php
} else { ?>
<script type="text/javascript">
Swal.fire(
        'Data Gagal Ditambahkan',
        'Data <?= $nama?> Gagal ditambahkan',
        'error')
    .then(() => {
        location.href = 'page_user.php'
    })
</script>
<?php } ?>