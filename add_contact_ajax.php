
<?php 

include("views/header/header.php");

include 'ssi/header.php';

require_once("config/db.php");

include 'ssi/popup.php'; // JavaScript functions

include 'ssi/config.php';

include 'ssi/menu1.php';

include 'ssi/tab_top.php';

?>
<html>
    <head>
        <link href="customer_home_page.css" rel="stylesheet" type="text/css">
        
        <link href="pro_dropdown_2.css" rel="stylesheet" type="text/css">
        
       <script src="views/js/user_reg_func.js"></script>
        
    </head>


<?php 

$pgtitle =' | Contact Directory'; 

?>

    
 <table id="ac1c0" border="0" cellpadding="3" cellspacing="0" width="100%">
            
   <form action="" method="post">
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname" id="fname" value="" size="30">
                 <br/><div id="fname_result"></div><br/>
                </td>
             </tr>
              <tr>
                <td>Surname:</td>
                <td><input type="text" name="sname" id="sname"value="" size="30">
                 <br/><div id="sname_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Email:</td>
                <td> <input type='text' name='email' id="email" value='' size="30">
                 <br/><div id="email_result"></div><br/>
                </td>
              </tr>
              <tr>
                <td>Job Title:</td>
                <td><input type="text" name="job" id="job" value="" size="30">
                 <br/><div id="job_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Telephone:</td>
                <td><input type="text" name="telephone" id="telephone"value="" size="30"> 
                    <br/><div id="telephone_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Mobile:</td>
                <td><input type="text" name="mobile" id="mobile" value="" size="30">
                 <br/><div id="fname_result"> </div><br/>
                </td>
              </tr>
              <tr>
                <td>Fax:</td>
                <td><input type="text" name="tfax2" id="tfax2" value="" size="30">
                 <br/><div id="tfax2_result"></div><br/>
                </td>
              </tr>
              <tr>
                <td>Switchboard:</td>
                <td><input type="text" name="tswi2" id="tswi2" value="" size="30">
                 <br/><div id="tswi2_result"></div><br/>
                </td>
              </tr>
              <tr>
                <td>Extension:</td>
                <td><input type="text" name="text2" id="text2" value="" size="30">
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
                <td><textarea name="tnotes2" id="tnotes2" cols="30" rows="4" wrap="physical"></textarea>
                  <br/><div id="tnotes2_result"></div><br/>
                </td>
              </tr>
              <tr><td><img src="images/spacer.gif" width="158" height="3" /></td><td width="100%"><img src="images/spacer.gif" width="1" height="1" /></td></tr>
              <tr>
                  <td colspan="2"><table>
                          <tr>
                              <td valign="middle">
                              <input type="submit" id="update" class="orangebutton" value="Update" align=""  name="update">    
                              </td>
                
                <td valign="middle">
                 <input type="submit" name="test" value="Go Back" class="orangebutton" onClick="history.back();return false;">
                </td>
                             <br/> <div id="result">  </div>  
                             
                            
                             <br/>
                          </tr>
                      </table>
                  </td>
              </tr>
              </form>
            </table>
  <?php 
  
include 'ssi/tab_bottom.php'; 
 
include 'ssi/footer.php';

  ?>
  </body>
  </html>
       
        
     
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     
                
    
        	
    
              
