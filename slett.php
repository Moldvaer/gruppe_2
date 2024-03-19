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
<?php
include 'connect.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idToDelete = $_POST['Bedrift_id'];

    
    $stmt = $conn->prepare("DELETE FROM kunde WHERE Bedrift_id = ?");
    $stmt->bind_param("i", $idToDelete);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
?>
