    <h2>Edit Villager:</h2>

    <?php

    $this->id = $villager->id;
    
    var_dump($villager);
    
//      var_dump($villager['id_villager']);exit;
//                        print_r($village = Villager::find(1));
//                        $villager = $village->villagers;
//                        print_r($village->villagers);
                        if ($villager['sex'] == 1) {
                            $villager['sex'] = 'male';
                        } else {
                            $villager['sex'] = 'female';
                        }

                        echo '<table>' .
                        '<tr>' .
                        '<td>Name</td>  <td>Sex</td>    <td>Age</td>    <td>Occupation</td> <td>Health</td>' .
                        '</tr>';

                        echo '<tr>' .
                        '<td>' . $villager['name'] . '</td>' .
                        '<td>' . $villager['sex'] . '</td>' .
                        '<td>' . $villager['age'] . '</td>' .
                        '<td>' . $villager['type'] . '</td>' .
                        '<td>' . $villager['hp'] . '/' . $villager['hp_max'] . '</td>' .
                        '</tr>';

//                        var_dump($villager);
                        echo '</table><br>'; 
                        
                        
                        
//    echo'
//        <div>
//        <div class="btn btn-default"><a href="?controller=posts&action=listCategories">Back to list</a></div>
//        <table class="table" id="category_list">
//            <tr><td>Category ID</td><td>' . $post->id . '</td></tr>
//            <tr><td>Name</td><td>' . $post->name . '</td></tr>
//            <tr><td>Path</td><td>' . $post->path . '</td></tr>
//            <tr><td>Photo</td><td>' . $post->image . '</td></tr>
//            <tr><td>Active</td><td><input name="selectedCategoryActive" id="' . (string) $this->id . '" type="checkbox"' . $post->active . '"></td></tr>
//            <tr><td>Actions</td><td><div class="btn btn-default delete">
//            <a href="?controller=posts&action=delete&id="' . $post->id . '">delete</a></div></td></tr>
//        </table>
//    <h3>Update Category</h3>
//    <form method="POST" name="updateCategory" action="?controller=posts&action=updateCategory&id=' . $post->id . '" onsubmit="return validateForm()">
//    </select>
//    <label for="categoryInputName">Category Name:</label>
//    <input class="form-control" id="categoryInputName" name="selectedCategoryName" value="' . $post->name . '" required></input>
//    <input id="update" class="btn btn-default" type="submit" name="Update Category" value="Update Category" >';
    ?>
