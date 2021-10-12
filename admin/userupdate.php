<?php
 
 $message="";
 $error="";
 $logedusername;
 $logeduserid;
 $username = "";
 $fname = "";
 $lname = "";
 $email = "";
 
 //check if user authenticated and properly loged in  
session_start();
if(!isset($_SESSION['login_user']))
{
    
    header("location: index.php");
}
  
else
{
    
    $logedusername = $_SESSION['login_user'];
    $logeduserid=$_SESSION['login_userid'];
}
 include("dbcon.php");
if(count($_POST)>0)
{
   
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
       
        $sql = "update user set username='$username', fname= '$fname', lname='$lname',email='$email', password='$password' where userid='$logeduserid'";
       
        if (mysqli_query($conn, $sql))
         {
            $message="User info updated successfully!";
            $error="";
            
         } 
         else 
         {
           $error= "Error: account creation failed: ". mysqli_error($conn);
           $message="";
         
        }
   
      
  mysqli_close($conn);
}
else
{
    
    $sql = "SELECT * FROM user WHERE userid = '$logeduserid'";
    $result = mysqli_query($conn,$sql); 
    $count = mysqli_num_rows($result);
    
    if($count ==1) 
    {
        
      $rows = mysqli_fetch_assoc($result);
      $username = $rows['username'];
      $fname = $rows['fname'];
      $lname = $rows['lname'];
      $email = $rows['email'];
      $password = $rows['password'];
     
  }
 
mysqli_close($conn);   
}
?>
<!DOCTYPE html>
<html>
   
   <head>
      <title>Update User Profile</title>
      <link rel="stylesheet" type="text/css" href="styles.css" />
      <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
      <script>
          
          // Function to check Whether both passwords
          // is same or not.
          function checkPassword(form) {
              password1 = form.password.value;
              password2 = form.Confirm_password.value;

                  
              if (password1 != password2) {
                  alert ("\nPassword did not match: Please try again...")
                  return false;
              }

              // If same return True.
              else{
                 
                  return true;
              }
          }
      </script>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
       <table border="0" cellpadding="10" cellspacing="0" width="100%" hieght="00%" align="center" >

      
        <tr> 
           <td></>
           <td rowspan="8" colspan="3" style="font-size: 20px;  text-align: center;"> 
           <form  onSubmit = "return checkPassword(this)" action = "" method = "post">   
           <div class="message"><?php if($message!="") { echo $message; } ?></div>
           <div class="error"><?php if($error!="") { echo $error; } ?></div>
		    <table border="0" cellpadding="10" cellspacing="1" width="550" align="center" >
       
			<tr class="tableheader">
			<td align="center" colspan="2">Update User Profile</td>
			</tr>
			<tr align="center">
            
			<td>
			<label >User Name<span class="mandatory">*</span></label>
            <input type="text" name="username" placeholder="" value=<?php echo $username?> required class="input_control">
            </td>
			</tr>
            <tr align="center">
            <td >
			<label >First Name<span class="mandatory">*</span></label>
            <input type="text" name="fname" placeholder=""  value=<?php echo $fname?>required class="input_control">
            </td>
			</tr>
            <tr align="center">
            <td >
			<label >Last Name <span class="mandatory">*</span></label>
            <input type="text" name="lname" placeholder="" value=<?php echo $lname?> required class="input_control">
            </td>
			</tr>
            <tr align="center">
            <td >
			<label >Email<span class="mandatory">*</span></label>
             <input type="email" name="email" placeholder="" value=<?php echo $email?> multiple required class="input_control">
            </td>
			</tr>
			<tr align="center">   
			<td >
			<label>Password<span class="mandatory">*</span></label>
            <input type="password" name="password" placeholder="" value=<?php echo $password?>required class="input_control">
            </td>
			</tr>
            <tr align="center">   
			<td >
			<label>Confirm Password<span class="mandatory">*</span></label>
            <input type="password" name="Confirm_password" placeholder="" value=<?php echo $password?>required class="input_control">
            </td>
			</tr>
			
            <tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="Save" value="Save" class="btnSubmit"></td>
            </tr>
           
		</table>           
      </form>
    </td>    
   </tr>
  </table>
 </body>
</html>