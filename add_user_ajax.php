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
            
            
 
        
        </head>
  
  <body>
    <?php

require_once("config/db.php");
include 'ssi/menu1.php';
// class autoloader function, this includes all the classes that are needed by the script
// you can remove this stuff if you want to include your files manually
function autoload($class){
    require('classes/' . $class . '.class.php');
}

// automatically loads all needed classes, when they are needed
spl_autoload_register("autoload");
//create a database connection
$db    = new Database();

$login = new Login($db);

$userObj = new efarCMS($db);

$userId = $_REQUEST['userId'];


//get user info from contacts
$userArray = $userObj->getMyUser($userId);

    foreach ($userArray as $user){ 
        $fname = $user['fname'];
        $sname = $user['sname'];
        $email = $user['email'];
        $job = $user['job'];
        $telephone= $user['tel'];
        $mobile =  $user['mob'];
        $tfax2  = $user['fax'];
        $tswi2 = $user['switch'];
        $text2  = $user['ext'];
        $thapp2 = $user['happ'];
        $tenable2 = $user['enabled'];
        $tnotes2 = $user['note'];
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

<script src="views/js/checkboxFunctions.js"></script>

</head>
    
   <body>
 
       <table id="ac1c0" border="0" cellpadding="3" cellspacing="0" width="100%">
           
              <form action="" method="post" id="register-form" novalidate="novalidate">
            
                <input type='hidden' id="userId" name='userId' value="<?php echo $userId ?>" />
			  
              <tr>
                <td>First Name:</td>
                <td>
                   
                    <input type="text" id ="fname" name="fname" id="fname" size="32" maxlength="32"  size="30" value="<?php echo $fname ?>"/>
                    <br/><div id="fname_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Surname:</td>
                <td>
                   <input type="text" id ="sname" name="sname"  size="32" maxlength="32" value="<?php echo $sname ?>" />
                   <br/><div id="sname_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Email:</td>
                <td style="border:none; padding:0; margin:0;"> 
                 <input type="email" required id="email" name="email"  size="32" maxlength="32" value="<?php echo $email ?>" />
                 <br/><div id="email_result"></div><br/>
                </td>
               </tr>
              
          <tr>
                <td>Shown Panels:</td>
                <td>
                  
                    <?php
     
     
    $panelArray = $userObj->selectPanels();
    
    $userPanelArray  = $userObj->checkUserPanel(); 
                    
     foreach ($panelArray as $panel) {

        $panelsId = $panel['panelId'];
        $panelsName = $panel['name'];

        $myinput .= '<input ';

        foreach ($userPanelArray as $userPanel) {

            $userPanelId = $userPanel['panelId'];

            if ($panelsId == $userPanelId) {
              $myinput .= 'checked ';
            }

        }

   
      $myinput.= 'type="checkbox" id="checkbox-1-1" class="regular-checkbox" name="mycheckboxes[]" value="'.$panelsId.'"  /> ';
      $myinput.= '<label>'.$panelsName.'</label>';
     

    }
        echo  '<div id="show">';
        echo $myinput;
        echo '</div>
        <br/><div id="panel_result"></div><br/>';
      ?>
         </td>
              </tr>
                
                  <tr>
                <td>Job Title:</td>
                <td><input type="text" name="job" id="job"  size="30" value="<?php echo $job ; ?>" />
                      
                 <br/><div id="job_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Telephone:</td>
                <td><input type="text" name="telephone" id="telephone" size="30" value="<?php echo $telephone ?>" />
                    <br/><div id="telephone_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Mobile:</td>
                <td><input type="text" name="mobile" id="mobile" size="30" value="<?php echo $mobile ?>" />
                 <br/><div id="fname_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Fax:</td>
                <td><input type="text" name="tfax2" id="tfax2"  size="30" value="<?php echo $tfax2 ?>" />
                 <br/><div id="tfax2_result"></div><br/>
                </td>
              </tr>
              <tr>
                <td>Switchboard:</td>
                <td><input type="text" name="tswi2" id="tswi2"  size="30" value="<?php echo $tswi2  ?>" />
                 <br/><div id="tswi2_result"></div><br/>
                </td>
              </tr>
              <tr>
                <td>Extension:</td>
                <td><input type="text" name="text2" id="text2" size="30" value="<?php echo $text2  ?>" />
                 <br/><div id="text2_result"></div><br/>
                </td>
              </tr>
              
                  
                <tr>
                  <td>Authorised Support:</td>
                   <td><select name="thapp2" id="thapp2" >
                      <option value="0" >No</option>
                      <option value="1">Yes</option>
                      </select>
                        <br/><div id="thapp2_result">This is to enable users to log calls</div><br/>
                  </td>                
                </tr>

            <tr>
                  <td>Enabled:</td>
                <td><select name="tenable2" id ="tenable2">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                     <br/><div id="tenable2_result"> </div><br/>
                  </td>                
             </tr>
                
              <tr>
                <td valign="top">Notes:</td>
                <td><textarea name="tnotes2" id="tnotes2" cols="30" rows="4" wrap="physical" value="<?php $tnotes2 ?>"> </textarea>
                  <br/><div id="tnotes2_result"></div><br/>
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
                  </td>
                <td width="100%"><img src="images/spacer.gif" width="1" height="1" />
                  </td>
              </tr>
              <tr>
                  <td colspan="2"><table>
                          <tr>
                              <td valign="middle">
                              <input type="submit" id="update" class="orangebutton" value="Update" align=""  name="update">    
                              </td>
                
                <td valign="middle">
                 <input type="submit" name="test" value="Go Back" class="orangebutton" onClick="history.back();return false;">
                </td>
                             <br/> <div id="result"></div>  
                             
                            
                             <br/>
                          </tr>
                      </table>
                  </td>
              </tr>
              </form>
            </table>
  <?php include 'ssi/tab_bottom.php'; ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     
                
    
        	
    
              
