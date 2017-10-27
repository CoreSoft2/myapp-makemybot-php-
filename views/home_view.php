<div class="thumbnail">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-3 text-center">
                <img class="img-thumbnail" src="img/chatty.png" alt="Chatty">
            </div>
            <div class="col-md-9">
                <h2>welcome <?php if (isset($_SESSION["id"])) echo $_SESSION["username"]; else echo 'guest';?>!</h2>
                <p>makemybot.com allows user to built their own customised chatbot which can be used at other places.</p>
                <div class="well text-center">
                    <?php if (isset($_SESSION["id"])): ?>
                    <a href="chat.php" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="chat">
                        <span class='fa fa-comments-o fa-2x'></span>
                    </a>
                    <a href="teach_00.php" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="teach">
                        <span class='fa fa-pencil-square-o fa-2x'></span>
                    </a>
                    <a href="setting_00.php" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="settings">
                        <span class='fa fa-cogs fa-2x'></span>
                    </a>
                    <a href="embed.php" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="embed">
                        <span class='fa fa-code fa-2x'></span>
                    </a>
                    <?php endif; ?>
                    <a href="chatbots_00.php?page=1" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="chatbots">
                        <span class='fa fa-users fa-2x'></span>
                    </a>
                    <a href="guide.php" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="guide">
                        <span class='fa fa-question-circle-o fa-2x'></span>
                    </a>
                    <a href="faqs.php" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="faqs">
                        <span class='fa fa-list fa-2x'></span>
                    </a>
                    <a href="contact.php" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="contact">
                        <span class='fa fa-envelope-o fa-2x'></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
