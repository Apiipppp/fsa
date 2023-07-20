<?php  
include('koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
?>
<?php 
if(empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"]))
{
  echo "<script>alert('Pesanan kosong, Silahkan Pesan dahulu');</script>";
  echo "<script>location= 'menu_pembeli.php'</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- favicon ico -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/apple-touch-icon-57x57.png" />
    <link rel="icon" type="image/png" href="images/apple-touch-icon-57x57.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="images/apple-touch-icon-57x57.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="images/apple-touch-icon-57x57.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="images/apple-touch-icon-57x57.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="images/apple-touch-icon-57x57.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="images/apple-touch-icon-57x57.png" />
    <meta name="msapplication-square70x70logo" content="images/apple-touch-icon-57x57.png" />
    <meta name="msapplication-square150x150logo" content="images/apple-touch-icon-57x57.png" />
    <meta name="msapplication-wide310x150logo" content="images/apple-touch-icon-57x57.png" />
    <meta name="msapplication-square310x310logo" content="images/apple-touch-icon-57x57.png" />

    <title>Pop Ice Mantap Coy</title>
  </head>
  <body>
  <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
          <h1 class="display-4"><span class="font-weight-bold">POP ICE MANTAP COY</span></h1>
          <hr>
          <p class="lead font-weight-bold">Silahkan Pesan Menu Sesuai Keinginan Anda <br> 
          Enjoy Your Drinks</p>
        </div>
      </div>
  <!-- Akhir Jumbotron -->

  <!-- Navbar -->
      <nav class="navbar navbar-expand-lg  bg-dark">
        <div class="container">
        <a class="navbar-brand" href="#">
          <img src="images/apple-touch-icon-57x57.png" width="50" height="50" class="d-inline-block align-top" alt="Logo">
        </a>         
        <a class="navbar-brand text-white" href="user.php"><strong>Pop Ice</strong> Mantap Coy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link mr-4" href="user.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="menu_pembeli.php">DAFTAR MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="pesanan_pembeli.php">PESANAN ANDA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="logout.php">LOGOUT</a>
            </li>
          </ul>
        </div>
       </div> 
      </nav>
  <!-- Akhir Navbar -->

  <!-- Menu -->
    <div class="container">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold">PESANAN ANDA</h3>
        
      </div>
      <table class="table table-bordered" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pesanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subharga</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
            <?php $nomor=1 ?>
            <?php $totalbelanja = 0; ?>
            <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) : ?>

            <?php 
              include('koneksi.php');
              $ambil = mysqli_query($koneksi, "SELECT * FROM produk where id_menu='$id_menu'");
              $pecah = $ambil -> fetch_assoc();

              $subharga = $pecah["harga"]*$jumlah;
            ?>

          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah["nama_menu"];?></td>
            <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
            <td><?php echo $jumlah; ?></td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
            <td>
              <a href="hapus_pesanan.php?id_menu=<?php echo $id_menu ?>" class="badge badge-danger">Hapus</a>
            </td>
          </tr>
            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php endforeach ?>
          
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Toping</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subharga</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
            <?php $tnomor=1 ?>
            <?php $ttotalbelanja = 0; ?>
            <?php foreach ($_SESSION["pesanan1"] as $id_toping => $tjumlah) : ?>

            <?php 
              $tambil = mysqli_query($koneksi, "SELECT * FROM toping where id_toping='$id_toping'");
              $tpecah = $tambil -> fetch_assoc();

              $tsubharga = $tpecah["harga"]*$tjumlah;
            ?>

          <tr>
            <td><?php echo $tnomor; ?></td>
            <td><?php echo $tpecah["nama_toping"];?></td>
            <td>Rp. <?php echo number_format($tpecah["harga"]); ?></td>
            <td><?php echo $tjumlah; ?></td>
            <td>Rp. <?php echo number_format($tsubharga); ?></td>
            <td>
              <a href="hapus_pesanan1.php?id_toping=<?php echo $id_toping ?>" class="badge badge-danger">Hapus</a>
            </td>
          </tr>
            <?php $tnomor++; ?>
            <?php $ttotalbelanja+=$tsubharga; ?>
            <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4">Total Belanja</th>
            <th colspan="2">Rp. <?php echo number_format($totalbelanja+$ttotalbelanja) ?></th>
          </tr>
        </tfoot>
      </table><br>
      <form method="POST" action="">
        <!-- Daftar pesanan dan perhitungan total belanja -->

        <div class="form-group">
            <label for="bayar">Jumlah Uang yang Dibayarkan:</label>
            <input type="number" class="form-control" id="bayar" name="bayar" required>
        </div>

        <button type="submit" class="btn btn-primary" name="konfirm">Konfirmasi Pesanan</button>
      </form>  
      <?php
      $totalBelanjaMenu = 0;
      foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) {
          // Lakukan query ke database untuk mendapatkan harga menu berdasarkan $id_menu
          $query = mysqli_query($koneksi, "SELECT harga FROM produk WHERE id_menu='$id_menu'");
          $menu = mysqli_fetch_assoc($query);
      
          // Hitung total belanja untuk menu ini dan tambahkan ke total belanja keseluruhan
          $totalBelanjaMenu += $menu["harga"] * $jumlah;
      } 

      $totalBelanjaToping = 0;
      foreach ($_SESSION["pesanan1"] as $id_toping => $tjumlah) {
          // Lakukan query ke database untuk mendapatkan harga toping berdasarkan $id_toping
          $query = mysqli_query($koneksi, "SELECT harga FROM toping WHERE id_toping='$id_toping'");
          $toping = mysqli_fetch_assoc($query);

          // Hitung total belanja untuk toping ini dan tambahkan ke total belanja keseluruhan
          $totalBelanjaToping += $toping["harga"] * $tjumlah;
      }

      // Hitung total belanja keseluruhan (menu + toping)
      $totalBelanja = $totalBelanjaMenu + $totalBelanjaToping;

      // Dapatkan nilai uang yang dimasukkan oleh pengguna
      if (isset($_POST["bayar"])) {
      $uangMasuk = (int)$_POST["bayar"]; // Konversi ke tipe data integer untuk keamanan
      // Lakukan perhitungan kembalian
      $kembalian = $uangMasuk - $totalBelanja;
      }
      ?>

      <br>
      <div class="container">
          <h4>Kembalian:</h4>
          <?php
          if (isset($_POST["konfirm"])) {
              // Display the calculated change only when the form is submitted
              echo "<p>Rp. " . number_format($kembalian) . "</p>";
          }
          ?>
      </div>

      <!-- <?php 
      if(isset($_POST['konfirm'])) {
          $tanggal_pemesanan=date("Y-m-d");

          // Menyimpan data ke tabel pemesanan
          $insert = mysqli_query($koneksi, "INSERT INTO pemesanan (tanggal_pemesanan, total_belanja) VALUES ('$tanggal_pemesanan', '$totalbelanja')");

          // Mendapatkan ID barusan
          $id_terbaru = $koneksi->insert_id;

          // Menyimpan data ke tabel pemesanan produk
          foreach ($_SESSION["pesanan"] as $id_menu => $jumlah)
          {
            $insert = mysqli_query($koneksi, "INSERT INTO pemesanan_produk (id_pemesanan, id_menu, jumlah) 
              VALUES ('$id_terbaru', '$id_menu', '$jumlah') ");
          }          

          // Mengosongkan pesanan
          unset($_SESSION["pesanan"]);

          // Dialihkan ke halaman nota
          echo "<script>alert('Pemesanan Sukses!');</script>";
          echo "<script>location= 'menu_pembeli.php'</script>";
      }
      ?> -->
    </div>
    
  <!-- Akhir Menu -->
    

  <!-- Awal Footer -->
      <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="col-md-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> 2023 -  Designed by Kelompok2</p>
          </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
          </div>
        </div>
      </div>
  <!-- Akhir Footer -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script>
  </body>
</html>
<?php } ?>