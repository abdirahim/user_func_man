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

    $fname  = $_POST['fname'];
    $sname  = $_POST['sname'];
    $email =  $_POST['email'];
    $job   =  $_POST['job'];
    $telephone= $_POST['telephone'];
    $mobile =  $_POST['mobile'];
    $tfax2  = $_POST['tfax2'];
    $tswi2 = $_POST['tswi2'];
    $text2  = $_POST['text2'];
    $thapp2 = $_POST['thapp2'];
    $tenable2 = $_POST['tenable2'];
    $tnotes2 = $_POST['tnotes2'];
    
     $fname  = addslashes ($_POST['fname']);
    $sname  = addslashes ($_POST['sname']);
    $email =  addslashes ($_POST['email']);
    $job   =  addslashes ($_POST['job']);
    $telephone=  addslashes ($_POST['telephone']);
    $mobile =  addslashes ($_POST['mobile']);
    $tfax2  = addslashes ($_POST['tfax2']);
    $tswi2 =  addslashes ($_POST['tswi2']);
    $text2  = addslashes ($_POST['text2']);
    $thapp2 = addslashes ($_POST['thapp2']);
    $tenable2 = addslashes ($_POST['tenable2']);
    $tnotes2 = addslashes ($_POST['tnotes2']);

   
if (empty($fname) || empty($sname) || empty($email)){
    
    die("Error: Mandatory fields needs to be filled");
    
}

if (is_numeric ($fname) || is_numeric($sname)) {
    
   die("Error: data type must not include any number");
   
}
// get contactId for logged in user
$contactId = $userObj->getContactId();

// get companyId from contacts 
$companyId = $userObj->getCompanyId($contactId);

$users = $userObj->getUsers($companyId);

$loggedUserArray = $userObj->whoLoggedIn();


foreach($loggedUserArray as $user){
           $loggedUserId = $user['id']; 
           $loggedUserCacti = $user['cactiuser'];
}

                        //company   fname    sname     enabled      job    email    tel   mob    fax   switch    ext   notes   happ
$contactRow = array('company', 'fname', 'sname',  'enabled',   'job', 'email', 'tel','mob', 'fax', 'switch','ext','notes','happ'  );
$contactValue = compact("companyId", "fname", "sname", "tenable2",  "job", "email", "telephone", "mobile", "tfax2", "tswi2", "text2", "tnotes2",  "thapp2");



$userObj->insert('contacts', $contactRow, $contactValue);
  
  
   
$lastInsertId = $userObj->returnLastInsertId(); //contact from contacts table
 /****** user data ***********/
  $ldap = ''; 
    $user_password_hash = 'user_password_hash';
      $loggedUserCacti; // initialised above
         $admin = '0';
             $customer='1';
                $pportal='0';
                    $logstring="0";
                     $ip="0";
                 $pman="0";
             $sman="0";
          $cman="0";
       $chman="0";
   $dqsman="0";
     $prdman="0";
        $stman="0";
           $devman="0";
              $dept="None";
                 $director="0";
                    $RoleId="0";
                  
                    // get random generated password
                    $mygenpass = $userObj->generatePassword();
                    
                    $to = 'amahamoud@efar.co.uk';
                    $subject = 'Your password';
                    
                    //send to user email
               $userObj->sendEmail($to, $subject,$mygenpass);
                    
           //salt random geretated password
          $encryptedpassword = $userObj->encryptPasswords($mygenpass);
          
    //'customer','pportal','logstring','ip','pman','sman','cman','chman','dqsman','prdman','stman','devman','dept','director RoleId'
       $usersRow = array('user','password','ldap','enabled',  'contact',     'cactiuser',    'admin','customer', 'pportal','logstring','ip','pman','sman','cman','chman','dqsman','prdman','stman','devman','dept','director', 'RoleId');
       $usersValue = compact("email","encryptedpassword","ldap","tenable2","lastInsertId","loggedUserCacti","admin","customer","pportal","logstring","ip","pman","sman","cman","chman","dqsman","prdman","stman","devman","dept","director", "RoleId");

$userObj->insert('users', $usersRow, $usersValue);

 ?>