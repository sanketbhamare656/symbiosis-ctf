<?php
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login1.php');
    exit;
}

// Always set the initial balance to 90 billion on every page load
$initialBalance = 90000000000; // Fixed initial balance
$deductedAmount = 0; // Initialize deducted amount for this request
$flag = "FLAG{H1ghStakes_BTC_H3ist_2024}";
$berlinWallet = '007BerlinBTCAddress5tXy9zA1dA3FkN'; // Dummy Berlin wallet address
$transferSuccess = false;
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['wallet']) && isset($_POST['amount'])) {
        $wallet = $_POST['wallet'];
        $amount = $_POST['amount'];

        // Remove commas from the amount
        $amount = str_replace(',', '', $amount);

        // Convert to float
        $amount = (float)$amount;

        if ($wallet === $berlinWallet) {
            // Check if the amount is positive
            if ($amount > 0) {
                $deductedAmount = $amount; // Amount deducted for this transfer
                $transferSuccess = true;
            } else {
                $error = "Invalid amount!";
            }
        } else {
            $error = "Invalid wallet address. Transfer to Berlin's BTC wallet!";
        }
    } else {
        $error = "Both wallet address and amount are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin Transfer Challenge</title>
    <style>
        body {
            background: linear-gradient(135deg, 
                rgba(0, 0, 0, 0.8), /* Dark black */
                rgba(50, 50, 50, 0.8), /* Dark grey */
                rgba(255, 0, 0, 0.8), /* Dark red */
                rgba(0, 255, 0, 0.8), /* Dark green */
                rgba(0, 0, 255, 0.8), /* Dark blue */
                rgba(75, 0, 130, 0.8) /* Dark indigo */
            );
            background-size: 600% 600%;
            animation: gradientAnimation 20s ease infinite;
            color: #e0e0e0;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }
        .container {
            background-color: #222;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 700px;
        }
        h1 {
            color: #4caf50;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .circle-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            border: 2px solid #4caf50;
        }
        .circle-image img {
            width: 100%;
            height: auto;
        }
        .typing-animation {
            font-family: 'Courier New', Courier, monospace;
            color: #e0e0e0;
            font-size: 1.2em;
            white-space: nowrap;
            overflow: hidden;
            border-right: .15em solid #4caf50;
            animation: typing 3.5s steps(40, end), blink .75s step-end infinite;
        }
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink {
            50% { border-color: transparent; }
        }
        input {
            padding: 10px;
            margin: 10px;
            width: calc(80% - 22px); /* Adjust width to account for padding and margins */
            border: none;
            border-radius: 5px;
            font-size: 1em;
            background-color: #333;
            color: #fff;
        }
        .submit {
            background-color: #d32f2f;
            color: white;
            cursor: pointer;
            font-size: 1em;
        }
        .submit:hover {
            background-color: #c62828;
        }
        .success {
            color: #4caf50;
            font-weight: bold;
            margin-top: 20px;
        }
        .error {
            color: #ff4444;
        }
        .flag {
            display: none; /* Hide the flag from view source */
            color: #fff;
            margin-top: 20px;
        }
        .balance {
            color: #ffeb3b;
            font-size: 1.2em;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Audio element (muted by default) -->
    <audio id="bg-audio" src="https://www.pagalworld.com.so/files/download/type/320/id/3561" preload="auto" autoplay loop></audio>

    <div class="container">
        <div class="header">
            <div class="circle-image">
                <img src="professor.jpg" alt="Professor">
            </div>
            <div class="typing-animation">
                Transfer BTC ₿ to Berlin's Wallet 🏦
                <p>007BerlinBTCAddress5tXy9zA1dA3FkN</p>
            </div>
        </div>

        <!-- Always display the initial balance -->
        <p class="balance">Initial Balance: $<?php echo number_format($initialBalance, 2); ?></p>
        <p class="balance">Current Balance: $<?php echo number_format($initialBalance - $deductedAmount, 2); ?></p>

        <form method="POST">
            <input type="text" name="wallet" placeholder="Enter BTC ₿ Wallet Address" required><br>
            <input type="text" name="amount" placeholder="Enter Amount ₿ (BTC)" required><br>
            <input type="submit" value="Transfer" class="submit">
        </form>

        <?php if ($transferSuccess): ?>
            <p class="success">Successfully deducted $<?php echo number_format($deductedAmount, 2); ?> from your balance! 🎉</p>
            <?php if ($initialBalance - $deductedAmount == 0): ?>
                <p class="flag">Here's your flag: <?php echo $flag; ?></p>
                <script>
                    // Display the flag after successful full deduction
                    document.querySelector('.flag').style.display = 'block';
                </script>
            <?php endif; ?>
        <?php elseif ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var audio = document.getElementById('bg-audio');
        // Attempt to play the audio
        var playPromise = audio.play();

        if (playPromise !== undefined) {
            playPromise.then(function() {
                console.log("Audio is playing automatically.");
            }).catch(function(error) {
                console.log("Autoplay prevented: " + error.message);
                // Add a click listener to play audio if autoplay fails
                document.body.addEventListener('click', function() {
                    audio.play();
                });
            });
        }
    });
</script>

</body>
</html>
