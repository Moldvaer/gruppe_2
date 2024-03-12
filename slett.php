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

    <section class="underskrift"> <!--Bredrifen-->
        <button class="finereknapper">legg til bedrift</button> <!--Legger til person-->
            <table id="tabell">
                  <tr>
                    <th>bedrift</th>
                    <th>Telefon</th>
                    <th>Mail</th>
                    <th>Rediger</th>
                    <th>Slett</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td><button class="rediger">Rediger</button></td>
                    <td><button class="slett">Slett</button></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td><button class="rediger">Rediger</button></td>
                    <td><button class="slett">Slett</button></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td><button class="rediger">Rediger</button></td>
                    <td><button class="slett">Slett</button></td>
                  </tr>
            </table>
    </section>
</body>
</html>



<?php
include 'connect.php';


// sql to delete a record
$sql = "DELETE FROM kunde WHERE id=3";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

?>




<!--
// Henter forbindelses-streng
include 'connect.php';

// Sjekk om skjemaet er sendt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Hent personens ansattnummer fra skjemaet
  $anr_to_slett = mysqli_real_escape_string($conn, $_POST['anr']);

  // SQL-spørring for å slette personen
  $sql_slett = "DELETE FROM person WHERE anr = '$anr_to_slett'";

  // Utfør sletteoperasjonen
  if (mysqli_query($conn, $sql_slett)) {
    echo "Personen er slettet.<br>";
    echo "<a href='index.php'>Tilbake</a><br>";
  } else {
    echo "Feil ved sletting av person: " . mysqli_error($conn);
  }
}

// Lukk databaseforbindelsen
mysqli_close($conn);