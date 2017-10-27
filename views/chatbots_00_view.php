<div class="thumbnail">
    <div class="jumbotron">
        <ul class="nav nav-tabs">
            <li class="pull-right">
                <a <?php if (isset($botItem[0]["id"])) echo "href='chatbots_01.php?botId=".$botItem[0]["id"]."'"; ?>><span class='fa fa-comments-o fa-2x'></span></a>
            </li>
            <li class="active pull-right">
                <a><span class='fa fa-th-list fa-2x'></span></a>
            </li>
        </ul>
        <br>
        <div class="text-red">

            <div class="input-group input-group-lg">
                <span class="input-group-btn">
                    <button onclick="searchAction()" class="btn btn-red">
                    &nbsp;<span class="fa fa-search"></span>&nbsp;
                </button>
                </span>
                <input id="searchInput" onkeypress="executeQuery(event)" type="search" class="form-control" value="<?php if (isset($botQuery)) echo $botQuery; ?>">                
                <?php if (isset($botQuery)): ?>
                <span class="input-group-btn">
                    <a class="btn btn-default" href="?page=1" role="button">&nbsp;<span class="fa fa-times"></span>&nbsp;</a>
                </span>
                <?php endif; ?>
            </div>
            <br>
            <h4>[ <?php if (isset($botQuery)): ?><span class="fa fa-search"></span><?php else: ?><span class="fa fa-th-list"></span><?php endif; ?> ]</h4>
            <hr class="hr-red">
            <div class="well well-sm">
                <?php if (count($botList) > 0): ?>
                <div class="row">
                    <?php foreach($botList as $bot): ?>
                    <div class="col-sm-6 col-md-2">
                        <a class="bot-link" href="chatbots_01.php?botId=<?php echo $bot['id']; ?>">
                            <div class="thumbnail">
                                <img src="<?php echo $bot['avtaar']; ?>" alt="bot-image">
                                <div class="caption">
                                    <strong class="font-size-sm"><?php echo $bot['name']; ?></strong> 
                                    <?php if (isset($bot['description'])): ?>
                                    <hr class="hr-seperator">
                                    <span><?php echo $bot['description']; ?></span><br> 
                                    <?php endif; ?>
                                    <hr class="hr-seperator">
                                    <h4 class="text-right"><span class="fa fa-eye"></span> : <?php echo $bot['views']; ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center">
                    <div class="btn-group btn-group-sm" role="group">
                    <a href="?page=1" class="btn btn-default" <?php if($pagination[ 'current_page'] <=1 ) echo 'disabled'; ?>>&nbsp;<span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;</a>
                    <a href="?page=<?php echo $pagination['current_page'] - 1; ?>" class="btn btn-default" <?php if($pagination['current_page'] <=1 ) echo 'disabled'; ?>>&nbsp;<span class="glyphicon glyphicon-chevron-left"></span>&nbsp;</a>
                    <?php foreach($pagination['pages'] as $page): ?>
                    <a href="?page=<?php echo $page; ?>" class="btn <?php if($pagination['current_page'] == $page) echo 'btn-primary'; else echo 'btn-default'; ?>">
                        <?php echo $page; ?>
                    </a>
                    <?php endforeach; ?>
                    <a href="?page=<?php echo $pagination['current_page'] + 1; ?>" class="btn btn-default" <?php if($pagination['current_page']>= $pagination['total_pages']) echo 'disabled'; ?>>&nbsp;<span class="glyphicon glyphicon-chevron-right"></span>&nbsp;</a>
                    <a href="?page=<?php echo $pagination['total_pages']; ?>" class="btn btn-default" <?php if($pagination[ 'current_page']>= $pagination['total_pages']) echo 'disabled'; ?>>&nbsp;<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;</a>
                    </div>
                </div>
                <?php else: ?>
                <div class="text-center"><strong>sorry, no bot(s) were found...</strong></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>