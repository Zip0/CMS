<?php
  class PagesController {
    public function home() {
//      echo 'pagesController';exit; 
      require_once('views/pages/home.php');
    }

    public function error() {
//      echo 'pagesController';exit;
      require_once('views/pages/error.php');
    }
  }
?>