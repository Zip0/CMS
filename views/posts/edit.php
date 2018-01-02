    <h2>Edit Category:</h2>

    <?php

    $this->id = $post->id;
    if ($post->active == 1) {
        $post->active = 'checked';
    } else {
        $post->active = '';
    }
    echo'
        <div>
        <div class="btn btn-default"><a href="?controller=posts&action=listCategories">Back to list</a></div>
        <table class="table" id="category_list">
            <tr><td>Category ID</td><td>' . $post->id . '</td></tr>
            <tr><td>Name</td><td>' . $post->name . '</td></tr>
            <tr><td>Path</td><td>' . $post->path . '</td></tr>
            <tr><td>Photo</td><td>' . $post->image . '</td></tr>
            <tr><td>Active</td><td><input name="selectedCategoryActive" id="' . (string) $this->id . '" type="checkbox"' . $post->active . '"></td></tr>
            <tr><td>Actions</td><td><div class="btn btn-default delete">
            <a href="?controller=posts&action=delete&id="' . $post->id . '">delete</a></div></td></tr>
        </table>
    <h3>Update Category</h3>
    <form method="POST" name="updateCategory" action="?controller=posts&action=updateCategory&id=' . $post->id . '" onsubmit="return validateForm()">
    </select>
    <label for="categoryInputName">Category Name:</label>
    <input class="form-control" id="categoryInputName" name="selectedCategoryName" value="' . $post->name . '" required></input>
    <input id="update" class="btn btn-default" type="submit" name="Update Category" value="Update Category" >';
    ?>