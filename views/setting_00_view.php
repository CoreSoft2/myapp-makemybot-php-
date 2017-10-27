<div class="thumbnail">
    <div class="jumbotron">
        <ul class="nav nav-tabs">
            <li class="pull-right">
                <a href="setting_01.php"><span class="fa fa-user fa-2x"></span></a>
            </li>
            <li class="active pull-right">
                <a><span class='fa fa-cogs fa-2x'></span></a>
            </li>
        </ul>
        <div class="text-darkgreen">
            <h4>[ <span class="fa fa-cogs"></span> ]</h4>
            <hr class="hr-darkgreen">
            <div class="well">
                <form method="post" action="setting_00.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <span hidden id="avtaarUrl"><?php echo $botItem[0]['avtaar']; ?></span>
                            <div class="well">
                                <div class="row text-center">
                                    <div hidden class="form-group">
                                        <input class="form-control" id="botUpload" onchange="previewAction(event)" name="avtaarFile" type="file" accept=".jpg,.jpeg,.png">
                                    </div>
                                    <div hidden class="form-group">
                                        <input id="defaultCheckbox" name="defaultFile" class="checkbox-size-lg" type="checkbox">
                                    </div>
                                    <div class="col-md-12">
                                        <img id="botImage" class="img-thumbnail" onerror="defaultAction()" src="<?php echo $botItem[0]['avtaar']; ?>" alt="bot-avtaar">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="btn-group">
                                            <button onclick="settingAction(0)" type="button" class="btn btn-default btn-lg">
                                            <i class="fa fa-folder-o" aria-hidden="true"></i>
                                        </button>
                                            <button onclick="settingAction(1)" type="button" class="btn btn-default btn-lg">
                                            <i class="fa fa-undo" aria-hidden="true"></i>
                                        </button>
                                            <button onclick="settingAction(2)" type="button" class="btn btn-default btn-lg">
                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon min-width-sm"><span class="fa fa-user fa-lg"></span></div>
                                    <input class="form-control" type="text" name="name" value="<?php echo $botItem[0]['name']; ?>" minlength="4" maxlength="32" placeholder="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
                                    <textarea class="form-control fixed-textarea" name="description" rows="4" maxlength="128" placeholder="description"><?php echo $botItem[0]['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon min-width-sm">
                                                <input onchange="toogleAction(0)" id="visibleCheckbox" name="visible" class="checkbox-size-lg" type="checkbox" <?php if ($botItem[0]['visible']) echo 'checked'; ?>>
                                            </span>
                                            <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-block">
                                                &nbsp;<span id="formIcon00" class="fa <?php if ($botItem[0]['visible']) echo 'fa-eye'; else 'fa-eye-slash' ?> fa-lg"></span>&nbsp;
                                            </button>
                                            </span>
                                        </div>
                                        <span class="help-block">Toggle whether bot should be visible in list or not.</span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon min-width-sm">
                                                <input onchange="toogleAction(1)" id="greetCheckbox" name="greet" class="checkbox-size-lg" type="checkbox" <?php if ($botItem[0]['greet']) echo 'checked'; ?>>
                                            </span>
                                            <input id="greetMessage" class="form-control" type="text" name="message" value="<?php echo $botItem[0]['message']; ?>" maxlength="32" placeholder="message" required <?php if (!$botItem[0]['greet']) echo 'disabled'; ?>>
                                        </div>
                                        <span class="help-block">Toggle whether greeting message should be send to bot at initialisation or not.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-darkgreen btn-lg min-width-lg">save</button>
                                <button onclick="backAction()" type="button" class="btn btn-default btn-lg min-width-lg">cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>