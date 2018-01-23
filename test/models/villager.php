<?php

//set_include_path('../../');
require_once ('connection.php');

class Villager {

    public $id;
    public $name;
    public $village;
    public $age;
    public $type;
    public $sex;
    public $hp_max;
    public $hp;

    public function __construct($id, $name, $village, $age, $type, $sex, $hp_max, $hp) {
        $this->id = $id;
        $this->name = $name;
        $this->village = $village;
        $this->age = $age;
        $this->type = $type;
        $this->sex = $sex;
        $this->hp_max = $hp_max;
        $this->hp = $hp;
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
//        $village = $db->getVillageSummary($id);
//        $villagers = $db->getVillagersSummary($id);
        
        $villager[] = $db->getVillager($id);
//        $village = new Village($id, $village['name'], $village['villagers'], $village['cottages'], $village['food'], $village['wood'], $village['gold']);
        
        $villager = $villager[0][0];
        
//        var_dump($villager[0]);
//        print_r($villager[0][0]);
        
//        var_dump($villager);
        return new Villager($id, $villager['name'], $villager['village'], $villager['age'], $villager['type'], $villager['sex'], $villager['hp_max'], $villager['hp']);
    }


}
