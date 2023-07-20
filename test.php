<?php
include('koneksi.php');

$sql = "SELECT * FROM produk";
$result = mysqli_query($koneksi, $sql);

$sqli = "SELECT * FROM toping";
$resulti = mysqli_query($koneksi, $sqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Table Minuman</h1>
<table border="1" cellspacing="0" cellpadding="10">

<tr>
    <th>no</th>
    <th>id</th>
    <th>nama</th>
    <th>jenis</th>
    <th>stok</th>
    <th>harga</th>
</tr>

<?php $i=1; ?>
<?php while ( $row = mysqli_fetch_assoc($result) ) : ?>

<tr>
    <td><?= $i?></td>
    <td><?= $row["id_menu"]; ?></td>
    <td><?= $row["nama_menu"]; ?></td>
    <td><?= $row["jenis_menu"]; ?></td>
    <td><?= $row["stok"]; ?></td>
    <td><?= $row["harga"]; ?></td>        
</tr>

<?php $i++; ?>   
<?php endwhile; ?> 

<?php while ( $rows = mysqli_fetch_assoc($resulti) ) : ?>

<tr>
    <td><?= $i?></td>
    <td><?= $rows["id_toping"]; ?></td>
    <td><?= $rows["nama_toping"]; ?></td>
    <td>minuman</td>
    <td><?= $rows["stok"]; ?></td>
    <td><?= $rows["harga"]; ?></td>        
</tr>
<?php $i++; ?>   
<?php endwhile; ?> 


</table>
</body>
</html>

