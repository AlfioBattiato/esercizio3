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

// INSERT
$stmt = $pdo->prepare("INSERT INTO pizza (titolo, prezzo, ingredienti, img) VALUES (:titolo, :prezzo, :ingredienti, :img)");
$stmt->execute([
    'titolo' => $titolo,
    'prezzo' => $prezzo,
    'ingredienti' => $ingredienti,
    'img' => $immagine
]);
header('Location: pizzelist.php');