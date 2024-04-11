<?php
// connessione al database
// preparazione della query
// esecuzione della query
// usare i dati

$host = 'localhost';
$db = 'pizzeria';
$user = 'root';
$pass = '';

$array = [];

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// comando che connette al database
// $pdo = new PDO("mysql:host=localhost;dbname=ifoa_pizzeria", 'root', '', $options);
$pdo = new PDO($dsn, $user, $pass, $options);

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->query('SELECT * FROM pizza');
// echo '<ul>';
// while ($row = $stmt->fetch())
// {
//     echo '<pre>' . print_r($row, true) . '</pre>';
//     echo "<li>$row[name]</li>";
// }
// echo '</ul>';


foreach ($stmt as $row) {
    $array[] = $row;
}

// //SELECT DI UNA RIGA SPECIFICA
// $id = 3;
// $id = $_GET['id'];
// // $stmt = $pdo->query("SELECT name FROM dishes WHERE id = $id"); // NON FARE MAI!!!!!!
// $stmt = $pdo->prepare("SELECT name FROM pizza WHERE id = ?");
// $stmt->execute([$id]);
// $row = $stmt->fetch(PDO::FETCH_ASSOC);
// echo "<h2>$row[name]</h2>";


// // INSERT
// $stmt = $pdo->prepare("INSERT INTO pizza (name, price) VALUES (:belnome, :ottimoprezzo)");
// $stmt->execute([
//     'belnome' => 'Pizza fatta il pomeriggio',
//     'ottimoprezzo' => 0.01,
// ]);



// // UPDATE
// $stmt = $pdo->prepare("UPDATE pizza SET name = :name  WHERE id = :id");
// $stmt->execute([
//     'id' => 16,
//     'name' => 'Pizza editata'
// ]);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1528458909336-e7a0adfed0a5?q=80&w=1948&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
        }
    </style>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Navbar</span>
            <a href="http://localhost/esercizio3/" class="btn btn-warning">Aggiungi</a>

        </div>
    </nav>
    <div class="container-fluid">

    </div>



    <h4 class="display-4 text-center">Menù</h4>
    <div class="container pt-5 d-flex gap-2 flex-wrap">
    <?php foreach ($array as $key => $row): ?>
        <div class="card" style="width: 18rem;">
            <img src="<?= $row['img'] ?>" class="card-img-top object-fit-cover" height="250rem" width="100%" alt="Immagine piatto">
            <div class="card-body">
                <h5 class="card-title"><?= $row['titolo'] ?></h5>
                <h6>Prezzo € <span class="badge text-bg-dark"><?= $row['prezzo'] ?></span></h6>
                <p class="card-text">Ingredienti: <?= $row['ingredienti'] ?></p>
                
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $key ?>">Modifica</a>
                <a href="http://localhost/esercizio3/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>

                <!-- Modal for Modifica -->
                <div class="modal fade" id="exampleModal<?= $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $key ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel<?= $key ?>">Form Modifica</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="http://localhost/esercizio3/modifica.php?id=<?= $row['id'] ?>">
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>