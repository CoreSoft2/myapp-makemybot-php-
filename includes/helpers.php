<?php

    /**
     * helpers.php
     *
     * Helper functions.
     */

    require_once("config.php");

    /**
     * Shows error message to user with message.
     */
    function show_error_page($title, $header, $message)
    {
        $context = generate_context($title);
        $context['header'] = $header;
        $context['message'] = $message;

        render("error_view.php", $context);
    }

    /**
     * Facilitates debugging by dumping contents of argument(s)
     * to browser.
     */
    function dump($content)
    {
        die(var_dump($content));
        exit;
    }

    /**
     * Logs out current user, if any.  
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();

        // enable sessions
        session_start();
    }

    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     */
    function redirect($location, $params = null)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        if (isset($params)) {
            $location .= '?'.http_build_query($params);
        }
        header("Location: {$location}");
        exit;
    }

    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render base view 
            require_once("../views/base_view.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }

    /**
     * Queries sql statemets using passed in values.
     */
    function query($sql, $params = null, $action = 'r'){
            // create connection
            $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

            // check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

           // prepare and bind
           $stmt = $conn->prepare($sql) or die ("Failed to prepared the statement: ".$sql);
           if ($params) {
            call_user_func_array(array($stmt, 'bind_param'), reference($params));
           }
           
           // execute query
           $stmt->execute();

           // store query results
           $rows = $stmt->get_result();

           switch($action) {
               case 'n':
                    $result = $rows->num_rows;
                    break;
               case 'a':
                    $result = $conn->affected_rows;
                    break;
               case 'i':
                    $result = $conn->insert_id;
                    break;
               case 'r':
                    $result = array();
                    while ($row = $rows->fetch_assoc()) {
                        array_push($result, $row);
                    }
                    break;
               default:
                    die(print_r('Invalid action parameter passed.'));
           }

           // close connection
           $stmt->close();
           $conn->close();
           
           return  $result;
   }
    /**
     * Return references of array elements.
     */
    function reference($arr){
        if (strnatcmp(phpversion(),'5.3') >= 0) 
        {
            $refs = array();
            foreach($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }


    /**
     * Formats the input.
     */
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * Generates pagination object.
     */
    function paginate($total_items, $current_page = 1, $page_size = 25) {
        $total_pages = (int) ceil($total_items / $page_size);
        if ($total_pages <= 10) {
            $start_page = 1;

            if ($total_pages) {
                $end_page = $total_pages;
            } else {
                $end_page = 1;
            }
        } else {
            if ($current_page <= 6) {
                $start_page = 1;
                $end_page = 10;
            } else if ($current_page + 4 >= $total_pages) {
                $start_page = $total_pages - 9;
                $end_page = $total_pages;
            } else {
                $start_page = $current_page - 5;
                $end_page = $current_page + 4;
            }
        }
        $start_index = ($current_page - 1) * $page_size;
        $end_index = min($start_index + $page_size - 1, $total_items - 1);
        $pages = range($start_page, $end_page);

        $pagination = [
            'total_items' => $total_items,
            'current_page' => $current_page,
            'page_size' => $page_size,
            'total_pages' => $total_pages,
            'start_page' => $start_page,
            'end_page' => $end_page,
            'start_index' => $start_index,
            'end_index'  => $end_index,
            'pages' => $pages
        ];

        return $pagination;
    }

    /**
     * Generates context.
    */
    function generate_context($title) {

        $title = strtolower($title);
        $PAGE_COLOR = ['home' => 'grey',
            'login' => 'purple',
            'register' => 'purple',
            'chatbots' => 'red',
            'guide' => 'blue',
            'faqs' => 'green',
            'contact' => 'orange',
            'chat' => 'darkred',
            'teach' => 'darkblue',
            'settings' => 'darkgreen',
            'embed' => 'darkorange'
        ];
        $page_color = $PAGE_COLOR[$title];
        $context = [
            'pageTitle' => $title,
            'pageColor' => "bg-{$page_color}",
            'buttonColor' => "btn-{$page_color}",
            'textColor' => "text-{$page_color}"
        ];

        return $context;
    }

?>