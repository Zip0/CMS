<!--<header>
    <?php // include 'views/header.php'; ?>
</header>-->
<div class="container" id="listContainer">
    <?php
    if (!isset($posts)) {
//        var_dump('nigga');//exit;
//        set_include_path( '..' . DIRECTORY_SEPARATOR);
        require_once '../../models/post.php';
        $posts = Post::all();
    }


    $options = '';
    foreach ($posts as $post) {
//        var_dump($post);
        $post->path = str_replace('Primary Category', '', $post->path);
        $options .= "<option value={$post->id}>{$post->path}=>=>{$post->name}</option>";
    }

    echo'
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCategory">Add category</button>
    <div id="addCategory" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add category</h4>
                </div>
                <form method="POST" name="addCategory" action="?controller=posts&action=addCategory" onsubmit="return validateForm()">
                    <label for="categoryInputParent">Parent Category:</label>
                    <select class="form-control" id="categoryInputParent" name="selectedCategoryParent">                
                    <option value="0">Primary Category</option>'
    .
    $options
    .
    '</select>
                    <label for="categoryInputName">Category Name:</label>
                    <input class="form-control" id="categoryInputName" name="selectedCategoryName" required></input>
                    <input class="selectedActiveCheckbox" id="hroo" type="checkbox" name="selectedCategoryActive" value="1"> Active
                    <input class="btn btn-default" type="submit" id="addCategoryButton" name="Add Category" value="Add Category" >
                </form>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#uploadImage">Upload image</button>
    <div id="uploadImage" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload image</h4>
                </div>
                <form enctype="multipart/form-data" action="?controller=posts&action=addImage" action="upload.php" method="POST">
                    <label for="categoryInputParent">Select Category:</label>
                    <select class="form-control" id="categoryInputParent" name="selectedCategoryParent">'
    .
    $options
    .
    '               </select>
                    <p>Upload your file</p>
                    <input class="btn btn-default" type="file" name="uploaded_file" required></input><br />
                    <input class="btn btn-default" type="submit" value="Upload"></input>
                </form>
            </div>
        </div>
    </div>

';


    echo'
    <h1>Here is a list of all categories:</h1>
    <table class="table" id="category_list">
        <tr>
            <td>Category ID</td>
            <td>Name</td>
            <td>Path</td>
            <td>Photo</td>
            <td>Active</td>
            <td>Actions</td>
        </tr>';



    foreach ($posts as $post) { //Amazon S3 is a better solution//Add pic=upload button
        $id = '';
        if ($post->active == 1) {
            $post->active = 'checked';
        } else {
            $post->active = '';
        }
        $id = $post->id;
        echo "<tr>"
        . "<td>" . $post->id . "</td>"
        . "<td>" . $post->name . "</td>"
        . "<td>" . $post->path . "</td>"
        . "<td class='photo-container'><img class='photo' src='uploads/" . $post->image . "'></td>"
        . "<td><input name='selectedCategoryActive' id='" . (string) $id . "' type='checkbox' " . $post->active . "></td>"
        . "<td>
                <button class='btn btn-info delete' id=" . $post->id . ">delete</button>
                
                <button type='button' class='btn btn-info openBtn' data-toggle='modal' data-target='#editCategoryModal' href='?controller=posts&action=edit&id=" . $post->id . "'>Edit</button>
                <div id='editCategoryModal' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        
                        </div>
                    </div>
                </div>
            </td>
        </tr>";
    }

    echo''
    . '</table>';



    include 'views/footer.php';
    ?>
</div>
