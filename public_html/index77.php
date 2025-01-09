<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Casa de Papel: The Heist Begins</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #000;
            color: #e0e0e0;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .message-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            margin-top: 30px;
            padding: 20px;
            background-color: #111;
            border-radius: 10px;
            width: 100%;
            max-width: 1200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .character {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .tokyo-wrapper {
            justify-content: flex-start;
            display: none; /* Initially hidden */
        }
        .tokyo-wrapper img {
            width: 150px;
            height: auto;
            border-radius: 50%;
            border: 2px solid #d32f2f;
            margin-right: 15px;
        }
        .professor-wrapper {
            justify-content: flex-end;
            display: none; /* Initially hidden */
        }
        .professor-wrapper img {
            width: 150px;
            height: auto;
            border-radius: 50%;
            border: 2px solid #4caf50;
            margin-left: 15px;
        }
        .tokyo-message, .professor-message {
            font-size: 1.2em;
            line-height: 1.5em;
            white-space: nowrap;
            overflow: hidden;
            border: 3px solid;
            padding: 10px;
            box-sizing: border-box;
            text-align: left;
            width: calc(100% - 180px);
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }
        .professor-message {
            text-align: right;
            animation: typing 4s steps(40, end), blink-caret 0.75s step-end infinite;
            border-color: #4caf50;
        }
        .unique-message {
            font-size: 1.3em;
            color: #f57c00;
            margin-top: 20px;
            display: none; /* Hide initially */
        }
        .congratulations-message {
            font-size: 1.5em;
            color: #4caf50;
            margin-top: 20px;
            display: none;
        }
        .special-flag, .special-image {
            font-size: 1.2em;
            color: #d32f2f;
            margin-top: 20px;
            display: none;
        }
        .special-flag {
            font-size: 1.5em;
            background-color: #333;
            border-radius: 5px;
            padding: 10px;
            display: inline-block;
        }
        .special-image img {
            width: 200px;
            height: auto;
        }
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: #d32f2f; }
        }
        textarea {
            padding: 8px;
            margin: 10px;
            width: 100%;
            max-width: 400px;
            background-color: #222;
            color: #fff;
            border: 1px solid #555;
            border-radius: 5px;
            height: 60px;
            resize: none;
            font-size: 1em;
            box-sizing: border-box;
        }
        input[type="submit"], .view-challenge-button, .download-ctf-button {
            padding: 10px 20px;
            background-color: #d32f2f;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
            font-size: 1em;
        }
        input[type="submit"]:hover, .view-challenge-button:hover, .download-ctf-button:hover {
            background-color: #a00000;
        }
        .view-challenge-button {
            background-color: #2196f3;
        }
        .view-challenge-button:hover {
            background-color: #1976d2;
        }
        .download-ctf-button {
            background-color: #4caf50;
        }
        .download-ctf-button:hover {
            background-color: #388e3c;
        }
        h1 {
            color: #d32f2f;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .emoji {
            font-size: 1.5em;
            vertical-align: middle;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Money Heist: The Heist Begins 💰🕵️‍♂️</h1>

        <?php
        $location = "";
        $valid = false;
        $specialFlag = "";
        $showSpecialImage = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $location = strtolower(trim($_POST["location"]));
            if ($location === 'tokyo' || $location === 'spain') {
                $valid = true;
            }
            if ($location === 'spain') {
                $specialFlag = "CTF{tachyonX33B00M}";
                $showSpecialImage = true;
            }
        }
        ?>

        <div class="message-wrapper">
            <?php if (!$valid): ?>
                <div class="character tokyo-wrapper" style="display: flex;">
                    <img src="tokyo.jpg" alt="Tokyo">
                    <div class="tokyo-message">
                        Hi, my name is Tokyo. Do you know where it all started? 🌍💭
                    </div>
                </div>
            <?php else: ?>
                <div class="character professor-wrapper" style="display: flex;">
                    <img src="professor.jpg" alt="Professor">
                    <div class="professor-message">
                        <?php if ($location === 'spain'): ?>
                            Impressive work! You've solved the challenge with a unique twist. Welcome to Team Buddy. Congratulations! 🎉 Enjoy your reward of two exclusive flags
                                           <?php else: ?>
                            Congratulations on your smartness! 🎉 You’ve figured it out. Welcome to the team. 🕵️‍♂️
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!$valid): ?>
            <form method="POST">
                <textarea name="location" placeholder="Enter the location to unlock the CTF 🕵️‍♂️"></textarea>
                <input type="submit" value="Start 🚀">
                <button type="button" class="view-challenge-button" onclick="downloadCTF()">Hint 💡</button>
            </form>
        <?php endif; ?>

        <?php if ($valid): ?>
            <div class="congratulations-message">
                <p>Welcome to the team! 🕵️‍♂️🎉</p>
            </div>
            <?php if ($showSpecialImage): ?>
                <div class="special-image">
                    <!-- Insert the image here if you have one -->
                </div>
                <div class="special-flag">
                    <p>Challenge Name: Simple XSS</p>
                    <p>Flag: <?php echo $specialFlag; ?></p>
                    <p>Challenge Name: Forensic challenge 2 Munna image</p>
                    <p>Flag: CTF{Amar_Hai_Hum}</p>
                </div>
            <?php endif; ?>
            <a href="test.html" class="view-challenge-button">View CTF 🔍</a>
        <?php endif; ?>

    </div>

    <script>
        function downloadCTF() {
            // Trigger download of hint or some other action
            alert('Hint: Watch Money Heist or use Brain');
        }
    </script>
</body>
</html>
