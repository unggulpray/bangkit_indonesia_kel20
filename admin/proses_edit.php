<?php
include '_config.php';
include '_header.php';

$id_kategori = $_POST['id_kategori'];
$kategori = $_POST['kategori'];

date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');

$update = mysqli_query($con, "UPDATE kategori SET kategori= '$kategori' WHERE id_kategori = '$id_kategori'");

if($update){?>
<script>
Swal.fire(
        'Data Kategori Diupdate',
        'Data dengan id <?= $id_kategori?> telah diupdate',
        'success')
    .then(() => {
        location.href = 'page_kategori.php'
    })
</script>
<?php }else{?>
<script>
Swal.fire(
        'Data Kategori Gagal Diupdate',
        'Data dengan id <?= $id_kategori?> gagal diupdate ',
        'error')
    .then(() => {
        location.href = 'page_kategori.php'
    })
</script>
<?php }
            ?>