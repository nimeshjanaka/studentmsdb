$(document).ready(function () {
  function loadMessages() {
    $.ajax({
      url: "load-messages.php",
      type: "GET",
      success: function (data) {
        $("#messages").html(data);
      },
    });
  }

  loadMessages();

  $("#message-form").submit(function (e) {
    e.preventDefault();
    var message = $("#message-input").val();
    if (message.trim() !== "") {
      $.ajax({
        url: "send-message.php",
        type: "POST",
        data: { message: message },
        success: function (response) {
          $("#message-input").val("");
          loadMessages();
        },
      });
    }
  });

  setInterval(loadMessages, 5000);
});
