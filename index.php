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

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prendi i dati dal form
        $titolo = $_POST['Titolo'];
        $prezzo = $_POST['Prezzo'];
        $ingredienti = $_POST['Ingredienti'];
        $immagine = $_POST['Immagine'];

        // Prepara la query di inserimento
        $stmt = $pdo->prepare("INSERT INTO pizza (titolo, prezzo, ingredienti, img) VALUES (:titolo, :prezzo, :ingredienti, :immagine)");

        // Esegui la query di inserimento
        $stmt->execute([
            'titolo' => $titolo,
            'prezzo' => $prezzo,
            'ingredienti' => $ingredienti,
            'immagine' => $immagine
        ]);

        // Messaggio di successo
        echo "Pizza inserita con successo nel database!";
    }
} catch (PDOException $e) {
    // Gestione degli errori del database
    echo "Errore nel database: " . $e->getMessage();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Navbar</span>
            <a href="http://localhost/esercizio3/pizzelist.php" class="btn btn-warning">Menu</a>

        </div>
    </nav>

    <!-- form -->
    <div class="container pt-5">
        <form method="post" action="">
            <div class="mb-3">
                <label for="Titolo" class="form-label">Titolo</label>
                <input type="text" name="Titolo" class="form-control" id="Titolo">
            </div>
            <div class="mb-3">
                <label for="Prezzo" class="form-label">Prezzo</label>
                <input type="number" name="Prezzo" class="form-control" id="Prezzo">
            </div>
            <div class="mb-3">
                <label for="Ingredienti" class="form-label">Ingredienti</label>
                <input type="text" name="Ingredienti" class="form-control" id="Ingredienti">
            </div>
            <div class="mb-3">
                <label for="Immagine" class="form-label">Immagine</label>
                <input type="text" name="Immagine" class="form-control" id="Immagine">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="http://localhost/esercizio3/pizzelist.php" class="btn btn-warning">Vedi utenti</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
