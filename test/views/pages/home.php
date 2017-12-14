<?php
require_once 'models/post.php';
$posts = Post::all();

require_once('views/posts/list.php');
?>