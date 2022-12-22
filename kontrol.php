<?php
session_start();
require_once 'fonksiyon.php';
$baglan = baglan();


$kullanici = $_POST["user"];
$sifre = $_POST["password"];

//Kullanıcı kontrolü
$sorgu = $baglan->query("select * from yonetici where (user='$kullanici' && password='$sifre')"); //kullanıcı adı ve şifresini doğruladım
$kayitsay = $sorgu->rowCount(); 

//Veritabanına kayıtlı kullanici-sifre varsa giriş yapılabilir, eğer yoksa login sayfasına geri döner
if ($kayitsay > 0) { 
    $_SESSION["giris"] = "var";
    echo "<script>
    alert('Giriş Başarılı!');
    window.location.href='anasayfa.php'
    </script>";
    die();
} else {
    echo "<script>
    alert('HATALI KULLANICI BİLGİSİ!');
    window.location.href='login.php'
    </script>";
    die();
}

?>