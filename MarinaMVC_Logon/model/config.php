<?php

$host = "localhost";
$username = "root";
$password = "";
$db_name = "sailor";

$db = mysqli_connect($host, $username, $password, $db_name);
$connection_error = $db->connect_error;
if ($connection_error != null)
{
    include('../errors/db_error_connect.php');
    exit();
}
