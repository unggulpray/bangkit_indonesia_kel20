<?php
include('./_config.php');
include "./_header.php";
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($con, "SELECT * FROM user where username = '$username' && password = '$password'");

if($query->num_rows > 0){
    foreach($query as $data){
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['foto'] = $data['foto'];
    }  
?>
<script type="text/javascript">
Swal.fire(
        'Login Berhasil',
        '',
        'success')
    .then(() => {
        location.href = 'index.php'
    })
</script>

<?php }else{?>
<script type="text/javascript">
Swal.fire(
        'Login Gagal',
        '',
        'error')
    .then(() => {
        location.href = 'login.php'
    })
</script>
<?php }
?>