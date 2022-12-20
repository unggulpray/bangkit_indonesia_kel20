<?php
include '_config.php';
include '_header.php';

$id_kategori = $_GET['id_kategori'];

$delete = mysqli_query($con, "DELETE FROM kategori WHERE id_kategori = $id_kategori");


if($delete){?>
<script type="text/javascript">
Swal.fire(
        'Data Kategori Dihapus',
        'Data dengan id <?= $id_kategori?> berhasil dihapus',
        'success')
    .then(() => {
        location.href = 'page_kategori.php'
    })
</script>
<?php }else{?>
<script type="text/javascript">
Swal.fire(
        'Data Kategori Gagal Dihapus',
        'Data dengan id <?= $id_kategori?> gagal dihapus',
        'error')
    .then(() => {
        location.href = 'page_kategori.php'
    })
// return false;
</script>
<?php }
?>