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
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th>Rediger</th>
                    <th>Slett</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </section>

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



            
            <?php
                include 'connect.php';
                // SQL-spørring for å hente ut informasjon
                $sql = "SELECT * FROM Kontaktperson ";
                $resultat = $conn->query($sql);?>
                <?php foreach($ansatte as $person) ?>
                <tr>
                    <td><?php echo $person['Navn']; ?></td>    
                    <td><?php echo $person['Telefon']; ?></td>
                    <td><?php echo $person['E_post']; ?></td>                            
                    <td>
                        <form action="slett.php" method="post">
                        <input type="hidden" name="Kontakt_id" value="<?php echo $person['Kontakt_id']; ?>">
                        <button type="submit" onclick="return confirm('Er du sikker på at du vil slette denne personen?')">Slett</button>
                        </form>
                    </td>
                    <td>
                        <form action="rediger.php" method="post">
                        <input type="hidden" name="Kontakt_id" value="<?php echo $person['Kontakt_id']; ?>">
                        <button type="submit">Rediger</button>
                    </form>
                    </form>
                    </td>
                    <td>
                        <form action="Kontaktperson.php" method="post">
                        <input type="hidden" name="Kontakt_id" value="<?php echo $person['Kontakt_id']; ?>">
                        <button type="submit">Kontaktperson</button>
                    </form>
                </td>   
                </tr>
               
            </tbody>
        </table>
    </main>
</body>
</html>
