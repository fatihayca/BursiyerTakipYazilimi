<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kasa Yönetim Paneli</title>
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

$sorgu = $baglan->prepare("select * from bursiyer");
$sorgu->execute();
//Toplam verilen burs hesabı
$toplamburs = 0;
while ($satir = $sorgu->fetchObject()){
    $toplamburs += $satir->burs;
}

$sorgu = $baglan->prepare("select * from bursveren");
$sorgu->execute();
//Toplam bağış hesabı
$toplambagis = 0;
while ($satir = $sorgu->fetchObject()){
    $toplambagis += $satir->bagis;
}
//Kasada kalan para hesabı
$kasa = $toplambagis - $toplamburs;

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
      <h1>Kasa Yönetim Paneli</h1>
    </div>

    <section class="section dashboard">
      <div class="row">

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Toplam Bağış Miktarı<span> TL</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        echo "$toplambagis TL";
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
                  <h5 class="card-title">Verilen Toplam Burs Miktarı <span> TL</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                        echo "$toplamburs TL";
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
                  <h5 class="card-title">Kasadaki Para Miktarı <span> TL</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                        echo "$kasa TL";
                        ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <canvas id="pieChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: [
                        'Toplam Bağış Miktarı',
                        'Verilen Toplam Burs Miktarı',
                        'Kasadaki Para Miktarı'
                      ],
                      datasets: [{
                        label: 'My First Dataset',
                        data: [<?php echo $toplambagis; ?>,<?php echo $toplamburs; ?>,<?php echo $kasa; ?>],
                        backgroundColor: [
                          'rgb(54, 162, 235)',
                          'rgb(255, 99, 132)',
                          'rgb(0, 255, 0)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>

      </div></section>

      <br><br>

      
    <div class="card" style="width:35%">
            <div class="card-body">
              <h5 class="card-title">Manuel Kasa Kalan Miktar Hesabı</h5>
                <div class="col-md-6">
                  <label class="form-label">Toplam Bağış Miktarı
                  <input type="email" class="form-control" id="toplamalinanbagis"></label>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Toplam Verilen Burs Miktarı
                  <input type="text" class="form-control" id="toplamverilenburs"></label>
                </div>
                <label><button type="submit" class="btn btn-primary">Kalan Para Hesapla</button></label><br>
                <div class="col-md-6">
                 
                </div><br><div>Kasa Kalan Para(TL) :</div>
                <div class="alert alert-primary alert-dismissible fade show" style="width:50%" id="sonuc">
              </div>
                <div class="col-12">
                </div>
            </div>
          </div>

          <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

          <script>

              $(document).ready(function(){
                  $("button").click(function(){

                      $.ajax({
                          cache:false,
                          type: "POST",
                          url:"ajax.php",
                          data: "toplamalinanbagis=" + $("#toplamalinanbagis").val() + "&toplamverilenburs=" + $("#toplamverilenburs").val(),
                          success: function(result){
                              $("#sonuc").html(result);
                          },
                          error: function(xhr){
                              $("#sonuc").html("Hata: "+xhr.status + " "+xhr.statusText);
                          }
                      })
                  });
              });

          </script>


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