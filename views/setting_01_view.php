<div id="passwordChangeModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" action="setting_01.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-warning">
                        <span class="fa fa-lock"></span>&nbsp;change-password
                    </h4>
                </div>
                <div class="modal-body">
                    <div hidden class="form-group">
                        <input name="formType" class="form-control" type="text" value="2">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon min-width-sm"><span class="fa fa-lock fa-lg"></span></div>
                            <input class="form-control" type="password" name="oldpass" minlength="4" maxlength="32" placeholder="old-password" required>
                        </div>
                    </div>
                    <div>
                        <div class="input-group">
                            <div class="input-group-addon min-width-sm"><span class="fa fa-lock fa-lg"></span></div>
                            <input class="form-control" type="password" name="newpass" minlength="4" maxlength="32" placeholder="new-password" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning min-width-lg">change</button>
                    <button type="button" class="btn btn-default min-width-lg" data-dismiss="modal">return</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="accountDeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" action="setting_01.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-danger">
                        <span class="fa fa-trash"></span>&nbsp;delete-account
                    </h4>
                </div>
                <div class="modal-body">
                    <div hidden class="form-group">
                        <input name="formType" class="form-control" type="text" value="3">
                    </div>
                    <span>do you really want to delete your account?</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger min-width-lg">delete</button>
                    <button type="button" class="btn btn-default min-width-lg" data-dismiss="modal">return</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="thumbnail">
    <div class="jumbotron">
        <ul class="nav nav-tabs">
            <li class="active pull-right">
                <a><span class="fa fa-user fa-2x"></span></a>
            </li>
            <li class="pull-right">
                <a href="setting_00.php"><span class='fa fa-cogs fa-2x'></span></a>
            </li>
        </ul>
        <div class="text-darkgreen">
            <h4>[ <span class="fa fa-user"></span> ]</h4>
            <hr class="hr-darkgreen">
            <div class="well">
                <form method="post" action="setting_01.php">
                    <div hidden class="form-group">
                        <input name="formType" class="form-control" type="text" value="1">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon min-width-sm"><span class="fa fa-user fa-lg"></span></div>
                                    <input class="form-control" type="text" name="firstname" value="<?php echo $userItem[0]['firstname']; ?>" maxlength="32" placeholder="firstname">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon min-width-sm"><span class="fa fa-user fa-lg"></span></div>
                                    <input class="form-control" type="text" name="lastname" value="<?php echo $userItem[0]['lastname']; ?>" maxlength="32" placeholder="lastname">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon min-width-sm"><span class="fa fa-envelope fa-lg"></span></div>
                            <input class="form-control" type="email" name="email" value="<?php echo $userItem[0]['email']; ?>" maxlength="128" placeholder="e-mail" required>
                        </div>
                    </div>
                    <div class="btn-group btn-group-lg" role="group">
                        <button type="button" class="btn btn-warning min-width-sm" data-toggle="modal" data-target="#passwordChangeModal">
                            <span class="fa fa-lock fa-lg"></span>
                        </button>
                        <button type="button" class="btn btn-danger min-width-sm" data-toggle="modal" data-target="#accountDeleteModal">
                            <span class="fa fa-trash fa-lg"></span>
                        </button>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-darkgreen btn-lg min-width-lg">save</button>
                        <button onclick="backAction()" type="button" class="btn btn-default btn-lg min-width-lg">cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>