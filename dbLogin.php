<?php
// Připojení k databázi - Upravte připojení dle potřeby
$servername = "localhost";
$username = "knihovnik";
$password = "1234";
$dbname = "knihovna";

// Připojení k databázi
$conn = new mysqli($servername, $username, $password, $dbname);