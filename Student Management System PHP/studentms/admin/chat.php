<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat Application</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container-scroller">
    <!-- Include header and sidebar -->
    <?php include_once('includes/header.php'); ?>
    <div class="container-fluid page-body-wrapper">
    <?php include_once('includes/sidebar.php'); ?>

    <!-- Main content -->
      <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="chat-container">
                            <div class="messages" id="messages">
                                <!-- Messages will be loaded here dynamically -->
                            </div>
                            <textarea id="message-input" rows="3" placeholder="Type your message..."></textarea>
                            <button id="send-button">Send</button>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Include footer -->
    <?php include_once('includes/footer.php'); ?>

    <!-- Include JavaScript files -->
    <script src="js/chat.js"></script>
</body>
</html>
