<?php

/**
 * include the configs / constants for the database connection
 */
require_once("config/db.php");

// class autoloader function, this includes all the classes that are needed by the script
// you can remove this stuff if you want to include your files manually
function autoload($class)
{
    require('classes/' . $class . '.class.php');
}

// automatically loads all needed classes, when they are needed
spl_autoload_register("autoload");
//create a database connection
$db    = new Database();

$login = new Login($db);

$userObj = new efarCMS($db);


$userId = $_REQUEST['user'];
$fname = $_REQUEST['fname'];
$sname = $_REQUEST['sname'];
$email = $_REQUEST['email'];

if ($_REQUEST['mycheckboxes']){
    $checkbox = $_REQUEST['mycheckboxes'];
    
    foreach($checkbox as $value ) {
    
}

$userObj->whoLoggedIn();

$userObj->insertPanelsUsers($checkbox, $userId);

}

else{
    
    $userObj->whoLoggedIn();

    $userObj->updatePanels($userId);
    }

echo 'Panels permission have been set for the following user: '.$userId.' '.$fname.' '.$sname.' '.$email;

?>
