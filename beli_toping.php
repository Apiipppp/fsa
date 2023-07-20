<?php 
session_start();

$id_toping = $_GET['id_toping'];

if (isset($_SESSION['pesanan1'][$id_toping]))
{
	$_SESSION['pesanan1'][$id_toping]+=1;
}

else 
{
	$_SESSION['pesanan1'][$id_toping]=1;
}

echo "<script>alert('topping telah di tambahkan ke pesanan anda');</script>";
echo "<script>location= 'pesanan_pembeli.php'</script>";

 ?>