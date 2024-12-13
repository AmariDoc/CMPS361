<html>
    <head>
        <title>Fitness Tracker Assistant</title>
        <link rel="stylesheet" href="./css/stylesheet.css">
    </head>
    <body>
        <div class="chat-container">
            <h1>Fitness Tracker Assistant</h1>
            <div id="chatbot">
                <div id="messages"></div>
            </div>
            <form id="chat-form" method="POST">
                <input type="text" name="user_input" id="user-input" placeholder="Ask me about fitness..." autocomplete="off" required>
                <button type="submit">Send</button>
            </form>
        </div>

        <!-- Reference the external JavaScript file -->
        <script src="./js/chatbot.js"></script>
    </body>
</html>
