<?php

class PostsController {

    public function listCategories() {
//        die;//daloot dees
        $posts = Post::all();
        require_once('views/posts/list.php');
    }

    public function edit() {
        $this->checkId();
        $post = Post::find($_GET['id']);
        require_once('views/posts/edit.php');
    }

    public function delete() {
//        if(!isset($GET['id'])) {
////            die;
//        $this->listCategories();
//        
//            die;
//        }
        $this->checkId();
        $db = Db::getInstance();
        $post = Post::find($_GET['id']);
        $db->deleteCategory($post->id);//https://pics.me.me/when-the-aux-cable-accidentally-disconnects-from-your-phone-oh-25537231.png
        $this->listCategories();
    }

    public function addCategory() {
        $db = Db::getInstance();
        $db->addCategory();
        $this->listCategories();
    }

    public function toggleActive() {
        $db = Db::getInstance();
        $post = Post::find($_GET['id']);
        $db->toggleActive($post->id);
    }

    public function updateCategory() {
        $this->checkId();
        $post = Post::find($_GET['id']);
        $name = $_POST['selectedCategoryName'];
        $active = $_POST['selectedCategoryActive'];
        $db = Db::getInstance();
        $db->updateCategory($name, $post->id);
        $this->listCategories();
    }

    public function addImage() {
        if (!empty($_FILES['uploaded_file'])) {
            $path = "uploads/";
            $path = $path . basename($_FILES['uploaded_file']['name']);
            if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
                echo "The file " . basename($_FILES['uploaded_file']['name']) .
                " has been uploaded";
            } else {
                echo "There was an error uploading the file, please try again!";
            }
            $db = Db::getInstance();
            $db->addImage($_FILES['uploaded_file']['name']);
        }
        $this->listCategories();
    }

    private function checkId() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
    }

}

?>