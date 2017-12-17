<?php
        set_include_path('../../');
        require_once ('connection.php');
class Post {

    public $id;
    public $author;
    public $content;

    public function __construct($id, $name, $path, $image, $active) {
        $this->id = $id;
        $this->name = $name;
        $this->path = self::convert_path($path);
        $this->image = $image;
        $this->active = $active;
    }

    public static function convert_path($path) {

        $db = Db::getInstance();
        $exploded = explode(',', $path);
        $path = '';
        foreach ($exploded as $category_id) {
            $category_string = $db->getCategoryString($category_id);
            $path .= $category_string;
            $path .= '<br>=>';
        }
        return rtrim($path, '=>');
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->getCategories();

        foreach ($req as $post) {
            $list[] = new Post($post['id_category'], $post['name'], $post['path'], $post[0]['location'], $post['active']);
        }

        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $post = $db->getCategory($id);
        if ($post != null) {
            if (!isset($post[0]['location'])) {
                $post[0]['location'] = '';
            }
        }
        return new Post($id, $post['name'], $post['path'], $post[0]['location'], $post['active']);
    }

}

?>