<?php

$login = 'nomera';
$pwd = '1474147';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=nomera', $login, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    $error = 'Couldn\'t connect: ' . $e->getMessage();
    include '../error.html.php';
    exit();
}
/**
 * Created by PhpStorm.
 * User: Borm
 * Date: 24.09.2015
 * Time: 23:48
 */