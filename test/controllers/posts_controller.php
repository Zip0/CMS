<?php

class PostsController {

    public function listCategories() {
        $posts = Post::all();
        require_once('views/posts/list.php');
    }

    public function edit() {
        $this->checkId();
        $post = Post::find($_GET['id']);
        require_once('views/posts/edit.php');
    }

    public function delete() {
        $this->checkId();
        $db = Db::getInstance();
        $post = Post::find($_GET['id']);
        $db->deleteCategory($post->id);
        $this->listCategories();
    }

    public function addCategory() {
        if(!ctype_alnum($_POST['selectedCategoryName'])) {
            echo "<div class='container'>
                    <h3>Invalid name</h3>
                </div>";
        $this->listCategories();
        return;
        }
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
        if (isset($_POST['selectedCategoryName'])) {
            $name = $_POST['selectedCategoryName'];
        } else {
            $name = '';
        }
        if(!ctype_alnum($name)) {
            echo "<div class='container'>
                    <h3>Invalid name</h3>
                </div>";
        $this->listCategories();
        return;
        }
//        $name = test_input($name);
        if (isset($_POST['selectedCategoryActive'])) {
            $active = $_POST['selectedCategoryActive'];
        } else {
            $active = '';
        }

        $db = Db::getInstance();
        $db->updateCategory($name, $post->id);
        $this->listCategories();
    }

    public function addImage() {
        if (!empty($_FILES['uploaded_file'])) {
            $path = "uploads/";
            $path = $path . basename($_FILES['uploaded_file']['name']);
            if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
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
    //Village stuff
    
    
    
    
    
    
    
    //end of Village stuff
}

?>