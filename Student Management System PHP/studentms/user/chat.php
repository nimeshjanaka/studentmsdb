<div class="container-scroller">
<?php include_once('includes/header.php'); ?>
<div class="container-fluid page-body-wrapper">
<?php include_once('includes/sidebar.php'); ?>

<div class="content-wrapper" style="background-color: lightblue;">
    <link rel="stylesheet" href="css/style.css">
    
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="chat-container">
                                <div class="messages" id="messages" style="text-align: right;">
                                    <?php include('load-messages.php'); ?>
                                </div>
                                <form id="message-form" action="send-message.php" method="POST">
                                    <textarea id="message-input" name="message" rows="3" placeholder="Type your message..." style="width: 100%;"></textarea>
                                    <button type="submit" id="send-button">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>


<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="js/chat.js"></script>
