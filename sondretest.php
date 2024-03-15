<?php

include 'connect.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the ID from the POST data
  $idToDelete = $_POST['id'];

  // Use a prepared statement to delete the record
  $stmt = $conn->prepare("DELETE FROM kunde WHERE id = ?");
  $stmt->bind_param("i", $idToDelete);

  // Execute the statement
  if ($stmt->execute()) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $stmt->error;
  }

}






?>

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
                    <td>
                      <form method="post" action="index.php">
                        <input type="hidden" name="id" value="1">
                        <button type="submit" class="slett">Slett</button>
                      </form>
                    </td>
                  </tr>
                  

                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td><button class="rediger">Rediger</button></td>
                    <td>
                      <form method="post" action="">
                        <input type="hidden" name="id" value="1">
                        <button type="submit" class="slett">Slett</button>
                      </form>
                    </td>
                  </tr>

                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td><button class="rediger">Rediger</button></td>
                    <td>
                      <form method="post" action="">
                        <input type="hidden" name="id" value="1">
                        <button type="submit" class="slett">Slett</button>
                      </form>
                    </td>
                  </tr>


            </table>
    </section>
</body>
</html>
