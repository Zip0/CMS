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
</div>