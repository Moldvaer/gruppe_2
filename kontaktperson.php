<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktpersoner</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <section id="overskrift">
        <h1>Kontaktpersoner</h1>
    </section>    

    <section class="underskrift"> <!-- Kontaktpersoner -->
        <a class="finereknapper" href="legg_til_kontakperson.php">Legg til KONTAKTPERSON</a> <!-- Legger til kontaktperson -->
        <table id="tabell">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th>Avdeling</th>
                    <th>Stilling</th>
                    <th>Telefon</th>
                    <th>Firma e-post</th>
                    <th>E-post</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';

                // Sjekk om Bedrift_id er satt
                if (isset($_POST['Bedrift_id'])) {
                    $selected_bedrift_id = $_POST['Bedrift_id'];

                    // SQL-spørring for å hente ut kontaktpersoner for den valgte bedriften
                    $sql = "SELECT * FROM kontaktperson WHERE Bedrift_id = $selected_bedrift_id";
                    $result = mysqli_query($conn, $sql);

                    // Sjekk om spørringen ble utført vellykket
                    if (!$result) {
                        die("Query failed: " . mysqli_error($conn));
                    }

                    // Sjekk om det er rader returnert
                    if (mysqli_num_rows($result) > 0) {
                        // Iterer gjennom resultatene og vis dem i tabellen
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['Kontakt_id'] . "</td>";
                            echo "<td>" . $row['Fornavn'] . "</td>";
                            echo "<td>" . $row['Etternavn'] . "</td>";
                            echo "<td>" . $row['Avdeling'] . "</td>";
                            echo "<td>" . $row['Stiling'] . "</td>";
                            echo "<td>" . $row['Telefon'] . "</td>";
                            echo "<td>" . $row['Firma_e_post'] . "</td>";
                            echo "<td>" . $row['E_post'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Ingen kontaktpersoner funnet for valgt bedrift.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Ingen bedrift valgt.</td></tr>";
                }
                    

                




                ?>
            </tbody>
        </table>
    </section>
</body>
</html>
