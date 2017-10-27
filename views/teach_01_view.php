<div class="thumbnail">
    <div class="jumbotron">
        <ul class="nav nav-tabs">
            <li class="pull-right">
                <a href="teach_02.php"><span class='fa fa-file-text-o fa-2x'></span></a>
            </li>
            <li class="active pull-right">
                <a><span class="fa fa-upload fa-2x"></span></a>
            </li>
            <li class="pull-right">
                <a href="teach_00.php"><span class='fa fa-pencil-square-o fa-2x'></span></a>
            </li>
        </ul>
        <div class="text-darkblue">
            <h4>[ <span class="fa fa-upload"></span> ]</h4>
            <hr class="hr-darkblue">
            <div class="well">
                <form class="form" method="post" action="teach_01.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon min-width-sm"><span class="fa fa-file-code-o fa-lg"></span></div>
                            <input id="brainFile" name="brainFile" class="form-control" type="file" accept=".rive">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-lg btn-darkblue min-width-lg">save</button>
                        <button onclick="resetAction('#brainFile')" type="button" class="btn btn-lg btn-default min-width-lg">clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>