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
    <link rel="stylesheet" type="text/css" href="css/custom-styles-min.css">
    <title>makemybot: <?php echo $pageTitle; ?></title>
</head>

<body>
    <div class="preloader"></div>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-group" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-logo">
                    <a href="home">
                        <table>
                            <tr>
                                <td><img src="img/preloader01.gif" alt="loader-img"></td>
                                <td><strong class="font-size-lg">&nbsp;makemybot</strong><strong class="<?php echo $textColor; ?>">.com</strong></td>
                            </tr>
                        </table>
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-group">
                <ul class="nav navbar-nav content-full-width">
                    <?php if (isset($_SESSION["id"])): ?>
                    <li class="menu-icon bg-darkred <?php if ($pageTitle == 'chat') echo 'menu-active'?>">
                        <a href="chat.php"><span class='fa fa-comments-o'></span></a>
                    </li>
                    <li class="menu-icon bg-darkblue <?php if ($pageTitle == 'teach') echo 'menu-active'?>">
                        <a href="teach_00.php"><span class='fa fa-pencil-square-o'></span></a>
                    </li>
                    <li class="menu-icon bg-darkgreen <?php if ($pageTitle == 'settings') echo 'menu-active'?>">
                        <a href="setting_00.php"><span class='fa fa-cogs'></span></a>
                    </li>
                    <li class="menu-icon bg-darkorange <?php if ($pageTitle == 'embed') echo 'menu-active'?>">
                        <a href="embed.php"><span class='fa fa-code'></span></a>
                    </li>
                    <?php endif; ?>
                    <li class="menu-icon bg-red <?php if ($pageTitle == 'chatbots') echo 'menu-active'?>">
                        <a href="chatbots_00.php?page=1"><span class='fa fa-users'></span></a>
                    </li>
                    <li class="menu-icon bg-blue <?php if ($pageTitle == 'guide') echo 'menu-active'?>">
                        <a href="guide.php"><span class='fa fa-question-circle-o'></span></a>
                    </li>
                    <li class="menu-icon bg-green <?php if ($pageTitle == 'faqs') echo 'menu-active'?>">
                        <a href="faqs.php"><span class='fa fa-list'></span></a>
                    </li>
                    <li class="menu-icon bg-orange <?php if ($pageTitle == 'contact') echo 'menu-active'?>">
                        <a href="contact.php"><span class='fa fa-envelope-o'></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu-strip <?php echo $pageColor; ?>"></div>
    </nav>
    <header class="<?php echo $pageColor; ?>">
        <div class="container">
            <span class="font-size-lg"><?php echo $pageTitle; ?></span> 
            <?php if (isset($_SESSION["id"])): ?>
            <div class="btn-group pull-right" role="group">
                <a onclick="userAction()" class="btn <?php echo $buttonColor; ?> btn-lg min-width-sm" role="button">
                    &nbsp;<span class="fa fa-user"></span>&nbsp;<span hidden id="userContent"><?php echo $_SESSION["username"]; ?></span>
                </a>
                <a class="btn <?php echo $buttonColor; ?> btn-lg min-width-sm" href="logout.php" role="button">&nbsp;<span class="fa fa-sign-out"></span>&nbsp;</a>
            </div>
            <?php else: ?>
            <div class="btn-group pull-right" role="group">
                <a class="btn <?php echo $buttonColor; ?> btn-lg min-width-sm" href="register.php" role="button">
                    &nbsp;<span class="fa fa-user-plus"></span>&nbsp;
                </a>
                <a class="btn <?php echo $buttonColor; ?> btn-lg min-width-sm" href="login.php" role="button">
                    &nbsp;<span class="fa fa-sign-in"></span>&nbsp;
                </a>
            </div>
            <?php endif; ?>
        </div>
    </header>
    <div class="container margin-t-lg margin-b-sm">
        <?php if (isset($_SESSION["message"])): ?>
            <div class="well well-sm <?php echo $textColor; ?>">
                <ul>
                <?php foreach($_SESSION["message"] as $message): ?>
                <li><?php echo $message; ?></li>
                <?php endforeach; ?>
                <?php unset($_SESSION["message"]); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php require_once("../views/{$view}"); ?>
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
    <footer class="<?php echo $pageColor; ?>">
        <h4 class="text-center">
            <a href="chatbots_00.php">chatbots</a> |
            <a href="guide.php">guide</a> |
            <a href="faqs.php">faqs</a> |
            <a href="contact.php">contact</a> |
            <a href="https://github.com/kaushalmeena1996/myapp-makemybot(php)">github</a>
        </h4>
    </footer>
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
        $('[data-toggle="tooltip"]').tooltip();  
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