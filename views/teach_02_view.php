<div class="thumbnail">
    <div class="jumbotron">
        <ul class="nav nav-tabs">
            <li class="active pull-right">
                <a><span class='fa fa-file-text-o fa-2x'></span></a>
            </li>
            <li class="pull-right">
                <a href="teach_01.php"><span class="fa fa-upload fa-2x"></span></a>
            </li>
            <li class="pull-right">
                <a href="teach_00.php"><span class='fa fa-pencil-square-o fa-2x'></span></a>
            </li>
        </ul>
        <div class="text-darkblue">
            <h4>[ <span class="fa fa-pencil-square-o"></span> ]</h4>
            <hr class="hr-darkblue">
            <div class="well">
                <form method="post" action="teach_02.php">
                    <div class="form-group">
                        <textarea id="logEditor" class="form-control fixed-textarea font-size-sm" rows="30"><?php echo $logText ?></textarea>
                    </div>
                    <div hidden class="form-group">
                        <input name="clearText" type="checkbox" checked>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-lg btn-default">clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>