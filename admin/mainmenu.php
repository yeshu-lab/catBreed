<?php
 
 $logedusername="";
 

//check if user authenticated and properly loged in  
session_start();
if(!isset($_SESSION['login_user']))
{
    
    header("location: index.php");
}
  
else
{
    
    $logedusername = $_SESSION['login_user'];
}
  
?>
<html>
   
   <head>
      <title>Dashboard</title>
      <link rel="stylesheet" type="text/css" href="styles.css" />
      <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
      
   </head>
   
   <body bgcolor = "#FFFFFF" style="border-color: orange;">
	
       <table border="1" cellpadding="0" cellspacing="0" width="100%" hieght="100%" align="center" >

       <tr >
       <td height="140" row span=2 style="width: 200px;"><img src="image/logo.png" width="130" hieght="130"></td>
       <td colspan="3" class = "welcome" height="140">My Cat Website Content Managment 
       
       </td>
      
       </tr>
        <tr>
           <td style="text-align: center;border: 0em;">
           <label style="color:gray;font-size:12;"><?php if($logedusername!=""){echo "You loged as ".$logedusername;}?></label> 
           </td>
           <td style="text-align: right;border: 0em;background-color:orange;">
           <form action = "logout.php" method = "post"><input type="submit" name="submit" value="Logout" ></form>
           </td>  
       </tr>
       
        <tr> 
           <td colspan="1" rowspan="8" id="menu" style="width: 200px;">
           <div style="width: 220px;">
           <ul>
            <li><a href="catbreeds.php" target="dashbord">Cat Breeds</a></li>
            <li><a href="cbicategory.php" target="dashbord">Cat Breeds Info Category</a></li>
            <li><a href="content.php" target="dashbord">Content</a></li>
            <li><a href="user.php" target="dashbord">Create New User Account</a></li>
            <li><a href="userupdate.php" target="dashbord">Change User Profile</a></li>
          </ul>
        </div>
           </td>
           <td rowspan="6" colspan="3" style="font-size: 20px;  text-align: center;">  
		     <iframe src="defaultpage.html" width="1000" height="1050" style="border:none;" name="dashbord">
            </iframe>
           </td>
        </tr> 
      </table>	            
   </body>
</html>