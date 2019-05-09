<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
$pdo = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi380279', 'dbi380279', 'E8[Z\Aq99kQR-/^{');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>