<?php
session_start();

$toplamalinanbagis = $_POST["toplamalinanbagis"];

$toplamverilenburs = $_POST["toplamverilenburs"];

$hesap = $toplamalinanbagis - $toplamverilenburs;

echo "$hesap TL";
?>