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
$array[]=$row;
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
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Navbar</span>
            <a href="http://localhost/esercizio3/" class="btn btn-warning">Home</a>

        </div>
    </nav>
    <div class="container-fluid">

    </div>



    <h4 class="display-4 text-center">Menù</h4>
    <div class="container pt-5 d-flex gap-2 flex-wrap">

        <?php

        foreach ($array as $row) {
            echo "<div class=card style='width: 18rem';>";
            echo "   <img src='" . $row['img'] . "' class='card-img-top object-fit-cover' height='250rem' width='100%' alt='Immagine piatto'>";
            echo "   <div class='card-body'>";
            echo "      <h5 class='card-title'> " . $row['titolo'] . " </h5>";
            echo "      <h6>Prezzo € <span class='badge text-bg-dark'>".$row['prezzo']."</span></h6> ";


            echo "      <p class='card-text'>Ingredienti: $row[ingredienti].</p>";

            echo "      <a href=# class='btn btn-primary'>Modifica</a>";
            echo "      <a href=http://localhost/esercizio3/delete.php?id=$row[id] class='btn btn-danger'>Elimina </a>";
            echo "   </div>";
            echo "</div>";
        };
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>