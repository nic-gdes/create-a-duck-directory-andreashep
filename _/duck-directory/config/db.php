<?php

//create connection to db with mysqli_connect
$conn = mysqli_connect("db:3306", "db", "db", "db");
// $conn = msqli_connect("hostname", "username", "password", "database name")

//Verify connection with mysqli_connect_errno and my_sqli_connect_error

if (mysqli_connect_errno()) {
    echo "Database Error: " . mysqli_connect_error();
    exit();
}

?>