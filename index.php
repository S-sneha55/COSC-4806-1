<?php
session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$date = date("F j, Y, g:i a");
?>

<!DOCTYPE html>
<html>
<head><title>Welcome</title></head>
<body>
    <h2>Welcome, <?= htmlspecialchars($username) ?>!</h2>
    <p>Current Date and Time: <?= $date ?></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>