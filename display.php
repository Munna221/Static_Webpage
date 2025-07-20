<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "munna";

$con = mysqli_connect($host, $username, $password, $database);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name, email FROM users";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f8e9;
            padding: 20px;
        }
        table {
            width: 60%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background: #4caf50;
            color: white;
        }
        h2 {
            text-align: center;
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No users found.</td></tr>";
        }

        mysqli_close($con);
        ?>
    </table>
</body>
</html>
