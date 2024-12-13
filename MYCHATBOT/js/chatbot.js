const form = document.getElementById('chat-form');
const messages = document.getElementById('messages');

form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const userInput = document.getElementById('user-input').value.trim();
    
    // Check if the input is empty
    if (userInput === "") {
        alert("Please enter a message.");
        return; // Stop if input is empty
    }

    // Add user's message to the chat window
    const userMessage = `<div class="user-message"><strong>You:</strong> ${userInput}</div>`;
    messages.innerHTML += userMessage;

    // Clear the input field after sending the message
    document.getElementById('user-input').value = "";

    // Fetch bot response
    try {
        const response = await fetch('bot_logic.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded', // Corrected 'Content-Type' spelling
            },
            body: new URLSearchParams({ user_input: userInput }) // Pass user input to backend
        });

        if (!response.ok) {
            throw new Error("Network response was not ok");
        }

        const botResponse = await response.text(); // Get the bot response

        // Add bot's message to the chat window
        const botMessage = `<div class="bot-message"><strong>Bot:</strong> ${botResponse}</div>`;
        messages.innerHTML += botMessage;

        // Scroll to the bottom of the chat window to show the latest message
        messages.scrollTop = messages.scrollHeight;

    } catch (error) {
        console.error("Error:", error);
        const errorMessage = `<div class="bot-message error"><strong>Bot:</strong> Sorry, something went wrong!</div>`;
        messages.innerHTML += errorMessage;
    }
});
