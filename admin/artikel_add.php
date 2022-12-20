<?php
include '_config.php';
include '_header.php';

$judul = $_POST['judul'];
$artikel = $_POST['artikel'];
$tanggal = $_POST['tanggal'];
$gambar = isset($_POST['gambar']);
$kategori = $_POST['id_kategori'];

//upload dan simpan artikel
$namafile = $_FILES['gambar']['name'];
$tmp_name = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp_name, 'img_artikel/' . $namafile);

$query = "INSERT INTO artikel(judul, artikel, tanggal, gambar, id_kategori) VALUES(
    '" . $judul . "',
    '" . $artikel . "',
    '" . $tanggal . "',
    '" . $namafile . "',
    '" . $kategori . "'
    )";

$result = mysqli_query($con, $query);

if ($result) { ?>
<script type="text/javascript">
Swal.fire(
        'Data Kategori Ditambahkan',
        'Data Kategori berhasil ditambahkan',
        'success')
    .then(() => {
        location.href = 'page_artikel.php'
    })
</script>
<?php
        } else { ?>
<script type="text/javascript">
Swal.fire(
        'Data Gagal Ditambahkan',
        'Data Kategori Gagal ditambahkan',
        'error')
    .then(() => {
        location.href = 'page_artikel.php'
    })
</script>
<?php } ?>