<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM system</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <section id="overskrift">
        <h1>CRM system</h1>
    </section>    

    <section class="underskrift"> <!--legger til bedrifter-->
        <button class="finereknapper">legg til bedrift</button>
    </section>

    <section class="underskrift"> <!--Bredriften-->
        <button class="finereknapper">legg til person</button> <!--Legger til person-->
        <table id="tabell">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Navn</th>
                    <th>Telefon</th>
                    <th>E-post</th>
                    <th>Handlinger</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'connect.php';
                // SQL-spørring for å hente ut informasjon
                $sql = "SELECT * FROM kunde";
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
                        echo "<td>" . $row['Bedrift_id'] . "</td>";
                        echo "<td>" . $row['Navn'] . "</td>";
                        echo "<td>" . $row['Telefon'] . "</td>";
                        echo "<td>" . $row['E_post'] . "</td>";
                        echo "<td>";
                        echo "<form action='slett.php' method='post'>";
                        echo "<input type='hidden' name='Bedrift_id' value='" . $row['Bedrift_id'] . "'>";
                        echo "<button type='submit' onclick=\"return confirm('Er du sikker på at du vil slette denne personen?')\">Slett</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Ingen resultater funnet</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </section>
</body>
</html>
