<?php

class villageController {
    
    public function completeTurn() {//$id
//        echo 'complete turn controller';//exit;
        $db = Db::getInstance();
//        var_dump($_POST);exit;
//        var_dump($_GET);exit;
        $village = Village::find($_GET['id']);
        $db->addTurn($village->id);//exit;
//        echo'end of village controller';exit;
//        PagesController::home;
        
//        require_once('views/layout.php');
        
        $this->showMainScreen();
//        require_once('views/village/villagesimulator.php');
//        require('views/village/villagesimulator.php');
    }
    
    public function showMainScreen() {
//        echo 'nigga';
//        Village::find($_GET['id']);
//        require_once('views/village/villagesimulator.php');
//    require_once('routes.php');
//        require('index.php');
//        require('views/layout.php');
//        $page = new PagesController();
//        $page->home();
//        exit;
        require_once('views/pages/home.php');
    }
}
