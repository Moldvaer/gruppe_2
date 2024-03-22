<!DOCTYPE html>
<html lang="nb">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legg til ny kontaktperson</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<a class="finereknapper" href="index.php">Hjem</a>

<?php
// Databaseoppkoblingsdetaljer
include 'connect.php';

// Hvis skjemaet er sendt, legg til kontaktpersonen i databasen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fornavn = $_POST["Fornavn"];
    $Etternavn = $_POST["Etternavn"];
    $Avdeling = $_POST["Avdeling"];
    $Telefon = $_POST["Telefon"];
    $Stiling = $_POST["Stiling"];
    $Firma_e_post = $_POST["Firma_e_post"];
    $E_post = $_POST["E_post"];

    // Forbered SQL-setning for å sette inn data
    $sql = "INSERT INTO kontaktperson (Bedrift_id, Fornavn, Etternavn, Avdeling, Telefon, Stiling, Firma_e_post, E_post) VALUES 
    ('$Fornavn', '$Etternavn', '$Avdeling', '$Telefon', '$Stiling', '$Firma_e_post', '$E_post')";

    if ($conn->query($sql) === TRUE) {
        echo "Ny kontaktperson ble lagt til!";
    } else {
        echo "Feil: " . $sql . "<br>" . $conn->error;
    }
}

// Generer ee unik Kontaktperson_id
$result = $conn->query("SELECT MAX(Kontakt_id) AS max_id FROM Kontaktperson");
$row = $result->fetch_assoc();
$next_id = $row["max_id"] + 1;

// Lukk tilkoblingen til databasen
$conn->close();
?>

<h2>Legg til ny kontaktperson</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Fornavn: <input type="text" name="Fornavn" required><br>
    Etternavn: <input type="text" name="Etternavn" required><br>
    Avdeling: <input type="text" name="Avdeling" required><br>
    Telefon: <input type="text" name="Telefon" required><br>
    Stilling: <input type="text" name="Stiling" required><br>
    Firma E-post: <input type="text" name="Firma_e_post" required><br>
    E-post: <input type="email" name="E_post" required><br>
    <input type="submit" value="Legg til Kontakt">
    <input
