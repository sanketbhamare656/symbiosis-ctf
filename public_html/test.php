<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="https://tachyonbyte.s3.ap-south-1.amazonaws.com/static/assets/img/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Heist XSS Challenge</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #ff0000;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: relative;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .frame {
            border: 2px solid #ff0000;
            border-radius: 10px;
            padding: 20px;
            background-color: #333;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
            overflow: hidden;
            position: relative;
        }
        input[type="text"] {
            background-color: #222;
            border: 1px solid #ff0000;
            border-radius: 5px;
            color: #ff0000;
            padding: 10px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #ff0000;
            border: none;
            border-radius: 5px;
            color: #1e1e1e;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #cc0000;
        }
        .hint {
            background-color: #d35400;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            display: none;
        }
        .flag {
            font-weight: bold;
            color: #ff0000;
            margin-top: 20px;
            font-size: 24px;
            background-color: #ffcccc;
            padding: 10px;
            border-radius: 5px;
            animation: pulse 1.5s infinite;
            display: inline-block;
        }
        .scrollable-content {
            max-height: 500px;
            overflow-y: auto;
            padding: 10px;
            border-top: 2px solid #ff0000;
            border-bottom: 2px solid #ff0000;
            background-color: #222;
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
            width: 80%;
            max-width: 1200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            position: relative;
        }
        .character {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .tokyo-wrapper {
            justify-content: flex-start;
        }
        .character img {
            width: 150px;
            height: auto;
            border-radius: 50%;
            border: 2px solid #d32f2f;
            margin-right: 15px;
        }
        .tokyo-message {
            text-align: left;
            width: calc(100% - 180px);
            border-right: 2px solid #ff0000;
            white-space: nowrap;
            overflow: hidden;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
            font-size: 18px;
            color: #00ff00; /* Change the text color here */
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
        }
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: #d32f2f; }
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 
            <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="https://tachyonbyte.s3.ap-south-1.amazonaws.com/static/assets/img/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Heist XSS Challenge</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #ff0000;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: relative;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .frame {
            border: 2px solid #ff0000;
            border-radius: 10px;
            padding: 20px;
            background-color: #333;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
            overflow: hidden;
            position: relative;
        }
        input[type="text"] {
            background-color: #222;
            border: 1px solid #ff0000;
            border-radius: 5px;
            color: #ff0000;
            padding: 10px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #ff0000;
            border: none;
            border-radius: 5px;
            color: #1e1e1e;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #cc0000;
        }
        .hint {
            background-color: #d35400;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            display: none;
        }
        .flag {
            font-weight: bold;
            color: #ff0000;
            margin-top: 20px;
            font-size: 24px;
            background-color: #ffcccc;
            padding: 10px;
            border-radius: 5px;
            animation: pulse 1.5s infinite;
            display: inline-block;
        }
        .scrollable-content {
            max-height: 500px;
            overflow-y: auto;
            padding: 10px;
            border-top: 2px solid #ff0000;
            border-bottom: 2px solid #ff0000;
            background-color: #222;
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
            width: 80%;
            max-width: 1200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            position: relative;
        }
        .character {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .tokyo-wrapper {
            justify-content: flex-start;
        }
        .character img {
            width: 150px;
            height: auto;
            border-radius: 50%;
            border: 2px solid #d32f2f;
            margin-right: 15px;
        }
        .tokyo-message {
            text-align: left;
            width: calc(100% - 180px);
            border-right: 2px solid #ff0000;
            white-space: nowrap;
            overflow: hidden;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
            font-size: 18px;
            color: #00ff00; /* Change the text color here */
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
        }
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: #d32f2f; }
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('money_heist_bg.gif') no-repeat center center fixed;
            background-size: cover;
            z-index: 0;
            opacity: 0.5;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="container">
        <div class="message-wrapper">
            <div class="character tokyo-wrapper">
                <img src="tokyo.jpg" alt="Tokyo">
                <div id="tokyoMessage" class="tokyo-message">
                  Welcome to our heist! This time, the challenge is to exploit XSS vulnerabilities 
                  <p>Gain access to the hidden vault</p>
                    <p>Use your skills to crack the code and prove you're a master thief! </p>
                </div>
            </div>
        </div>

        <div class="frame">
            <h1>Money Heist XSS Challenge</h1>
            <form id="searchForm" action="" method="get">
                <input type="text" id="query" name="query" placeholder="Enter the code to crack the vault">
                <input type="submit" value="Execute">
            </form>
            
            <div id="hintContainer" class="hint"></div>
            <div id="gifContainer" class="gif"></div>
            <div id="result" class="scrollable-content">
                <!-- Placeholder for dynamic content -->
            </div>

            <!-- Hidden message element -->
            <div id="hiddenMessage" class="hidden">
              <p></p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const query = document.getElementById('query').value;

            // Clear previous results
            document.getElementById('gifContainer').innerHTML = '';
            document.getElementById('result').innerHTML = '';
            document.getElementById('hintContainer').innerHTML = '';

            const tokyoMessage = document.getElementById('tokyoMessage');
            const hiddenMessage = document.getElementById('hiddenMessage');

            // Base64 encoded flag
            const flag = atob('Q1RGe0xhQ2FzYURlWFNTfQ==');
            
            // Check for XSS payloads
            if (
                query.includes('<script>') || 
                query.includes('<img') || 
                query.includes('<svg') || 
                query.includes('</scrip') || 
                query.includes('<audio') || 
                query.includes('<video') || 
                query.includes('<body') || 
                query.includes('<object') || 
                query.includes('<frameset') || 
                query.includes('<title') || 
                query.includes('<iframe') || 
                query.includes('<html') || 
                query.includes('<source') || 
                query.includes('<form') || 
                query.includes('<button')
            ) {
                // Update Tokyo's message with success content
                tokyoMessage.innerHTML = `
                    <p>Bravo! The heist was a success! Here's your Flag: ${flag}</p>
                `;
                
                // Show hidden message
                hiddenMessage.querySelector('p').textContent = `Bravo! The heist was a success! Here's your Flag: ${flag}`;
                hiddenMessage.classList.remove('hidden');
                
                document.getElementById('gifContainer').innerHTML = '<img src="https://c.tenor.com/3SKnACCsSJ8AAAAd/tenor.gif" alt="Success GIF">';
                document.getElementById('result').innerHTML = `<p class="flag">Flag: ${flag}</p>`;
                document.body.style.backgroundImage = 'url(https://wordanova.com/wp-content/uploads/2020/04/mh-min.gif)';

                // Hide hint after 5 seconds
                setTimeout(() => {
                    document.getElementById('hintContainer').style.opacity = '0';
                }, 5000);
            } else {
                document.getElementById('gifContainer').innerHTML = '<img src="https://c.tenor.com/tyqB1COl1FMAAAAC/real.gif" alt="Access Denied GIF">';
                document.getElementById('result').innerHTML = '<p>Access Denied. Try Again!</p>';
            }
        });
    </script>
</body>
</html>
