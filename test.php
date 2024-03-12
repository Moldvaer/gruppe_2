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
                </tr>
            </thead>
            <tbody>
                <?php
                // Sett opp tilkoblingen til databasen
                $conn = mysqli_connect("localhost", "root", "", "crm_database");

                // Sjekk tilkoblingen
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Utfør spørringen for å hente data
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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Ingen resultater funnet</td></tr>";
                }

                // Lukk tilkoblingen
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>
