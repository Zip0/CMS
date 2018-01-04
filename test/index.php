<script src="https://code.jquery.com/jquery.js"></script>
<?php
//phpinfo();
//require_once 'connection.php';
//set_include_path('..' . DIRECTORY_SEPARATOR);
include_once 'connection.php';

//set_include_path('..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
//set_include_path(null);
include_once 'models/village.php';

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
//    var_dump($controller);
//    var_dump($action);
//    exit;
} else {
    $controller = 'pages';
    $action = 'home';
}

if ($action == 'edit') {
    require_once('routes.php');
} else {
    require_once('views/layout.php');
}
?>
