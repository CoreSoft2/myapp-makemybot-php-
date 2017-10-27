<div class="thumbnail">
    <div class="jumbotron">
        <div class="text-darkred">
            <h4>[ <span class="fa fa-comments-o"></span> ]</h4>
            <hr class="hr-darkred">
            <div class="thumbnail">
                <div id="chatBox" class="well chat-box">
                    <div hidden id="botMessage">
                        <table class="table table-responsive">
                            <tr>
                                <td class="avtaar">
                                    <img class="avtaar-img light-red" src="<?php echo $botItem[0]['avtaar']; ?>" alt="bot-image">
                                </td>
                                <td class="text-left">
                                    <div class="bubble-bot bot round">
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
                                    <div class="bubble-user user round">
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
                <div class="input-group input-group-lg">
                    <input id="chatInput" onkeypress="executeChat(event)" class="form-control" placeholder="type something..." type="text" autocomplete="off"
                        autofocus>
                    <span class="input-group-btn">
                        <button id="chatButton" onclick="sendMessage()" class="btn btn-darkred"><span class="fa fa-chevron-right"></span></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
