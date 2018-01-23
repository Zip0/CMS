<?php
//set_include_path('..' . DIRECTORY_SEPARATOR);
//require_once 'connection.php';
//
set_include_path('..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
//include_once '../../models/village.php';
//        $village = new Village(1);
//include_once '../../models/village.php';
$included_files = get_included_files();
//var_dump($included_files);
if (!in_array('models/village.php', $included_files)) {
//    echo 'BOOOOOOOOOOOOOOOP';
    require_once 'models/village.php';
    require_once 'models/villager.php';
}
//    $village = new Village;
$village = Village::find(1);
//var_dump($village);
//var_dump(Village::find(1));
//var_dump($village);
//?<?php echo $village->id 
?>


<div id="villageSummary">
    <table>
        <tr>
            <td>Villagers</td>        <td>Food</td>        <td>Wood</td>        <td>Gold</td>        <td>Turn</td>        <td></td>
        </tr>
        <tr>
            <td><?php echo count($village->villagers) ?></td>        
            <td><?php echo $village->food ?></td>
            <td><?php echo $village->wood ?></td>
            <td><?php echo $village->gold ?></td>
            <td><?php echo $village->turn ?></td>
            <td></td>
        </tr>
    </table>

    <button id="end-turn" class="btn btn-default" value="<?php echo (int) $village->id ?>">Confirm</button>
    <button id="show-villagers" class="btn btn-default" type="button" data-toggle="modal" data-target="#villagerRoster" value="<?php echo (int) $village->id ?>">Show villagers</button>
    <div id="villagerRoster" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">List of all villagers:</h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach ($village->villagers as $villager) {

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
                        echo '<button id="edit-villager" class="btn btn-default openBtn" type="button" data-toggle="modal" data-target="#editVillager" value="' . (int) $villager['id_villager'] . '" href="?controller=village&action=edit&id=' . (string) $villager['id_villager'] . '">Edit villager</button>';

                    }
                    ?>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>

        </div>
        <div id="editVillager" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit villager:</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php 
////                        var_dump($villager['id_villager']);exit;
////                        print_r($village = Villager::find(1));
////                        $villager = $village->villagers;
////                        print_r($village->villagers);
//                        if ($villager['sex'] == 1) {
//                            $villager['sex'] = 'male';
//                        } else {
//                            $villager['sex'] = 'female';
//                        }
//
//                        echo '<table>' .
//                        '<tr>' .
//                        '<td>Name</td>  <td>Sex</td>    <td>Age</td>    <td>Occupation</td> <td>Health</td>' .
//                        '</tr>';
//
//                        echo '<tr>' .
//                        '<td>' . $villager['name'] . '</td>' .
//                        '<td>' . $villager['sex'] . '</td>' .
//                        '<td>' . $villager['age'] . '</td>' .
//                        '<td>' . $villager['type'] . '</td>' .
//                        '<td>' . $villager['hp'] . '/' . $villager['hp_max'] . '</td>' .
//                        '</tr>';
//
////                        var_dump($villager);
//                        echo '</table><br>'; 
                        ?></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>