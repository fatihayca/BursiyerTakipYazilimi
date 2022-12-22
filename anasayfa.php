<!DOCTYPE html>
<html lang="tr">

<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
  <title>Burs Takip Yönetim Paneli</title>
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
session_start();
include_once 'fonksiyon.php'; 
$baglan = baglan();
$class= new bursTakip(); //Class bağlantı
error_reporting(0);

//Giriş Kontrol
if ($_SESSION["giris"] != "var") {
    echo "<script>
    alert('Lütfen Kullanıcı Girişi Yapınız!');
    window.location.href='index.php'
    </script>";
}

//Bursiyer Sayısı
$sorgu = $baglan->prepare("select * from bursiyer");
$sorgu->execute();
$bursiyersay = $sorgu->rowCount();

//Burs Basvuru Sayısı
$sorgu = $baglan->prepare("select * from bursbasvuru");
$sorgu->execute();
$basvurusay = $sorgu->rowCount();


//Bursveren Sayısı
$sorgu = $baglan->prepare("select * from bursveren");
$sorgu->execute();
$bursverensay = $sorgu->rowCount();

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
      <h1>Anasayfa</h1>
    </div>

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-8">
          <div class="row">

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Burs Başvuru Sayısı <span> Toplam</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        echo $basvurusay;
                        ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Burs Veren Sayısı <span> Toplam</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                        echo $bursverensay;
                        ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Bursiyer Sayısı <span>  &nbsp&nbsp&nbsp&nbsp  Toplam</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                        echo $bursiyersay;
                        ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Burs Başvuruları</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Ad</th>
                    <th scope="col">Soyad</th>
                    <th scope="col">Telefon No</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Başvuru Nedeni</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sorgu = $baglan->prepare("select * from bursbasvuru");
                  $sorgu->execute();
                  while ($satir = $sorgu->fetchObject()){
                    $toplambagis += $satir->bagis;
                    echo "<tr>
                            <td>$satir->ad</td>
                            <td>$satir->soyad</td>
                            <td>$satir->telefon</td>
                            <td>$satir->mail</td>
                            <td>$satir->neden</td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
              </div> 
          </div>
        
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Burs Veren Tablosu</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Ad</th>
                    <th scope="col">Soyad</th>
                    <th scope="col">Telefon No</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Bağış</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sorgu = $baglan->prepare("select * from bursveren");
                  $sorgu->execute();
                  while ($satir = $sorgu->fetchObject()){
                    echo "<tr>
                            <td>$satir->ad</td>
                            <td>$satir->soyad</td>
                            <td>$satir->telefon</td>
                            <td>$satir->mail</td>
                            <td>$satir->bagis TL</td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
              </div> 
          </div>

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
                    <th scope="col">Burs Miktarı</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sorgu = $baglan->prepare("select * from bursiyer");
                  $sorgu->execute();
                  while ($satir = $sorgu->fetchObject()){
                    echo "<tr>
                            <td>$satir->ad</td>
                            <td>$satir->soyad</td>
                            <td>$satir->telefon</td>
                            <td>$satir->mail</td>
                            <td>$satir->burs TL</td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
              </div> 
          </div>

          </div>
        </div>

        <div class="col-lg-4">
          
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Başvuru - Burs Veren - Bursiyer</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Toplam Sayı',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value:
                        <?php
                        echo $bursiyersay;
                        ?>,
                          name: 'Burs Başvuru Sayısı'
                        },
                        {
                          value:
                        <?php
                        echo $basvurusay;
                        ?>,
                          name: 'Burs Veren Sayısı'
                        },
                        {
                          value:
                          <?php
                        echo $bursverensay;
                        ?>,
                          name: 'Bursiyer Sayısı'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>


        </div>

      </div>
    </section>

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