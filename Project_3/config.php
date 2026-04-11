<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'hotel_portal';

function getDbConnection()
{
    global $dbHost, $dbUser, $dbPass, $dbName;

    $connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$connection) {
        die('Database connection failed: ' . mysqli_connect_error());
    }

    mysqli_set_charset($connection, 'utf8mb4');

    return $connection;
}
