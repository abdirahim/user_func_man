<?php

//include the configs / constants for the database connection
 require_once("config/db.php");

function autoload($class){
    
    require('classes/' . $class . '.class.php');
}

// automatically loads all needed classes, when they are needed
spl_autoload_register("autoload");
//create a database connection
$db    = new Database();

$login = new Login($db);

$userObj = new efarCMS($db);


$userId = $_POST['userId'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];
$job   =  $_POST['job'];
$telephone= $_POST['telephone'];
$mobile =  $_POST['mobile'];
$tfax2  = $_POST['tfax2'];
$tswi2 = $_POST['tswi2'];
$text2  = $_POST['text2'];
$thapp2 = $_POST['thapp2'];
$tenable2 = $_POST['tenable2'];
$tnotes2 = $_POST['tnotes2'];
    
    
$userObj->getContactId();

$userObj->whoLoggedIn();

$userObj->getMyUser($userId);


//$contactValue = compact("userId","fname", "sname", "tenable2",  "job", "email", "telephone", "mobile", "tfax2", "tswi2", "text2", "tnotes2",  "thapp2");

//print_r($contactValue);
//&& isset($job) && isset($telephone) && isset ($tfax2) && isset ($tswi2) && isset ($text2) && isset ($thapp2) && isset ($tenable2) && isset ($tnotes2)
if (isset($_REQUEST['checkboxesIds']) && isset($_REQUEST['checkboxesIdsUnchecked']) && isset($fname) && isset($sname) && isset($email) && isset($job) && isset($telephone)
         && isset($mobile) && isset ($tfax2) && isset ($tswi2) && isset ($text2) && isset ($thapp2) && isset ($tenable2) && isset ($tnotes2)){
    
    //update/delete/insert new panel
    $checkbox = $_REQUEST['checkboxesIds'];
    $uncheckedbox =   $_REQUEST['checkboxesIdsUnchecked'];
    
    echo $checkbox;
    
    foreach($checkbox as $value ) {
      $allcheck.=$value.' ';
    }

    foreach($uncheckedbox as $uncheckedvalue){

         $allnotchecked.=$uncheckedvalue.' ';
    }
          
  
    $userObj->replaceUserPanelAjax($checkbox, $uncheckedbox, $userId, $fname, $sname, $email, $job, $telephone,$mobile, $tfax2, $tswi2, $text2, $thapp2, $tenable2, $tnotes2);
 
}
 
 elseif (!isset($_REQUEST['checkboxesIds']) && isset($fname) && isset($sname) && isset($email) && isset($job)
        && isset($telephone) && isset ($tfax2) && isset ($tswi2) && isset ($text2) && isset ($thapp2) && isset ($tenable2) && isset ($tnotes2)){
     //update/delete panel
    $userObj->updateUserPanelAjax($userId,$fname, $sname, $email);
}
    
   

  
  ?>