<?php

//Henter forbindelses-streng
include 'connect.php';

//Prosedyre for lese
$sql_les = "SELECT Bedrift_id, Navn, Telefon, E_post  FROM Kunde ";
$sql_les = "SELECT Kontakt_id, Bedrift_id, fornavn, Etternavn, Avdeling, Telefon,Firma_e_post, E_post  FROM Kontaktperson";

$result_les = mysqli_query($conn, $sql_les);
$ansatte = mysqli_fetch_all($result_les, MYSQLI_ASSOC);

mysqli_free_result($result_les);    
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Ansatte</title>
</head>
<body>

    <header>
        <p>VIS ANSATTE<br></p>
    </header>
    <main>    
        <table>
            <thead>
                <tr>
                    <th>Bedrift</th>
                    <th>Telefon</th>
                    <th>Mail</th>
                    <th colspan="2">Handlinger</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ansatte as $person) { ?>
                <tr>
                    <td><?php echo $person['Navn']; ?></td>    
                    <td><?php echo $person['Telefon']; ?></td>
                    <td><?php echo $person['E_post']; ?></td>                            
                    <td>
                        <form action="slett.php" method="post">
                        <input type="hidden" name="Bedrift_id" value="<?php echo $person['Bedrift_id']; ?>">
                        <button type="submit" onclick="return confirm('Er du sikker på at du vil slette denne personen?')">Slett</button>
                        </form>
                    </td>
                    <td>
                        <form action="rediger.php" method="post">
                        <input type="hidden" name="Bedrift_id" value="<?php echo $person['Bedrift_id']; ?>">
                        <button type="submit">Rediger</button>
                    </form>
                    </form>
                    </td>
                    <td>
                        <form action="Kontaktperson.php" method="post">
                        <input type="hidden" name="Bedrift_id" value="<?php echo $person['Bedrift_id']; ?>">
                        <button type="submit">Kontaktperson</button>
                    </form>
                </td>   
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>

   
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
                  <tr>
                    <th>ID</th>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
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