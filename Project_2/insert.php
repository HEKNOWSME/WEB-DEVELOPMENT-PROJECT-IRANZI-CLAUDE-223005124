<?php

require_once 'config.php';

$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$connection) {
    die('Could not connect: ' . mysqli_connect_error());
}

$firstName = mysqli_real_escape_string($connection, isset($_POST['firstName']) ? $_POST['firstName'] : '');
$lastName = mysqli_real_escape_string($connection, isset($_POST['lastName']) ? $_POST['lastName'] : '');
$dobDay = mysqli_real_escape_string($connection, isset($_POST['dobDay']) ? $_POST['dobDay'] : '');
$dobMonth = mysqli_real_escape_string($connection, isset($_POST['dobMonth']) ? $_POST['dobMonth'] : '');
$dobYear = mysqli_real_escape_string($connection, isset($_POST['dobYear']) ? $_POST['dobYear'] : '');
$email = mysqli_real_escape_string($connection, isset($_POST['email']) ? $_POST['email'] : '');
$mobile = mysqli_real_escape_string($connection, isset($_POST['mobile']) ? $_POST['mobile'] : '');
$gender = mysqli_real_escape_string($connection, isset($_POST['gender']) ? $_POST['gender'] : '');
$address = mysqli_real_escape_string($connection, isset($_POST['address']) ? $_POST['address'] : '');
$city = mysqli_real_escape_string($connection, isset($_POST['city']) ? $_POST['city'] : '');
$pincode = mysqli_real_escape_string($connection, isset($_POST['pincode']) ? $_POST['pincode'] : '');
$state = mysqli_real_escape_string($connection, isset($_POST['state']) ? $_POST['state'] : '');
$country = mysqli_real_escape_string($connection, isset($_POST['country']) ? $_POST['country'] : '');
$otherHobby = mysqli_real_escape_string($connection, isset($_POST['otherHobby']) ? $_POST['otherHobby'] : '');
$course = mysqli_real_escape_string($connection, isset($_POST['course']) ? $_POST['course'] : '');
$board1 = mysqli_real_escape_string($connection, isset($_POST['board1']) ? $_POST['board1'] : '');
$pct1 = mysqli_real_escape_string($connection, isset($_POST['pct1']) ? $_POST['pct1'] : '');
$year1 = mysqli_real_escape_string($connection, isset($_POST['year1']) ? $_POST['year1'] : '');
$board2 = mysqli_real_escape_string($connection, isset($_POST['board2']) ? $_POST['board2'] : '');
$pct2 = mysqli_real_escape_string($connection, isset($_POST['pct2']) ? $_POST['pct2'] : '');
$year2 = mysqli_real_escape_string($connection, isset($_POST['year2']) ? $_POST['year2'] : '');
$board3 = mysqli_real_escape_string($connection, isset($_POST['board3']) ? $_POST['board3'] : '');
$pct3 = mysqli_real_escape_string($connection, isset($_POST['pct3']) ? $_POST['pct3'] : '');
$year3 = mysqli_real_escape_string($connection, isset($_POST['year3']) ? $_POST['year3'] : '');
$board4 = mysqli_real_escape_string($connection, isset($_POST['board4']) ? $_POST['board4'] : '');
$pct4 = mysqli_real_escape_string($connection, isset($_POST['pct4']) ? $_POST['pct4'] : '');
$year4 = mysqli_real_escape_string($connection, isset($_POST['year4']) ? $_POST['year4'] : '');

$dob = $dobYear . '-' . str_pad($dobMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($dobDay, 2, '0', STR_PAD_LEFT);
$hobbies = isset($_POST['hobbies']) ? implode(', ', $_POST['hobbies']) : '';
$hobbies = mysqli_real_escape_string($connection, $hobbies);

$sql = "INSERT INTO student_registrations
(first_name, last_name, date_of_birth, email, mobile_number, gender, address, city, pin_code, state, country, hobbies, other_hobby, board1, pct1, year1, board2, pct2, year2, board3, pct3, year3, board4, pct4, year4, course)
VALUES
('$firstName', '$lastName', '$dob', '$email', '$mobile', '$gender', '$address', '$city', '$pincode', '$state', '$country', '$hobbies', '$otherHobby', '$board1', '$pct1', '$year1', '$board2', '$pct2', '$year2', '$board3', '$pct3', '$year3', '$board4', '$pct4', '$year4', '$course')";

if (!mysqli_query($connection, $sql)) {
    die('Error: ' . mysqli_error($connection));
}

echo '1 record added';

mysqli_close($connection);
