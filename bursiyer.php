<!DOCTYPE html>
<html lang="tr">

<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bursiyer Takip Yönetim Paneli</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

<?php
include_once 'fonksiyon.php'; 
$baglan = baglan();
$class= new bursTakip();
error_reporting(0);
session_start();


//Giriş Kontrol
if ($_SESSION["giris"] != "var") {
    echo "<script>
    alert('Lütfen Kullanıcı Girişi Yapınız!');
    window.location.href='index.php'
    </script>";
}
?>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="anasayfa.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <h5 class="card-title"><span> TekBurs</span> | Teknoloji Bursu </h5>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>


  </header>

    <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link ">
      <i class="bi bi-grid"></i>
      <span>Gösterge Paneli</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="anasayfa.php">
      <i class="ri-bank-line"></i>
      <span>Anasayfa</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="bursbasvuru.php">
      <i class="ri-contacts-line"></i>
      <span>Burs Başvuru Takip Paneli</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="bursveren.php">
      <i class="ri-drop-fill"></i>
      <span>Burs Veren Takip Paneli</span>
    </a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link collapsed" href="bursiyer.php">
      <i class=" ri-drop-line"></i>
      <span>Bursiyer Takip Paneli</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="kasa.php">
      <i class="ri-calculator-line"></i>
      <span>Kasa Yönetim Paneli</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="destekadmin.php">
      <i class="ri-chat-3-line"></i>
      <span>Bize Ulaşın</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="cikis.php">
      <i class="bi bi-box-arrow-right"></i>
      <span>Çıkış Yap</span>
    </a>
  </li>

</ul>

</aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Bursiyer Takip Paneli</h1>
    </div>

    <section class="section dashboard">
      <div class="row">

      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bursiyer Ekle</h5>

              <form action="ekle.php" method="post" class="row g-3">
              <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" name="ad" class="form-control" placeholder="Ad" required>
                    <label>Ad</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" name="soyad" class="form-control" placeholder="Soyad" required>
                    <label>Soyad</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <input type="text" name="telefon" class="form-control" placeholder="Telefon Numarası" required>
                    <label>Telefon Numarası</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" name="mail" class="form-control" placeholder="Mail Adresi" required>
                    <label for="floatingPassword">Mail Adresi</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                  <input type="number" name="burs" class="form-control" placeholder="Verilecek Burs Miktarı" required>
                    <label >Verilecek Burs Miktarı</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Bursiyer Ekle</button>
                  <button type="reset" class="btn btn-secondary">Sıfırla</button>
                </div>
              </form>
            </div>
</div>


<div class="card">
            <div class="card-body">
              <h5 class="card-title">Bursiyerler</h5>

              <form action="bursiyer.php" method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bursiyer Ara</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="arama">
                  </div>
                </div>
                  <div class="col-sm-10">
                  </div><button style="float:right" type="submit" class="btn btn-primary">Ara</button>
                </div>
              </form>


<div class="card">
            <div class="card-body">
              <h5 class="card-title">Bursiyer Tablosu</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Ad</th>
                    <th scope="col">Soyad</th>
                    <th scope="col">Telefon No</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Burs Miktarı(TL)</th>
                    <th scope="col">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

$search=$_POST["arama"];
if (isset($_POST["arama"]) & $_POST["arama"] != "") {
  $sorgu = $baglan->prepare("select * from bursiyer where concat(ad,soyad,telefon,mail) like '%".$search."%' ");
  $sorgu->execute();
  while ($satir = $sorgu->fetchObject()){
    echo "<tr>
            <td>$satir->ad</td>
            <td>$satir->soyad</td>
            <td>$satir->telefon</td>
            <td>$satir->mail</td>
            <td>$satir->burs</td>
            <td><a href='bursiyer.php?id=$satir->id'>Sil</a></td> 
          </tr>";
  }
} else {
  $sorgu = $baglan->prepare("select * from bursiyer order by id asc");
  $sorgu->execute();
  while ($satir = $sorgu->fetchObject()){
    echo "<tr>
            <td>$satir->ad</td>
            <td>$satir->soyad</td>
            <td>$satir->telefon</td>
            <td>$satir->mail</td>
            <td>$satir->burs</td>
            <td><a href='bursiyer.php?id=$satir->id'>Sil</a></td> 
          </tr>";
  }
}

                  ?>
                  <button type="button" class="btn btn-light"><a href="csvindir.php?id=bursiyer">
                     CSV Olarak İndir</a></button>
                </tbody>
                <?php
                if (isset($_GET["id"])) {
                    $class->bursiyersil();
                }
                ?>
              </table>
              </div> 
          </div>

  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Fatih Ayça</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://www.linkedin.com/in/fatihayca/">Fatih Ayça</a>
    </div>

  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<script src="assets/js/main.js"></script>

</body>

</html>