
    <div class="container">
        <?php
        echo'<h1>Here is a list of all categories:</h1>
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
            $this->id = '';
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
            . "<td class='photo-container'><img class='photo' src='uploads/" . $post->image . "'></td>"
            . "<td><input name='selectedCategoryActive' id='" . (string) $this->id . "' type='checkbox' " . $post->active . "></td>"
            . "<td>
            <a class='btn btn-default delete' href='?controller=posts&action=delete&id=" . $post->id . "'>delete</a>
            <a class='btn btn-default' href='?controller=posts&action=edit&id=" . $post->id . "'>edit</a>
            </td>
        </tr>";
        }

        echo'</table>';



        $options = '';
        foreach ($posts as $post) {
            $options .= "<option value={$post->id}>{$post->name}</option>";
        }

        echo'
    <div class="row">

    <div class="col-sm-3">
    <h3>Add Category</h3>
        <form method="POST" name="addCategory" action="?controller=posts&action=addCategory" onsubmit="return validateForm()">
            <!--<div class="form-group">-->
            <label for="categoryInputParent">Parent Category:</label>
            <select class="form-control" id="categoryInputParent" name="selectedCategoryParent">                
            <option value="0">Primary Category</option>'
        .
        $options
        .
        '            </select>
    
            <label for="categoryInputName">Category Name:</label>
            <input class="form-control" id="categoryInputName" name="selectedCategoryName" required></input>
            <input class="selectedActiveCheckbox" id="hroo" type="checkbox" name="selectedCategoryActive" value="1"> Active
            <input class="btn btn-default" type="submit" name="Add Category" value="Add Category" >
            </div>
        </form>
    </div>
    <div class="row">
    <div class="col-sm-3">
        <h3>Add Image</h3>
        <form enctype="multipart/form-data" action="?controller=posts&action=addImage" action="upload.php" method="POST">
            <label for="categoryInputParent">Select Category:</label>
            <select class="form-control" id="categoryInputParent" name="selectedCategoryParent">'
        .
        $options
        .
        '           </select>
    
            <p>Upload your file</p>
            <input class="btn btn-default" type="file" name="uploaded_file" required></input><br />
            <input class="btn btn-default" type="submit" value="Upload"></input>
        </form>
        


    </div>
    </div>
</div>'
        ?>
    </div>
