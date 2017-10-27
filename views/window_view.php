<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- FONTAWESOME CSS -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- CUSTOM-FAVICON -->
    <link rel="shortcut icon" href="icon/favicon.ico">
    <!-- CUSTOM-STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="css/window-styles.css">
    <title>makemybot: <?php echo $pageTitle; ?></title>
</head>

<body>
    <div class="preloader"></div>
    <div class="panel panel-default">
        <div id="windowHeader" class="panel-heading">
            <div class="row">
                <div class="col-xs-4">
                    <span class="font-size-sm text-darkred"><span class="fa fa-comments-o fa-lg"></span></span>
                </div>
                <div class="col-xs-8">
                    <div class="navbar-logo">
                        <a target="_parent" href="home.php">
                            <table>
                                <tr>
                                    <td><img src="img/preloader01.gif" alt="loader-img"></td>
                                    <td><strong class="font-size-sm">&nbsp;makemybot</strong><strong class="text-darkred">.com</strong></td>
                                </tr>
                            </table>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body chat-box">
            <div id="chatBox" class="chat-box">
                <div hidden id="botMessage">
                    <table class="table table-responsive">
                        <tr>
                            <td class="avtaar">
                                <img class="avtaar-img light-red" src="<?php echo $botItem[0]['avtaar']; ?>" alt="bot-image">
                            </td>
                            <td class="text-left">
                                <div class="bubble-bot bot">
                                    <div class="bubble-header"><?php echo $botItem[0]['name']; ?></div>
                                    <div id="messageBody" class="bubble-body"></div>
                                    <div class="font-size-xs">
                                        <span class="fa fa-clock-o"></span>&nbsp;<span id="messageTime"></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div hidden id="userMessage">
                    <table class="table table-responsive">
                        <tr>
                            <td class="text-right">
                                <div class="bubble-user user">
                                    <div class="bubble-header">User</div>
                                    <div id="messageBody" class="bubble-body center"></div>
                                    <div class="font-size-xs">
                                        <span class="fa fa-clock-o"></span>&nbsp;<span id="messageTime"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="avtaar">
                                <img class="avtaar-img light-yellow" src="img/user_avtaar.png" alt="user-image">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="input-group">
                <input id="chatInput" onkeypress="executeChat(event)" class="form-control" type="text" autocomplete="off" autofocus>
                <span class="input-group-btn">
                <button id="chatButton" onclick="sendMessage()" class="btn btn-danger">
                    &nbsp;<span class="fa fa-chevron-right"></span>&nbsp;
                </button>
                </span>
            </div>
        </div>
    </div>
    </div>
    <div id="alertModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title <?php echo $textColor; ?>">
                    <span class="fa fa-exclamation-triangle"></span>&nbsp;alert
                </h4>
            </div>
            <div class="modal-body">
                <p id="alertBody"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>
<!-- JQUERY JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- BOOTSTRAP JS -->
<script src="js/bootstrap.min.js"></script>
<!-- CUSTOM-SCRIPT-->
<script src="js/custom-script00.js"></script>
<?php if (isset($chatPage)): ?>
<!-- RIVESCRIPT JS -->
<script src="js/rivescript.min.js"></script>
<!-- CUSTOM-SCRIPT-->
<script src="js/custom-script01.js"></script>
<script>
    $(document).ready(function () {
        chatAction('<?php echo $botItem[0]['brain']; ?>', '<?php echo $botItem[0]['message']; ?>', '<?php echo $botItem[0]['greet']; ?>');
    });
    $(window).on('unload', function () {
        logConversation();
    });
</script>
<?php endif; ?>
<script>
    $(window).on('load', function () {
        $(".preloader").fadeOut("fast");;
    });
</script>
<?php if (isset($alertText)): ?>
<script>
    $(document).ready(function () {
        alertAction('<?php echo $alertText; ?>');
    });
</script>
<?php endif; ?>
</body>

</html>