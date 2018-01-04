<?php

class villageController {
    
    public function completeTurn() {//$id
//        echo 'complete turn controller';//exit;
        $db = Db::getInstance();
//        var_dump($_POST);exit;
//        var_dump($_GET);exit;
        $village = Village::find($_GET['id']);
        $db->completeTurn($village->id);
//        echo'end of village controller';exit;
//        PagesController::home;
        
        require_once('views/village/villagesimulator.php');
    }
}
