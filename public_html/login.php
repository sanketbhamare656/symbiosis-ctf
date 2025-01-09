<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "mysql";
$username = "root"; // Default for XAMPP
$password = "rootpassword"; // Default for XAMPP (empty by default)
$dbname = "vulnerable_db";
$port = 3306 ;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname , $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$loginMessage = ""; // Variable to store login messages
$flag = ""; // Variable to store the flag
$customAlert = ""; // Variable to store custom alert
$showGif = ""; // Variable to control GIF display

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from POST request
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];
    
    // Vulnerable SQL query without parameterization
    $sql = "SELECT * FROM users WHERE username = '$form_username' AND password = '$form_password'";
    
    // Execute the SQL query
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch the row containing the flag
        $row = $result->fetch_assoc();
        $flag = $row['flag']; // Assign flag value to variable
        $loginMessage = "Login successful!";
        $customAlert = "Bravo you are SQL injection Expert!";
    } else {
        $loginMessage = "Invalid username or password.";
        $showGif = "https://media.tenor.com/crFVRcYCkw8AAAAM/andha.gif"; // GIF for failed login
    }
    
    $result->free();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="icon" type="image/x-icon" href="https://tachyonbyte.s3.ap-south-1.amazonaws.com/static/assets/img/favicon.ico">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CTF Task</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #00ff00;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            margin: 0;
            padding: 0;
            overflow-y: auto; /* Enable vertical scrollbar */
            height: 100vh;
        }
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://cdn.tech.eu/uploads/2023/12/provenrun-374.gif') no-repeat center center fixed;
            background-size: cover;
            z-index: -1; /* Ensure background is behind other content */
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        .frame {
            border: 2px solid #00ff00;
            border-radius: 10px;
            padding: 20px;
            background-color: #333;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
            max-width: 600px;
            width: 100%;
            overflow: hidden;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="password"] {
            background-color: #222;
            border: 1px solid #00ff00;
            border-radius: 5px;
            color: #00ff00;
            padding: 10px;
            width: calc(100% - 22px);
        }
        input[type="submit"] {
            background-color: #00ff00;
            border: none;
            border-radius: 5px;
            color: #1e1e1e;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #00cc00;
        }
        .gif {
            margin-top: 10px; /* Adjusted for better positioning */
            width: 500px; /* Increased width for larger GIFs */
            height: auto; /* Maintain aspect ratio */
        }
        .alert {
            background-color: #ff0000;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .flag {
            font-weight: bold;
            color: #ff0000;
            margin-top: 20px;
            font-size: 24px;
            background-color: #ffcccc;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="container">
        <div class="frame">
            <h1>Nuclear Admin Panel</h1>
            
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                
                <input type="submit" value="Login">
            </form>
            
            <?php if (!empty($loginMessage)) : ?>
                <p><?php echo htmlspecialchars($loginMessage); ?></p>
            <?php endif; ?>
            
            <?php if (!empty($flag)) : ?>
                <p class="flag">Flag: <?php echo htmlspecialchars($flag); ?></p>
                <img src="https://media.tenor.com/CEPmb07JCBsAAAAM/carry-minati-ajey-nagar.gif" alt="Success GIF" class="gif">
            <?php endif; ?>
            
            <?php if (!empty($showGif)) : ?>
                <img src="<?php echo htmlspecialchars($showGif); ?>" alt="Error GIF" class="gif">
            <?php endif; ?>
            
            <?php if (!empty($customAlert)) : ?>
                <div class="alert"><?php echo htmlspecialchars($customAlert); ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
