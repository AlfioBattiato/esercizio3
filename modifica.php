<?php

$host = 'localhost';
$db = 'pizzeria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

$titolo = $_POST['Titolo'];
$prezzo = $_POST['Prezzo'];
$ingredienti = $_POST['Ingredienti'];
$immagine = $_POST['Immagine'];

$myid= $_GET["id"];

//UPDATE
$stmt = $pdo->prepare("UPDATE pizza SET titolo = :titolo  WHERE id = :id");
$stmt->execute([
    'id' => $myid,
    'titolo' => $titolo
]);
header('Location: pizzelist.php');