<?php
session_start();

$valid_username = "admin";
$valid_password = "password";

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['attempts'] = 0;
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['attempts'] = ($_SESSION['attempts'] ?? 0) + 1;
        $error = "Invalid username or password. Attempt #{$_SESSION['attempts']}";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>