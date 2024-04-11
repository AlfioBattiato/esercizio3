<?php
// connessione al database
// preparazione della query
// esecuzione della query
// usare i dati

$host = 'localhost';
$db = 'pizzeria';
$user = 'root';
$pass = '';
$array=[];

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// comando che connette al database
$pdo = new PDO($dsn, $user, $pass, $options);

$myid= $_GET["id"];

// DELETE
$stmt = $pdo->prepare("DELETE FROM pizza WHERE id = ?");
$stmt->execute([$myid]);
header('Location: pizzelist.php');