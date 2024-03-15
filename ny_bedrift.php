<!DOCTYPE html>
<html>
<head>
    <title>Legg til ny kunde</title>
</head>
<body>
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
        } else {
            echo "Feil: " . $sql . "<br>" . $conn->error;
        }
    }

    // Generer et unikt Bedrift_id
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
