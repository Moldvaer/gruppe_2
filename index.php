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

   
    <section class="underskrift"> <!--Bredriften-->
        <button class="finereknapper">legg til BEDRIFTER</button> <!--Legger til person-->
        <table id="tabell">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bedrift</th>
                    <th>Telefon</th>
                    <th>E-post</th>
                    <th colspan="3" >Handlinger</th>
                </tr>
            </thead>
        
    </section>

    <header>
        <p>VIS BEDRIFTER <br></p>
    </header>
    <main>    
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
                        echo "<td id='handlinger'>";
                        echo "<form action='slett.php' method='post'>";
                        echo "<input type='hidden' name='Bedrift_id' value='" . $row['Bedrift_id'] . "'>";
                        echo "<button type='submit' onclick=\"return confirm('Er du sikker på at du vil slette denne personen?')\">Slett</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form action='kontaktperson.php' method='post'>";
                        echo "<input type='hidden' name='Bedrift_id' value='" . $row['Bedrift_id'] . "'>";
                        echo "<button type='submit'>Kontaktperson</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form action='rediger.php' method='post'>";
                        echo "<input type='hidden' name='Bedrift_id' value='" . $row['Bedrift_id'] . "'>";
                        echo "<button type='submit'>Rediger</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Ingen resultater funnet</td></tr>";
                }
?>
                        <form action="slett.php" method="post">
                        <input type="hidden" name="Kontakt_id" value="<?php echo $person['Kontakt_id']; ?>">
                        </form>
                    </td>
                    <td>
                        <form action="rediger.php" method="post">
                        <input type="hidden" name="Kontakt_id" value="<?php echo $person['Kontakt_id']; ?>">
                    </form>
                    </form>
                    </td>
                    <td>
                        <form action="Kontaktperson.php" method="post">
                        <input type="hidden" name="Bedrift_id" value="<?php echo $person['Bedrift_id']; ?>">
                    </form>
                </td>   
                </tr>
               
            </tbody>
        </table>
    </main>
</body>
</html>
