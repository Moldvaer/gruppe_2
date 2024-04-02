<?php

// Denne filen inneholder databasetilkoblingsinformasjonen som brukes i de andre filene i prosjektet.
// Den kobler til databasen og oppretter en forbindelse som kan brukes i de andre filene.

//Parametere til databaseserver 
$host = 'localhost';
$brukernavn = 'im22syv0909';
$passord = 'R&4cc717k';
$database = 'db_im22syv0909';

//Lag en forbindelses-streng
$conn = mysqli_connect($host, $brukernavn, $passord, $database);

//Sjekk forbindelsen
if(!$conn) 
    {
    die("Feil med oppkobling" . mysqli_connect_error());
    }


   

