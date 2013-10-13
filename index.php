 <?php
 
include("views/header/header.php");

echo '<link href="pro_dropdown_2.css" rel="stylesheet" type="text/css">';
  
echo '<link href="customer_home_page.css" rel="stylesheet" type="text/css">';

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

$pgtitle = ' | Dashboard';

include 'ssi/config.php';

$hpnty = "1";

include 'ssi/popup.php';
      
     
 if ($login->isUserLoggedIn()) { 
     
    $authlog = 1;
    
   include("views/login/logged_in.php"); 
    
    include 'ssi/header.php';

    include 'ssi/getuser.php';
 
         //  include 'ssi/menu.php';
   include 'ssi/menu1.php';
    
 if ($customer5 == 0 ){ // members 
       
    
    ?>
    <table width="100%">
      <tr>
        <td width="100%">
          <table>
            <tr>
              <td><a href="index.php">Home</a></td>
              <td>-</td>
              <td>Dashboard</td>
            </tr>
          </table>
        </td>
        <td width="210">
            <p style="margin-bottom:0; margin-top:0;">
                <img src="images/efar_site_r5_c2.png" align="right"></p>
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td valign="top" width="90%">
          <table width="100%">
              <tr>
                <td valign = "top">
                  <?php 
                    include 'ssi/dash_tasks.php'; 
                  ?>
                </td>
              </tr>
            <tr>
              <td valign="top">
                <?php 
                include 'ssi/dash_ims.php'; 
                ?>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <?php 
                  include 'ssi/dash_cms.php'; 
                ?>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <?php 
                include 'ssi/dash_monitor.php'; 
                ?>
              </td>
            </tr>
          </table>
        </td>
        <td valign="top" width="10%">
          <table width="100%">
            <tr>
              <td valign="top">
                <?php 
                include 'ssi/dash_alerts.php'; 
                ?>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <?php 
                include 'ssi/dash_tech.php'; 
                ?>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <?php 
                include 'ssi/dash_info.php'; 
                ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <?php
    } 
    
     
else {
       echo '<p style="margin-left/*\**/: 1200px\9; margin-top:0;">
                <img src="images/efar_site_r5_c2.png" align="right"></p>'; 
        
                
        $panelObj = new efarCMS($db);
  
        $panelArray =  $panelObj->selectPanelName();     
        
              
     foreach($panelArray as $panel){
        
          $panel1 = $panel['name'];
        
       if($panel1 == 'orders'){
           
            echo '<div id="orders" class=ui-widget-content>';
              include 'ssi/dash_orders.php';  
            echo  '</div>';
       
        }
       elseif($panel1 == 'quotes'){
           
           echo '<div id="quotes">';
            include 'ssi/dash_quotes.php';
            //  include_once 'mysalesdb.php';
      echo  '</div>';
       
      }
       elseif($panel1 == 'cms'){
           
          echo '<div id="cms">';
            include 'ssi/dash_cms.php'; 
             //include_once 'mycmsdb.php';
       echo '</div>';
           
          
       }
       elseif($panel1 == 'incidents'){
            
           echo '<div id="ims">';
           include 'ssi/dash_ims.php'; 
           //include_once 'myimsdb.php';
      echo '</div>';
        
           
       }
       else{
           echo 'no selection';
       }
    }
    }
  }
  elseif($login->forgot_password()){
      
        include("views/login/email_processing.php");
  }
  
  elseif ($login->isEmailVerified()){ 
         
         
        $efar = new efarCMS($db);
        
        $myGenPass = $efar->generatePassword();
        
        $to = 'amahamoud@efar.co.uk';

        $subject = 'Your password';
                   //send to user email
        $efar->sendEmail($to, $subject,$myGenPass);
        //salt random geretated password
        $encryptedpassword = $efar->encryptPasswords($myGenPass);
        
         $userArray =  $login->processEmail();
 
      foreach ($userArray as $user){
            $userId = $user['id'];
            $userName = $user['user'];
      }
       
       //'customer','pportal','logstring','ip','pman','sman','cman','chman','dqsman','prdman','stman','devman','dept','director RoleId'
        $usersRow = array('password');
        $usersValue = compact("encryptedpassword");
                       
        $efar->update('users',$usersRow,$usersValue,'id',$userId);
      
        include 'process_email.php';
       
       
 }
    else{
           $authlog = 0;
           include("views/login/not_logged_in.php");
    }
 
    $a7as8fsuhgs = "1sdfsd";

     include 'ssi/footer.php';
?>
  </body>
</html>