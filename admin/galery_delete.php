<?php 
include ('_header.php');
include '_config.php';
$id = $_GET['id'];

$deleteGalery = mysqli_query($con, "DELETE FROM gallery WHERE id=$id");

if($deleteGalery){?>
<script type="text/javascript">
Swal.fire(
        'Data Gallery Dihapus',
        'Data gallery dengan id <?= $id?> berhasil dihapus',
        'success')
    .then(() => {
        location.href = 'page_galeri.php'
    })
</script>
<?php }else{?>
<script type="text/javascript">
Swal.fire(
        'Data Gagal Dihapus',
        'Data gallery dengan id <?= $id?> gagal dihapus',
        'error')
    .then(() => {
        location.href = 'page_galeri.php'
    })
// return false;
</script>
<?php }
    ?>