<?php

function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');
//    var_dump($controller);exit;
    switch ($controller) {
        case 'pages':
//            echo '***routes pages***'; //exit;
            $controller = new PagesController();
            break;
        case 'posts':
//            echo '***routes posts***'; exit;
            require_once('models/post.php');
            $controller = new PostsController();
            break;
        case 'village':
//            echo '***routes village***';// exit;
//            set_include_path(DIRECTORY_SEPARATOR);
            require_once('models/village.php');
            require_once('models/villager.php');
            $controller = new VillageController();
            break;
    }

    $controller->{ $action }();
}

$controllers = array(
    'pages' => ['home', 'error'],
    'posts' => ['listCategories', 'edit', 'delete', 'addCategory', 'addImage', 'toggleActive', 'updateCategory'],
    'village' => ['completeTurn', 'edit']
);

if (array_key_exists($controller, $controllers)) {
//    $action = explode('?', $action);
//    echo 'action: ';
//    var_dump($action);//exit;
//    echo 'controller: ';
//    var_dump($controller);//exit;
//    var_dump($controllers);//exit;
    if (in_array($action/*[0]*/, $controllers[$controller])) {
        call($controller, $action/*[0]*/);
    } else {
        var_dump($controller);
        var_dump($action);
        echo 'PING';
//        exit;
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
?>