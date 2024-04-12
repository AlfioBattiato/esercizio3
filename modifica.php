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
$myid = $_GET["id"];

//UPDATE
$stmt = $pdo->prepare("UPDATE pizza SET titolo = :titolo, prezzo = :prezzo, ingredienti = :ingredienti, img = :immagine WHERE id = :id");
$stmt->execute([
    'id' => $myid,
    'titolo' => $titolo,
    'prezzo' => $prezzo,
    'ingredienti' => $ingredienti,
    'immagine' => $immagine
]);
header('Location: pizzelist.php');
// //SELECT DI UNA RIGA SPECIFICA
// $id = 3;
// $id = $_GET['id'];
// // $stmt = $pdo->query("SELECT name FROM dishes WHERE id = $id"); // NON FARE MAI!!!!!!
// $stmt = $pdo->prepare("SELECT name FROM pizza WHERE id = ?");
// $stmt->execute([$id]);
// $row = $stmt->fetch(PDO::FETCH_ASSOC);
// echo "<h2>$row[name]</h2>";