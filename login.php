<!DOCTYPE html>
<html lang="tr">

<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Girişi</title>
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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <h5 class="card-title"><span> TekBurs</span> | Teknoloji Bursu </h5>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Hesabınıza Giriş Yapınız</h5>
                    <p class="text-center small">Giriş yapmak için kullanıcı adı ve şifrenizi giriniz</p>
                  </div>

                  <form action="kontrol.php" method="post" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label class="form-label">Kullanıcı Adı</label>
                      <div class="input-group has-validation">
                        <input type="text" name="user" class="form-control" required>
                        <div class="invalid-feedback">Lütfen kullanıcı adınızı giriniz!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" required>
                      <div class="invalid-feedback">Lütfen şifrenizi giriniz!</div>
                    </div>

                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Giriş Yap</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="https://www.linkedin.com/in/fatihayca/">Fatih Ayça</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>



</body>

</html>