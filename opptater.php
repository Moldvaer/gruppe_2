<!DOCTYPE html>
<html lang="nb">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opptater</title>
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
    if (isset($_POST['Bedrift_id']) && !empty($_POST['Bedrift_id']) &&
        isset($_POST['Navn']) && !empty($_POST['Navn']) &&
        isset($_POST['Telefon']) && !empty($_POST['Telefon']) &&
        isset($_POST['E_post']) && !empty($_POST['E_post'])) {
        
        // Hent skjemainndataene
        $bedrift_id = $_POST['Bedrift_id'];
        $navn = $_POST['Navn'];
        $telefon = $_POST['Telefon'];
        $e_post = $_POST['E_post'];

        // Oppdater databasen med de nye verdiene
        $sql = "UPDATE kunde SET Navn='$navn', Telefon='$telefon', E_post='$e_post' WHERE Bedrift_id=$bedrift_id";
        $result = mysqli_query($conn, $sql);
            
        // Sjekk om oppdateringen var vellykket
        if ($result) {
            echo "Bedrift med Bedrift_id $bedrift_id ble oppdatert.";
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
