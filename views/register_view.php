<div class="thumbnail">
    <div class="jumbotron">
        <div class="text-purple">
            <form method="post" action="register.php">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon min-width-sm"><span class="fa fa-user fa-lg"></span></div>
                                <input class="form-control" type="text" name="firstname" value="<?php if (isset($formFirstname)) echo $formFirstname; ?>" maxlength="32" placeholder="firstname">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon min-width-sm"><span class="fa fa-user fa-lg"></span></div>
                                <input class="form-control" type="text" name="lastname" value="<?php if (isset($formLastname)) echo $formLastname; ?>" maxlength="32" placeholder="lastname">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon min-width-sm"><span class="fa fa-envelope fa-lg"></span></div>
                        <input class="form-control" type="email" name="email" value="<?php if (isset($formEmail)) echo $formEmail; ?>" maxlength="128" placeholder="e-mail" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon min-width-sm"><span class="fa fa-users fa-lg"></span></div>
                        <input class="form-control" type="text" name="username" value="<?php if (isset($formUsername)) echo $formUsername; ?>" minlength="4" maxlength="32" placeholder="username"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon min-width-sm"><span class="fa fa-lock fa-lg"></span></div>
                        <input class="form-control" type="password" name="password" value="<?php if (isset($formPassword)) echo $formPassword; ?>" minlength="4" maxlength="32" placeholder="password"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon min-width-sm"><span class="fa fa-lock fa-lg"></span></div>
                        <input class="form-control" type="password" name="confirm" value="<?php if (isset($formConfirm)) echo $formConfirm; ?>" minlength="4" maxlength="32" placeholder="confirm"
                            required>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-purple btn-lg min-width-lg">register</button>
                    <button onclick="backAction()" type="button" class="btn btn-default btn-lg min-width-lg">cancel</button>
                </div>
                <br>
                <span>already registered? &nbsp;</span>
                <a class="btn btn-default btn-xs" href="login.php" role="button"><span class="fa fa-sign-in"></span>&nbsp;login</a>
            </form>
        </div>
    </div>
</div>