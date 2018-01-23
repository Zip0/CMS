<?php

class Db {

    private $_connection;
    private static $_instance; //The single instance
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "test";

    public static function getInstance() {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct() {
        $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        mysqli_query($this->_connection, "SET NAMES utf8");

        if (mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), E_USER_ERROR);
        }
    }

    private function __clone() {
        
    }

    public function getConnection() {
        return $this->_connection;
    }

    //Village stuff

    public function getVillageSummary($id) {
        $sql = mysqli_query($this->_connection, "SELECT * FROM villages WHERE id_village=" . (int) $id);
//        var_dump($sql);
        if (!empty($sql)) {
            $villageSummary = $sql->fetch_array(MYSQLI_ASSOC);
//        var_dump($villageSummary);
            return $villageSummary;
        } else {
            return false;
        }
    }

    public function getVillagers($id) {

        $villagers = [];
        $sql = mysqli_query($this->_connection, "SELECT * FROM test.villagers");
        if (!empty($sql)) {
            while ($row_villager = mysqli_fetch_assoc($sql)) {
                $villagers[] = $row_villager;
            }
//        var_dump($villagers);
            return $villagers;
        } else {
            return $villagers;
        }
    }

    public function getVillager($id) {

//        $villagers = [];
        $sql = mysqli_query($this->_connection, "SELECT * FROM test.villagers WHERE id_villager = " . $id);
        if (!empty($sql)) {
            while ($row_villager = mysqli_fetch_assoc($sql)) {
                $villager[] = $row_villager;
            }
        }
//        var_dump($villagers);
//        $villager = $sql;
            return $villager;
//        } else {
//            return $villager;
//        }
    }

    public function completeTurn($id, $deltaFood, $deltaWood, $deltaGold) {
        mysqli_query($this->_connection, "UPDATE villages "
                . "SET turn = turn +1, "
                . "food = food +" . $deltaFood . ", "
                . "wood = wood +" . $deltaWood . ", "
                . "gold = gold +" . $deltaGold . " "
                . "WHERE id_village=" . (int) $id);
    }

    //End of Village stuff

    public function getCategories() {
        $sql = mysqli_query($this->_connection, "SELECT id_category, name, path, active FROM categories");
        while ($row_category = mysqli_fetch_assoc($sql)) {
            $image = $this->getImage($row_category['id_category']);
            array_push($row_category, $image);
            $categories[] = $row_category;
        }


        return $categories;
    }

    public function getCategoryString($id) {

        if ($id == 0) {
            $category_string['name'] = 'Primary Category';
        } else {
            $category_string = mysqli_query($this->_connection, "SELECT name FROM categories WHERE id_category=" . (int) $id);

            $category_string = $category_string->fetch_array(MYSQLI_ASSOC);
        }

        return $category_string['name'];
    }

    private function getParentCategoryId($id) {
        $parent = mysqli_query($this->_connection, "SELECT path FROM categories WHERE id_category=" . (int) $id);
        $parent = $parent->fetch_array(MYSQLI_ASSOC);
        return $parent;
    }

    private function getHierarchy($id) {
        $path = $id;
        $parent = $this->getParentCategoryId($id);
        $parent_string = (int) $parent['path'];
        while ((int) $parent != 0) {
            $parent = $this->getParentCategoryId($id);
            $id = $parent['path'];
            if ($id != NULL) {
                $path = $id . ',' . $path;
            }
        }
        $path = str_replace(".", "", $path) . '.';
//        $path .= '.';
        return $path;
    }

    public function addCategory() {
        $name = $_POST['selectedCategoryName'];
        $path = $this->getHierarchy($_POST['selectedCategoryParent']);
        if (isset($_POST['selectedCategoryActive'])) {
            $active = $_POST['selectedCategoryActive'];
        } else {
            $active = 0;
        }
        mysqli_query($this->_connection, "INSERT INTO categories (name, path, active) VALUES('" . $name . "', '" . $path . "', '" . $active . "')");
    }

    public function addImage($location) {
        $id_category = $_POST['selectedCategoryParent'];
        mysqli_query($this->_connection, "DELETE FROM images WHERE id_category=" . $id_category);
        mysqli_query($this->_connection, "INSERT INTO images (id_category, location) VALUES('" . $id_category . "', '" . $location . "')");
    }

    public function getCategory($id) {
        $category = mysqli_query($this->_connection, "SELECT id_category, name, path, active FROM categories WHERE id_category=" . (int) $id);
        $category = $category->fetch_array(MYSQLI_ASSOC);
        $image = $this->getImage($id);
        if ($image != NULL) {
            array_push($category, $image);
        }
        return $category;
    }

    public function getImage($id) {
        $image = mysqli_query($this->_connection, "SELECT id, location FROM images WHERE id_category=" . (int) $id);
        $image = $image->fetch_array(MYSQLI_ASSOC);
        return $image;
    }

    public function deleteCategory($id) {
        mysqli_query($this->_connection, "DELETE FROM categories WHERE id_category=" . (int) $id);
        mysqli_query($this->_connection, "delete from categories where path like '%," . (int) $id . ",%' or path like '%," . (int) $id . ".%'");
    }

    public function updateCategory($name, $id) {
        mysqli_query($this->_connection, "UPDATE categories SET name='" . $name . "' WHERE id_category=" . (int) $id);
    }

    public function toggleActive($id) {
        mysqli_query($this->_connection, "UPDATE categories SET active = IF(active=1, 0, 1) WHERE id_category='" . (int) $id . "'"); // . (int) $id);
    }

}

?>