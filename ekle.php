<?php
include_once 'fonksiyon.php'; 
$baglan = baglan();
$class= new bursTakip();
session_start();
error_reporting(0);

$ad = ucfirst($_POST["ad"]);
$soyad = ucfirst($_POST["soyad"]);
$telefon = $class->cleantel($_POST["telefon"]);
$mail = $class->cleanString($_POST["mail"]);
$bagismiktar = $_POST["bagismiktar"];
$burs = $_POST["burs"];
$neden = ucfirst($_POST["neden"]);
$ileti = ucfirst($_POST["ileti"]);

//Toplam verilen burs hesabı
$sorgu = $baglan->prepare("select * from bursiyer");
$sorgu->execute();
$toplamburs = 0;
while ($satir = $sorgu->fetchObject()){
    $toplamburs += $satir->burs;
}

//Toplam bağış hesabı
$sorgu = $baglan->prepare("select * from bursveren");
$sorgu->execute();
$toplambagis = 0;
while ($satir = $sorgu->fetchObject()){
    $toplambagis += $satir->bagis;
}

//Bursveren -- bursiyer -- burs başvuru - ileti kayıt
if ($_POST["bagismiktar"] != "") {
        $sorgu = $baglan->prepare('insert into bursveren values(?,?,?,?,?,?)');
        $ekle = $sorgu->execute(array(NULL,"$ad","$soyad","$telefon","$mail","$bagismiktar"));
        if ($ekle) {
            echo "<script>
            alert('Burs veren ekleme başarılı');
            window.location.href='bursveren.php'
            </script>";
            die();
        } else {
            echo "<script>
            alert('Burs veren ekleme başarısız')
            window.location.href='bursveren.php'
            </script>";
            die();
        }
} elseif ($_POST["burs"] != ""){
    if ($toplambagis >= ($toplamburs + $burs)) {
        $sorgu = $baglan->prepare('insert into bursiyer values(?,?,?,?,?,?)');
        $ekle = $sorgu->execute(array(NULL,$ad,"$soyad","$telefon","$mail","$burs"));
        if ($ekle) {
            echo "<script>
            alert('Bursiyer ekleme başarılı');
            window.location.href='bursiyer.php'
            </script>";
            die();
        } else {
            echo "<script>
            alert('Bursiyer ekleme başarısız')
            window.location.href='bursiyer.php'
            </script>";
            die();
        }
    } else {
        echo "<script>
        alert('Bağış Miktarı Yetersiz!')
        window.location.href='bursiyer.php'
        </script>";
        die();
    }
} elseif ($_POST["neden"] != ""){
    $sorgu = $baglan->prepare('insert into bursbasvuru values(?,?,?,?,?,?)');
    $ekle = $sorgu->execute(array(NULL,$ad,"$soyad","$telefon","$mail","$neden"));
    if ($_POST["ad"] != "") {
        if ($ekle) {
            echo "<script>
            alert('Burs başvurusu başarılı');
            window.location.href='basvuru.php'
            </script>";
            die();
        } else {
            echo "<script>
            alert('Burs başvurusu başarısız')
            window.location.href='basvuru.php'
            </script>";
            die();
        }
    }
} elseif ($_POST["ileti"] != ""){
    $sorgu = $baglan->prepare('insert into destek values(?,?,?,?,?)');
    $ekle = $sorgu->execute(array(NULL,$ad,"$soyad","$mail","$ileti"));
    if ($_POST["ad"] != "") {
        if ($ekle) {
            echo "<script>
            alert('İletiniz gönderildi.');
            window.location.href='destek.php'
            </script>";
            die();
        } else {
            echo "<script>
            alert('İleti gönderilemedi!')
            window.location.href='destek.php'
            </script>";
            die();
        }
    }
}
?>