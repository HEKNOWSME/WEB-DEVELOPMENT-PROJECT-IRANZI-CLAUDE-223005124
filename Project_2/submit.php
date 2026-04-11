<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?status=invalid_request');
    exit;
}

function getPostValue($key)
{
    return isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

$firstName = getPostValue('firstName');
$lastName = getPostValue('lastName');
$dobDay = getPostValue('dobDay');
$dobMonth = getPostValue('dobMonth');
$dobYear = getPostValue('dobYear');
$email = getPostValue('email');
$mobile = getPostValue('mobile');
$gender = getPostValue('gender');
$address = getPostValue('address');
$city = getPostValue('city');
$pincode = getPostValue('pincode');
$state = getPostValue('state');
$country = getPostValue('country');
$otherHobby = getPostValue('otherHobby');
$course = getPostValue('course');

$board1 = getPostValue('board1');
$pct1 = getPostValue('pct1');
$year1 = getPostValue('year1');
$board2 = getPostValue('board2');
$pct2 = getPostValue('pct2');
$year2 = getPostValue('year2');
$board3 = getPostValue('board3');
$pct3 = getPostValue('pct3');
$year3 = getPostValue('year3');
$board4 = getPostValue('board4');
$pct4 = getPostValue('pct4');
$year4 = getPostValue('year4');

$requiredFields = array($firstName, $lastName, $dobDay, $dobMonth, $dobYear, $email, $mobile, $gender, $country, $course);
foreach ($requiredFields as $value) {
    if ($value === '') {
        header('Location: index.php?status=missing_fields');
        exit;
    }
}

if (!checkdate((int) $dobMonth, (int) $dobDay, (int) $dobYear)) {
    header('Location: index.php?status=invalid_dob');
    exit;
}

$dob = sprintf('%04d-%02d-%02d', (int) $dobYear, (int) $dobMonth, (int) $dobDay);
$hobbies = isset($_POST['hobbies']) && is_array($_POST['hobbies']) ? implode(', ', $_POST['hobbies']) : '';

$connection = getDbConnection();
if (!$connection) {
    header('Location: index.php?status=db_error');
    exit;
}

$sql = 'INSERT INTO student_registrations
(first_name, last_name, date_of_birth, email, mobile_number, gender, address, city, pin_code, state, country, hobbies, other_hobby, board1, pct1, year1, board2, pct2, year2, board3, pct3, year3, board4, pct4, year4, course)
VALUES
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

$stmt = mysqli_prepare($connection, $sql);
if (!$stmt) {
    mysqli_close($connection);
    header('Location: index.php?status=db_error');
    exit;
}

mysqli_stmt_bind_param(
    $stmt,
    'ssssssssssssssssssssssssss',
    $firstName,
    $lastName,
    $dob,
    $email,
    $mobile,
    $gender,
    $address,
    $city,
    $pincode,
    $state,
    $country,
    $hobbies,
    $otherHobby,
    $board1,
    $pct1,
    $year1,
    $board2,
    $pct2,
    $year2,
    $board3,
    $pct3,
    $year3,
    $board4,
    $pct4,
    $year4,
    $course
);

$saved = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($connection);

if (!$saved) {
    header('Location: index.php?status=db_error');
    exit;
}

header('Location: index.php?status=success');
exit;