<?php

    function baglan() {
      $baglan=new PDO("mysql:host=localhost;dbname=burstakip;charset=utf8","root","");
      $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $baglan->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $baglan;
    }

    //Class yapısı
    class bursTakip {

    //Bursveren sil fonksiyonu
    public function bursverensil() {
      $silme = $_GET["id"];
      $baglan = baglan();
      $sorgu = $baglan->prepare("delete from bursveren where id=?");
      $sil = $sorgu->execute(array($silme)); 
      if ($sil) {
        echo "<script>
        alert('Silme Başarılı')
        window.location.href='bursveren.php'
        </script>";
      }
      return $sil;
    }

    //Bursiyer sil fonksiyonu
    public function bursiyersil() {
      $silme = $_GET["id"];
      $baglan = baglan();
      $sorgu = $baglan->prepare("delete from bursiyer where id=?");
      $sil = $sorgu->execute(array($silme));
      if ($sil) {
        echo "<script>
        alert('Silme Başarılı')
        window.location.href='bursiyer.php'
        </script>";
      }
      return $sil;
    }

    //Destek ileti sil fonksiyonu
    public function iletisil() {
      $silme = $_GET["id"];
      $baglan = baglan();
      $sorgu = $baglan->prepare("delete from destek where id=?");
      $sil = $sorgu->execute(array($silme));
      if ($sil) {
        echo "<script>
        alert('Silme Başarılı')
        window.location.href='destekadmin.php'
        </script>";
      }
      return $sil;
    }

    //Burs başvuru ekle - sil fonksiyonu
    public function bursbasvuru() {
      
      //Toplam verilen burs hesabı
      $baglan = baglan();
      $sorgu = $baglan->prepare("select * from bursiyer");
      $sorgu->execute();
      $toplamburs = 0;
      while ($satir = $sorgu->fetchObject()){
          $toplamburs += $satir->burs;
      }


      //Toplam bağış hesabı - bursveren veritabanındaki bağışları topladım
      $sorgu = $baglan->prepare("select * from bursveren");
      $sorgu->execute();
      $toplambagis = 0;
      while ($satir = $sorgu->fetchObject()){
          $toplambagis += $satir->bagis;
      }


      //Basvuru kabul etme-silme
      //Başvuruyu kabul edince kabul edilen başvuruyu bursiyer veritabanına ekledim, başvuranlar veritabanından sildim
      if ($_GET["islem"] == "sil") {
        $id = $_GET["id"];
        $baglan = baglan();
        $sorgu = $baglan->prepare("delete from bursbasvuru where id=?");
        $sil = $sorgu->execute(array($id));
        if ($sil) {
          echo "<script>
          alert('Başvuru Silme Başarılı')
          window.location.href='bursbasvuru.php'
          </script>";
        }
        return $sil;
      } elseif ($_GET['islem'] == "ekle") {
          if ($toplambagis >= ($toplamburs + $_SESSION["verilecekburs"])) {
            $id = $_GET["id"];
            $baglan = baglan();
            //burs başvurusu verilerini aldım
            $sorgu = $baglan->prepare("select * from bursbasvuru where id=?");
            $sorgu->execute(array($id));
            $basvuran = $sorgu ->fetchAll();
            $ad = $basvuran[0]["ad"];
            $soyad = $basvuran[0]["soyad"];
            $telefon = $basvuran[0]["telefon"];
            $mail = $basvuran[0]["mail"];
            $verilecekburs = $_SESSION["verilecekburs"];
            //burs başvurusu verilerini bursiyer kısmına ekledim
            $sorgu = $baglan->prepare('insert into bursiyer values(?,?,?,?,?,?)');
            $ekle = $sorgu->execute(array(NULL,"$ad","$soyad","$telefon","$mail","$verilecekburs"));
            //Başvuruyu bursiyer veritabanına ekledikten sonra burs başvuruları veritabanından sildim
            $baglan = baglan();
            $sorgu = $baglan->prepare("delete from bursbasvuru where id=?");
            $sil = $sorgu->execute(array($id));
            if ($sil) {
              echo "<script>
              alert('Burs başvurusu kabul edildi')
              window.location.href='bursbasvuru.php'
              </script>";
            return $sil;
            }
        }
        else {
          echo "<script>
          alert('Bağış Miktarı Yetersiz!')
          window.location.href='bursbasvuru.php'
          </script>";
          die();
       }
     }
    }

    //Güvenlik önlemleri

    public function guvenlik($a) {
      strip_tags($a);
    }

    public function cleantel($a) {
      return str_replace(" ", "", $a);
    }


    public function cleanmail($a) {
      $a = str_replace(" ", "", $a);
      return preg_replace("/[^A-Za-z0-9\-]/", "", $a);
    }


    public function cleanString($a) {
      $utf8 = array(
        '/[Ş]/u'  => 'S',
        '/[ş]/u'  => 's',
          '/[İ]/u'  => 'I',
          '/[i]/u' => 'i',
          '/ç/' => 'c',
          '/Ç/' =>   'C',
      );
      return preg_replace(array_keys($utf8), array_values($utf8), $a);
    }

}
?>