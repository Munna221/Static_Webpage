<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "munna"; 

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die(" Connection failed" );
}

$name = $_POST['un'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];

if ($pass !== $cpass) {
    echo " Passwords do not match!";
    exit();
}

$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

$query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_pass);

if (mysqli_stmt_execute($stmt)) {
    echo " Registration successful!";
    echo "<br><a href='index.html'>Go back</a>";
} else {
    echo " Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>
