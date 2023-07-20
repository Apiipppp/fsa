<?php 
session_start();
 
$id_toping = $_GET["id_toping"];

unset($_SESSION["pesanan1"][$id_toping]);


echo "<script>alert('Toping telah dihapus');</script>"; 
echo "<script>location= 'pesanan_pembeli.php'</script>";


?>