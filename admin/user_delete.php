<?php
 include '_header.php';  
 include '_config.php';
    $id = $_GET['id'];

    $sql = mysqli_query($con, "DELETE FROM  user where id_user = $id");

    if($sql){?>
<script type="text/javascript">
Swal.fire(
        'Data User Dihapus',
        'Data dengan id <?= $id?> berhasil dihapus',
        'success')
    .then(() => {
        location.href = 'page_user.php'
    })
</script>
<?php }else{?>
<script type="text/javascript">
Swal.fire(
        'Data User Gagal Dihapus',
        'Data dengan id <?= $id?> gagal dihapus',
        'error')
    .then(() => {
        location.href = 'page_user.php'
    })
// return false;
</script>
<?php }
?>