<!DOCTYPE html>
<html lang="nb">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opptater kontaktperson</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<a class="finereknapper"href="index.php">Hjem</a>

</body>
</html><?php
include 'connect.php';

// Sjekk om skjemainndata er mottatt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sjekk om Bedrift_id og de andre feltene er satt og ikke tomme
    if (isset($_POST['Fornavn']) && !empty($_POST['Fornavn']) &&
        isset($_POST['Etternavn']) && !empty($_POST['Etternavn']) &&
        isset($_POST['Avdeling']) && !empty($_POST['Avdeling']) &&
        isset($_POST['Telefon']) && !empty($_POST['Telefon']) &&
        isset($_POST['Stiling']) && !empty($_POST['Stiling']) &&
        isset($_POST['Firma_e_post']) && !empty($_POST['Firma_e_post']) &&
        isset($_POST['E_post']) && !empty($_POST['E_post'])) {


        // Hent skjemainndataene"
        $Fornavn = $_POST["Fornavn"];
        $Etternavn = $_POST["Etternavn"];
        $Avdeling = $_POST["Avdeling"];
        $Telefon = $_POST["Telefon"];
        $Stiling = $_POST["Stiling"];
        $Firma_e_post = $_POST["Firma_e_post"];
        $E_post = $_POST["E_post"];

        // Oppdater databasen med de nye verdiene
        $sql = "UPDATE Kontaktperson SET Fornavn='$Fornavn', Etternavn='$Etternavn', Avdeling='$Avdeling', Telefon='$Telefon', Stiling='$Stiling', Firma_e_post='$Firma_e_post', E_post='$E_post' WHERE Kontakt_id=$Kontakt_id";
        $result = mysqli_query($conn, $sql);
            
        // Sjekk om oppdateringen var vellykket
        if ($result) {
            echo "Kontaktperson med Kontakt_id $Kontakt_id ble oppdatert.";
        } else {
            echo "Feil: " . mysqli_error($conn);
        }
    } else {
        echo "Alle felt må fylles ut.";
    }
} else {
    echo "Ingen data sendt via POST-metoden.";
}
?>
