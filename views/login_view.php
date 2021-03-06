<div class="thumbnail">
    <div class="jumbotron">
        <div class="text-purple">
            <form method="post" action="login.php">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon min-width-sm"><span class="fa fa-users fa-lg"></span></div>
                        <input class="form-control" type="text" name="username" value="<?php if (isset($formUsername)) echo $formUsername; ?>" minlength="4" maxlength="32" placeholder="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon min-width-sm"><span class="fa fa-lock fa-lg"></span></div>
                        <input class="form-control" type="password" name="password" value="<?php if (isset($formPassword)) echo $formPassword; ?>" minlength="4" maxlength="32" placeholder="password" required>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-purple btn-lg min-width-lg">login</button>
                    <button onclick="backAction()" type="button" class="btn btn-default btn-lg min-width-lg">cancel</button>
                </div>
                <br>
                <span>not registered?&nbsp;</span>
                <a class="btn btn-default btn-xs" href="register.php" role="button"><span class="fa fa-user-plus"></span>&nbsp;register</a>
            </form>
        </div>
    </div>
</div>