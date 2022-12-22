<?php
//Session silerek çıkış sağladım
session_start();
session_destroy();
header('Location: index.php');
?>