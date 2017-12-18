<?php

//set_include_path('../../');
require_once ('connection.php');

class Village {

    public $id;
    public $name;
    public $villagers;
    public $cottages;
    public $food;
    public $wood;
    public $gold;

    public function __construct($id, $name, $villagers, $cottages, $food, $wood, $gold) {
        $this->id = $id;
        $this->name = $name;
        $this->villagers = $villagers;
        $this->cottages = $cottages;
        $this->food = $food;
        $this->wood = $wood;
        $this->gold = $gold;
    }
//    
//    public static function all() {
//        $list = [];
//        $db = Db::getInstance();
//        $req = $db->getCategories();
//
//        foreach ($req as $post) {
//            $list[] = new Post($post['id_category'], $post['name'], $post['path'], $post[0]['location'], $post['active']);
//        }
//
//        return $list;
//    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $village = $db->getVillageSummary($id);
        $villagers = $db->getVillagersSummary($id);
        
//        $village = new Village($id, $village['name'], $village['villagers'], $village['cottages'], $village['food'], $village['wood'], $village['gold']);
        
        
//        var_dump($village);
        return new Village($id, $village['name'], $village['villagers'], $village['cottages'], $village['food'], $village['wood'], $village['gold']);
    }


}
