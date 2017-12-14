<!--header("Location: https://www.funnyjunk.com");-->
<!--die();-->
<?php

//echo 'nigga';exit;
//require_once 'dbconnect.php';
        $db = Db::getInstance();
        $db->toggleActive(153);
//echo 'nigga';exit;
//        require_once('views/posts/edit.php');
//exit;

//if (isset($_POST['action'])) {
//    var_dump($_POST);
//    switch ($_POST['action']) {
//        case '1':
//            deactivateCategory();
//            break;
//        case '0':
//            activateCategory();
//            break;
//    }
//}
//
//function activateCategory() {
//    echo "Activated.";
//    $query_result = mysqli_query($conn, "SELECT * FROM categories");
//    var_dump($query_result);
//    return $query_result;
//    exit;
//}
//
//function deactivateCategory() {
//    echo "Deactivated.";
//    exit;
//}

?>