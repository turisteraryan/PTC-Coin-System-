<?php
include '../includes/session.php';

$user = $_SESSION['user'];
if ($user['coins'] < 50) {
    echo "You need at least 50 coins to create an ad.";
    exit;
}

// Form to create ad
?>
<form method="post" action="">
    <h2>Create Ad</h2>
    <input type="url" name="url" placeholder="Website URL" required>
    <button type="submit">Create Ad</button>
</form>
