<?php 
include ('_header.php');
include '_config.php';
$gambar = isset($_POST['gambar']);
$id_user = $_SESSION['id_user'];
$keterangan = $_POST['keterangan'];

$namaFile = $_FILES['gambar']['name'];
$tmpFile = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmpFile, 'img_artikel/fotogaleri/'. $namaFile);

$query = "INSERT INTO gallery(gambar, id_user, keterangan) VALUES(
    '".$namaFile."',
    $id_user,
    '".$keterangan."'
)";

$result = mysqli_query($con, $query);

if ($result) { ?>
<script type="text/javascript">
Swal.fire(
        'Data Gallery Ditambahkan',
        'Data gallery berhasil ditambahkan',
        'success')
    .then(() => {
        location.href = 'page_galeri.php'
    })
</script>
<?php
    } else { ?>
<script type="text/javascript">
Swal.fire(
        'Data Gagal Ditambahkan',
        'Data gallery gagal ditambahkan',
        'error')
    .then(() => {
        location.href = 'page_galeri.php'
    })
</script>
<?php } ?>