<?php

set_include_path('..' . DIRECTORY_SEPARATOR);
require_once 'connection.php';

        set_include_path( '..' . DIRECTORY_SEPARATOR);
        require_once 'models/village.php';
//        $village = new Village(1);
$village = Village::find(1);
//var_dump($village);
//var_dump(Village::find(1));
//var_dump($village);

?>

<table>
    <tr>
        <td>Villagers</td>        <td>Food</td>        <td>Wood</td>        <td>Gold</td>        <td></td>        <td></td>
    </tr>
    <tr>
        <td><?php echo count($village->villagers) ?></td>        
        <td><?php echo $village->food ?></td>        
        <td><?php echo $village->wood ?></td>        
        <td><?php echo $village->gold ?></td>        
        <td></td>        
        <td></td>
    </tr>
</table>

<button class="btn btn-default" href="villagesimulator.php" action="villagesimulator.php">CLICK MEH</button>