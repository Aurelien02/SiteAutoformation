<?php
$hostname = 'host=localhost';
$username = 'root';
$password = '';
$bdd = 'biblio';

try {
    $monPdo = new PDO("mysql:$hostname;dbname=$bdd;charset=utf8", $username, $password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    $monPdo = null;
}
?>