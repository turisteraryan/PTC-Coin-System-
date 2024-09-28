<?php
include '../includes/session.php';

// Fetch ad URL from database and start countdown
$ad_url = "https://example.com"; // Get from DB

?>

<div id="timer">10</div>
<iframe src="<?php echo $ad_url; ?>" width="100%" height="500px"></iframe>

<script>
let countdown = 10;
let timer = document.getElementById('timer');
let interval = setInterval(() => {
    countdown--;
    timer.innerText = countdown;
    if (countdown === 0) {
        clearInterval(interval);
        window.location.href = "earn_coins.php?ad_id=123"; // Credit coins after viewing
    }
}, 1000);
</script>
