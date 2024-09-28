<?php
// Handle registration form submission

include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    // Insert user into the database
    $query = $db->prepare("INSERT INTO users (email, password, coins) VALUES (:email, :password, 0)");
    $query->execute(['email' => $email, 'password' => $password]);

    header('Location: login.php');
}
?>
<form method="post" action="">
    <h2>Register</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
