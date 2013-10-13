<?php

include 'views/header/header.php';



$pgtitle = ' | User Administration';
    include 'ssi/config.php'; // rebuild URL with https protocol, print page title, link to stylesheets, link to JavaScript and jQuery plug-ins
    include 'ssi/popup.php'; // JavaScript functions
    include 'ssi/menu1.php';
    ?>
    
    <meta http-equiv="Content-Language" content="en-gb">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link href="pro_dropdown_2.css" rel="stylesheet" type="text/css">
            
            <script>
    
//      function showUser(str){
//        if (str=="")
//          {
//          document.getElementById("txtHint").innerHTML="";
//          return;
//          } 
//        if (window.XMLHttpRequest)
//          {// code for IE7+, Firefox, Chrome, Opera, Safari
//          xmlhttp=new XMLHttpRequest();
//          }
//        else
//          {// code for IE6, IE5
//          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//          }
//        xmlhttp.onreadystatechange=function()
//          {
//          if (xmlhttp.readyState==4 && xmlhttp.status==200)
//            {
//            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
//            }
//          }
//        xmlhttp.open("GET","index.php?q="+str,true);
//        xmlhttp.send();
//}


</script>
 
        
        </head>
  
  <body>
    <?php

require_once("config/db.php");
include 'ssi/menu1.php';
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

$userId = $_REQUEST['userId'];

            
$userArray = $userObj->getMyUser($userId);
              
     foreach ($userArray as $user) {
 
         $fname = $user['fname'];
         $sname = $user['sname'];
         $email = $user['email'];
         
         }
       
      include 'ssi/tab_top.php';  
         ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add_users</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../views/css/niceforms-default.css" />-->

<!--<script src="views/js/checkboxFunctions.js"></script>-->

</head>
    
   <body>
 
       <table id="ac1c0" border="0" cellpadding="3" cellspacing="0" width="100%">
           
               <form action="process_form.php" method="post">
            
                <input type='hidden' name='user_id' value="<?php echo $userId ?>" />
			  
              <tr>
                <td>First Name:</td>
                <td>
                    <input type="text" name="fname" id="email" size="32" maxlength="32"  size="30" value="<?php echo $fname ?>"/>
                </td>
              </tr>
              <tr>
                <td>Surname:</td>
                <td>
                   <input type="text" name="sname" id="password" size="32" maxlength="32" value="<?php echo $sname ?>" />
                </td>
              </tr>
              <tr>
                <td>Email:</td>
                <td style="border:none; padding:0; margin:0;"> 
                 <input type="text" name="email" id="password" size="32" maxlength="32" value="<?php echo $email ?>" />
                </td>
               </tr>
              
          <tr>
                <td>Shown Panels:</td>
                <td>
                  
                    <?php
     $userPanelArray  = $userObj->checkUserPanel(); 
      
    $panelArray = $userObj->selectPanels();
                    
     foreach ($panelArray as $panel) {

        $panelsId = $panel['panelId'];
        $panelsName = $panel['name'];

        $myinput .= '<input ';

        foreach ($userPanelArray as $userPanel) {

            $userPanelId = $userPanel['panelId'];

            if ($panelsId == $userPanelId) {
              $myinput .= 'checked';
            }

        }

     $myinput .= ' type="checkbox"  name="mycheckboxes[]" value="'.$panelsId.'"  /> '.$panelsName;

    }
    
    echo $myinput;
        
    
                    
                    
             
                    

    
         
         ?>
                    
                    
                <input type="submit" class="orangebutton" value="Update" align=""  name="update">    
                </td>
              
              </tr>
                
                <tr>
                 
                  <td>
                     <?php  
                          
                                  
                                  ?>
                  </td>
              </tr>
                
             <tr>
                 
                  <td>
                      <img src="images/spacer.gif" width="158" height="3" />
                  </td><td width="100%"><img src="images/spacer.gif" width="1" height="1" />
                  </td>
              </tr>
              <tr>
                  <td colspan="2"><table>
                          <tr>
                <td valign="middle">
                <input type="submit" class="orangebutton" value="submit"  name="B1">
                </td>
                <td valign="middle">
                 <input type="submit" name="test" value="Go Back" class="orangebutton" onClick="history.back();return false;">
                </td>
                             <br/>  <div id="myResponse">  </div><br/>
                          </tr>
                      </table>
                  </td>
              </tr>
              </form>
            </table>
  <?php include 'ssi/tab_bottom.php'; ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     
                
    
        	
    
              
