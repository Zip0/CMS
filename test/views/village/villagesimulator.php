<?php
//set_include_path('..' . DIRECTORY_SEPARATOR);
//require_once 'connection.php';
//
//set_include_path('..' . DIRECTORY_SEPARATOR);


//include_once '../../models/village.php';


//        $village = new Village(1);

//include_once '../../models/village.php';
//include_once 'models/village.php';
$village = Village::find(1);
//var_dump($village);
//var_dump(Village::find(1));
//var_dump($village);



//?<?php echo $village->id ?>



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

<form method="POST" action="?controller=village&action=completeTurn&id=<?php echo (int) $village->id ?>">
<!--<form method="POST" action="?controller=village&action=completeTurn&id=<?php echo (int) $village->id ?>">-->
<!--<form method="POST" action="?controller=village&action=completeTurn">-->
    <input class="btn btn-default" type="submit" value="End Turn"  ></input>
</form><!-- ' .  . ' -->