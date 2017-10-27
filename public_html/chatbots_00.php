<?php

    require_once("../includes/config.php"); 
    
    $_PAGESIZE = 15;

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = (int) $_GET['page'];
    } else {
        $current_page = 1;
	} 

	$count_data = query("SELECT COUNT(*) FROM bot");
	$pagination = paginate($count_data[0]['COUNT(*)'], $current_page, $_PAGESIZE);  
	 
	if (isset($_GET['query'])) {
		$bot_query = input($_GET["query"]);
		$bot_list = query("SELECT * FROM bot INNER JOIN user ON (bot.user_id = user.id) WHERE visible = 1 ORDER BY views DESC LIMIT ?, ?", ['ii', $pagination['start_index'], $pagination['page_size'] ]);
    } else {
		$bot_query = NULL;
		$bot_list = query("SELECT * FROM bot INNER JOIN user ON (bot.user_id = user.id) WHERE name LIKE ? AND visible = 1 ORDER BY views DESC LIMIT ?, ?", ['sii', '%'.$bot_query.'%', $pagination['start_index'], $pagination['page_size'] ]);
	}

	$context = generate_context('chatbots');
	$context['botList'] = $bot_list;
	$context['botQuery'] = $bot_query;
	
	if (isset($_SESSION["id"])) {
		$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);
		$context['botItem'] = $bot_item;
	}

	$context['pagination'] =  $pagination;
   
    render("chatbots_00_view.php", $context);
 

?>
