<?php
include 'includes/session.php';

$user = $_SESSION['user'];
$ad_id = $_GET['ad_id'];

// Update user's coin balance
$db->prepare("UPDATE users SET coins = coins + 10 WHERE id = :id")
   ->execute(['id' => $user['id']]);

header('Location: pages/dashboard.php');
?>
