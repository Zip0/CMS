<div class="container">
    <h2>Edit Category:</h2>

    <?php
    echo'<div>
        <div class="btn btn-default"><a href="?controller=posts&action=listCategories">Back to list</a></div>
<table class="table" id="category_list">
    <tr>
        <td>Category ID</td>
        <td>Name</td>
        <td>Path</td>
        <td>Photo</td>
        <td>Active</td>
        <td>Actions</td>
    </tr>';
    if ($post->active == 1) {
        $post->active = 'checked';
    } else {
        $post->active = '';
    }
    $this->id = $post->id;
    echo "<tr>"
    . "<td>" . $post->id . "</td>"
    . "<td>" . $post->name . "</td>"
    . "<td>" . $post->path . "</td>"
    . "<td>" . $post->image . "</td>"
    . "<td><input name='selectedCategoryActive' id='" . (string) $this->id . "' type='checkbox' " . $post->active . "></td>"
    . "<td><div class='btn btn-default delete'>
            <a href='?controller=posts&action=delete&id=" . $post->id . "'>delete</a>
                </div>
            </td>
        </tr></table>";
    echo '<div class="col-sm-3">
    <h3>Update Category</h3>
    <form method="POST" name="updateCategory" action="?controller=posts&action=updateCategory&id=' . $post->id . '" onsubmit="return validateForm()">
            <!--<div class="form-group">-->
        </select>
    
            <label for="categoryInputName">Category Name:</label>
            <input class="form-control" id="categoryInputName" name="selectedCategoryName" value="' . $post->name . '" required></input>
            
            <input class="btn btn-default" type="submit" name="Update Category" value="Update Category" >
        </div>';
    ?>
</div>