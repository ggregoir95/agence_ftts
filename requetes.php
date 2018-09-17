<?php
/**
 * Created by PhpStorm.
 * User: ggregoir
 * Date: 2018-09-12
 * Time: 08:13
 */

$servername = "localhost";
$username = "ggregoir";
$password = "abc123";
$dbname = "dbftts";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
$selectDestinations = "SELECT * FROM destinations";
$selectCategs = "SELECT * FROM categorie";
$selectUsers = "SELECT * FROM user";

//$result = $conn->query($sql);
