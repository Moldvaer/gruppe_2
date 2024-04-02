<!DOCTYPE html>
<html lang="nb">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legg til ny bedrift</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<a class="finereknapper"href="index.php">Hjem</a>

</body>
    <?php
    // Databaseoppkoblingsdetaljer
    include 'connect.php';

    // Hvis skjemaet er sendt, legg til kunden i databasen
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $navn = $_POST["navn"];
        $telefon = $_POST["telefon"];
        $e_post = $_POST["e_post"];

        // Forbered SQL-setning for å sette inn data
        $sql = "INSERT INTO kunde (Navn, Telefon, E_post) VALUES ('$navn', '$telefon', '$e_post')";

        if ($conn->query($sql) === TRUE) {
            echo "Ny kunde ble lagt til!";
            header("refresh:2; url=index.php");
        } else {
            echo "Feil: " . $sql . "<br>" . $conn->error;
        }
    }

    // Generer en unik Bedrift_id
    $result = $conn->query("SELECT MAX(Bedrift_id) AS max_id FROM kunde");
    $row = $result->fetch_assoc();
    $next_id = $row["max_id"] + 1;

    // Lukk tilkoblingen til databasen
    $conn->close();
    ?>

    <h2>Legg til ny kunde</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Navn: <input type="text" name="navn" required><br>
        Telefon: <input type="text" name="telefon" required><br>
        E-post: <input type="email" name="e_post" required><br>
        <input type="submit" value="Legg til kunde">
    </form>
</body>
</html>
