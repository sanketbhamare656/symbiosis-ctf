<?php 
session_start();
$host = 'mysql'; 
$dbname = 'ctf_challenge';
$username = 'root'; 
$password = 'rootpassword'; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if both username and password are set
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            // **Secure Query using Prepared Statements**
            $query = "SELECT * FROM users WHERE username = :username AND (password = :password OR :password = '') LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $user);
            $stmt->bindParam(':password', $pass);
            $stmt->execute();

            // If a matching user is found
            if ($stmt->rowCount() > 0) {
                $_SESSION['username'] = $user; // Store username in session
                header('Location: login1.php'); // Redirect to the next page
                exit;
            } else {
                $error = "Invalid login credentials!";
            }
        } else {
            $error = "Please enter both username and password.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Heist Challenge - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Bebas+Neue&display=swap">
    <style>
        body {
            background: linear-gradient(135deg, #2c003e, #5c0011); /* Dark red gradient */
            color: #e0e0e0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.9); /* Near black background */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.7);
            width: 100%;
            max-width: 600px;
            display: flex;
            align-items: flex-start; /* Align items to the top */
            justify-content: center;
            position: relative; /* For absolute positioning of the image */
        }
        .image-wrapper {
            position: absolute;
            top: 20px; /* Adjust top position */
            left: 20px; /* Adjust left position */
            width: 120px; /* Reduced size */
            height: 120px; /* Reduced size */
            background: url('https://mask-kingdom.com/wp-content/uploads/2020/08/Money-Heist-Dali-Mask-LED-Red.jpg') no-repeat center center;
            background-size: cover;
            border-radius: 50%;
            border: 3px solid #ff4f4f;
        }
        .text-content {
            margin-left: 160px; /* Add space for the image */
            text-align: center;
        }
        h1 {
            color: #ff4f4f; /* Bright red */
            margin-bottom: 10px;
            font-size: 2em;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
        }
        h2 {
            color: #ffffff; /* White */
            font-size: 1.2em;
            font-family: 'Oswald', sans-serif;
            margin-bottom: 30px;
        }
        input[type="text"],
        input[type="password"] {
            margin: 10px 0;
            padding: 12px;
            width: 100%;
            border: 1px solid #444;
            border-radius: 5px;
            font-size: 1em;
            background-color: #333;
            color: #fff;
        }
        input[type="submit"] {
            background-color: #ff4f4f; /* Bright red */
            color: white;
            cursor: pointer;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #e03e3e;
        }
        .error {
            color: #ff4444;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-wrapper"></div>
        <div class="text-content">
        <h1><h1>Berlin BTC Heist Access🔓Transfer ₿💰and Win the Flag🚩</h1>
        </h1>
        <h2>Enter your credentials to proceed 🔐💼</h2>
           <form method="POST">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
