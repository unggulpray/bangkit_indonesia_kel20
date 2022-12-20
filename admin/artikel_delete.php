<?php
include '_config.php';
include '_header.php';

$id_artikel = $_GET['id_artikel'];

$delete = mysqli_query($con, "DELETE FROM artikel WHERE id_artikel = $id_artikel");

if($delete){?>
<script type="text/javascript">
Swal.fire(
        'Data Artikel Dihapus',
        'Data Artikel dengan id <?= $id_artikel?> berhasil dihapus',
        'success')
    .then(() => {
        location.href = 'page_artikel.php'
    })
</script>
<?php }else{?>
<script type="text/javascript">
Swal.fire(
        'Data Gagal Dihapus',
        'Data Artikel dengan id <?= $id_artikel?> gagal dihapus',
        'error')
    .then(() => {
        location.href = 'page_artikel.php'
    })
// return false;
</script>
<?php }
        ?>