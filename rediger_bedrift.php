<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger Bedrift</title>
    <link rel="stylesheet" href="css.css">

</head>
<body>
    <?php
    include 'connect.php';

    // Sjekk om Bedrift_id er satt og er gyldig
    if (isset($_POST['Bedrift_id']) && !empty($_POST['Bedrift_id'])) {
        $selected_bedrift_id = $_POST['Bedrift_id'];

        // Hent gjeldende verdier for bedriften
        $sql = "SELECT * FROM kunde WHERE Bedrift_id = $selected_bedrift_id";
        $result = mysqli_query($conn, $sql);

        // Sjekk om spørringen ble utført vellykket
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Sjekk om det er rader returnert
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <h2>Rediger Bedrift</h2>
            <form action="opptater.php" method="post">
                <input type="hidden" name="Bedrift_id" value="<?php echo $row['Bedrift_id']; ?>">
                <label for="Navn">Navn:</label><br>
                <input type="text" id="Navn" name="Navn" value="<?php echo $row['Navn']; ?>"><br>
                <label for="Telefon">Telefon:</label><br>
                <input type="text" id="Telefon" name="Telefon" value="<?php echo $row['Telefon']; ?>"><br>
                <label for="E_post">E-post:</label><br>
                <input type="text" id="E_post" name="E_post" value="<?php echo $row['E_post']; ?>"><br><br>
                <input type="submit" value="Oppdater">
            </form>
            <?php
        } else {
            echo "Ingen bedrift funnet med Bedrift_id: " . $selected_bedrift_id;
        }
    } else {
        echo "Bedrift_id er ikke satt.";
    }
    ?>
</body>
</html>
