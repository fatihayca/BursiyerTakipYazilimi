<?php 

include_once 'fonksiyon.php'; 
$baglan = baglan();

if ($_GET["id"] == "bursiyer") {
    $sorgu = $baglan->prepare("select * from bursiyer order by id asc");
    $sorgu->execute();

    if($sorgu->rowCount() > 0){
        $ayrac = ","; 
        $dosyaadi = "Bursiyer " . ".csv"; 

        $file = fopen('php://memory', 'w'); 

        $baslik = array('ID','AD','SOYAD','TELEFON','MAIL','BURS'); 
        fputcsv($file, $baslik, $ayrac); 

            while($satir = $sorgu->fetchObject()){ 
                 $lineData = array($satir->id, $satir->ad, $satir->soyad, $satir->telefon, $satir->mail, $satir->burs); 

        fputcsv($file, $lineData, $ayrac);
    }

    fseek($file, 0);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $dosyaadi . '";');

    fpassthru($file);
    }else {
        echo "<script>
        alert('İndirilebilecek Veri Yok!');
        window.location.href='bursiyer.php'
        </script>";
    }
    exit;
} elseif ($_GET["id"] == "bursveren") {
    $sorgu = $baglan->prepare("select * from bursveren order by id asc");
    $sorgu->execute();

    if($sorgu->rowCount() > 0){
        $ayrac = ","; 
        $dosyaadi = "Burs Veren Veri " . ".csv"; 

        $file = fopen('php://memory', 'w'); 

        $baslik = array('ID','AD','SOYAD','TELEFON','MAIL','BAĞIŞ(TL)'); 
        fputcsv($file, $baslik, $ayrac); 

            while($satir = $sorgu->fetchObject()){ 
                 $lineData = array($satir->id, $satir->ad, $satir->soyad, $satir->telefon, $satir->mail, $satir->bagis); 

        fputcsv($file, $lineData, $ayrac);
    }

    fseek($file, 0);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $dosyaadi . '";');

    fpassthru($file);
    }else {
        echo "<script>
        alert('İndirilebilecek Veri Yok!');
        window.location.href='bursveren.php'
        </script>";
    }
    exit;
} elseif ($_GET["id"] == "bursbasvuru") {
    $sorgu = $baglan->prepare("select * from bursbasvuru order by id asc");
    $sorgu->execute();

    if($sorgu->rowCount() > 0){
        $ayrac = ","; 
        $dosyaadi = "Burs Basvuru " . ".csv"; 

        $file = fopen('php://memory', 'w'); 

        $baslik = array('ID','AD','SOYAD','TELEFON','MAIL','NEDEN'); 
        fputcsv($file, $baslik, $ayrac); 

            while($satir = $sorgu->fetchObject()){ 
                 $lineData = array($satir->id, $satir->ad, $satir->soyad, $satir->telefon, $satir->mail, $satir->neden); 

        fputcsv($file, $lineData, $ayrac);
    }

    fseek($file, 0);
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $dosyaadi . '";');

    fpassthru($file);
    }else {
        echo "<script>
        alert('İndirilebilecek Veri Yok!');
        window.location.href='bursbasvuru.php'
        </script>";
    }
    exit;
}  elseif ($_GET["id"] == "destek") {
    $sorgu = $baglan->prepare("select * from destek order by id asc");
    $sorgu->execute();

    if($sorgu->rowCount() > 0){
        $ayrac = ","; 
        $dosyaadi = "Destek " . ".csv"; 

        $file = fopen('php://memory', 'w'); 

        $baslik = array('ID','AD','SOYAD','MAIL','ILETI'); 
        fputcsv($file, $baslik, $ayrac); 

            while($satir = $sorgu->fetchObject()){ 
                 $lineData = array($satir->id, $satir->ad, $satir->soyad, $satir->mail, $satir->ileti); 

        fputcsv($file, $lineData, $ayrac);
    }

    fseek($file, 0);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $dosyaadi . '";');

    fpassthru($file);
    }else {
        echo "<script>
        alert('İndirilebilecek Veri Yok!');
        window.location.href='destekadmin.php'
        </script>";
    }
    exit;
}

?>