<?php
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'mcvshop';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
