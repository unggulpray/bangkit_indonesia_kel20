<?php
include '_config.php';
include '_header.php';

$kategori = $_POST['kategori'];

$query = "INSERT INTO kategori(kategori)VALUES('$kategori')";
$result = mysqli_query($con, $query);

if ($result) { ?>
<script type="text/javascript">
Swal.fire(
        'Data Kategori Ditambahkan',
        'Data Kategori berhasil ditambahkan',
        'success')
    .then(() => {
        location.href = 'page_kategori.php'
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
        location.href = 'page_kategori.php'
    })
</script>
<?php } ?>