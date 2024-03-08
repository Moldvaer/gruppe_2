<?php
include 'connect.php';
// SQL-spørring for å hente ut informasjon
$sql = "SELECT * FROM crm_database";
$resultat = $conn->query($sql);

// Sjekk om det er resultater
if ($resultat->num_rows > 0) {
    // Gjennomgå resultater og skriv ut informasjon
    while($rad = $resultat->fetch_assoc()) {
        echo "Navn: " . $rad["navn"]. " - E-post: " . $rad["epost"]. "<br>";
    }
} else {
    echo "Ingen resultater funnet.";
}

// Lukk forbindelse til databasen
$conn->close();
?>