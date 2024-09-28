<?php
// Handle login form submission, check credentials from the database

session_start();
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $query = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $query->execute(['email' => $email, 'password' => md5($password)]);
    
    if ($query->rowCount() > 0) {
        $_SESSION['user'] = $query->fetch();
        header('Location: dashboard.php');
    } else {
        $error = "Invalid login credentials!";
    }
}
?>
<form method="post" action="">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>
