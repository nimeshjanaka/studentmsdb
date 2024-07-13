$(document).ready(function () {
  // Function to load messages from the server
  function loadMessages() {
    $.ajax({
      url: "load-messages.php", // PHP script to fetch messages from database
      type: "GET",
      success: function (data) {
        $("#messages").html(data); // Append messages to the messages container
      },
    });
  }

  // Load messages initially
  loadMessages();

  // Send message functionality
  $("#send-button").click(function () {
    var message = $("#message-input").val();
    if (message.trim() !== "") {
      // Ensure message is not empty
      $.ajax({
        url: "send-message.php", // PHP script to send message to database
        type: "POST",
        data: { message: message },
        success: function (response) {
          $("#message-input").val(""); // Clear input after sending message
          loadMessages(); // Reload messages to display the new one
        },
      });
    }
  });

  // Optional: Refresh messages every few seconds
  setInterval(loadMessages, 5000); // Refresh messages every 5 seconds
});
