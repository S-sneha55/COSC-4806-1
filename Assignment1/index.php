<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$date = date("F j, Y, g:i a");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Assignment 1</h1>
    <h2>Welcome, <?= htmlspecialchars($username) ?>!</h2>
    <p>Current Date and Time: <?= $date ?></p>

    <!-- Logout Button -->
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>