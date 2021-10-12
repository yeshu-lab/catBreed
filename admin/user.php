<?php
 
 $message="";
 $error="";
 $logedusername;
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
 include("dbcon.php");
if(count($_POST)>0)
{
   
      $username = $_POST['username'];
      $sql = "SELECT userid FROM user WHERE username = '$username'";
      $result = mysqli_query($conn,$sql); 
      $count = mysqli_num_rows($result);
      
      if($count == 0) 
      {
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
       
        $email = $_POST['email'];
        $sql = "INSERT INTO user (username, fname, lname,email, password) VALUES ('$username', '$fname', '$lname','$email', '$password')";

        if (mysqli_query($conn, $sql))
         {
            $message="New user created successfully!";
            $error="";
            
         } 
         else 
         {
           $error= "Error: account creation failed: ". mysqli_error($conn);
           $message="";
         
        }
    }
    else 
      {
        $error = "This User is already exists.Please try an other user name.";
        $message="";
      }
      
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
   
   <head>
      <title>User Profile</title>
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
			<td align="center" colspan="2">Create New User Account</td>
			</tr>
			<tr align="center">
           
			<td>
			<label >User Name<span class="mandatory">*</span></label><input type="text" name="username" placeholder=""  required class="input_control"></td>
			</tr>
            <tr align="center">
            <td >
			<label >First Name<span class="mandatory">*</span></label><input type="text" name="fname" placeholder=""  required class="input_control"></td>
			</tr>
            <tr align="center">
            <td >
			<label >Last Name <span class="mandatory">*</span></label><input type="text" name="lname" placeholder=""  required class="input_control"></td>
			</tr>
            <tr align="center">
            <td >
			<label >Email<span class="mandatory">*</span></label><input type="email" name="email" placeholder=""  multiple required class="input_control"></td>
			</tr>
			<tr align="center">   
			<td >
			<label>Password<span class="mandatory">*</span></label><input type="password" name="password" placeholder="" required class="input_control"></td>
			</tr>
            <tr align="center">   
			<td >
			<label>Confirm Password<span class="mandatory">*</span></label><input type="password" name="Confirm_password" placeholder="" required class="input_control"></td>
			</tr>
			
            <tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="Save" value="Save" class="btnSubmit"></td>
            </tr>
            <tr>
                <td colspan=4 align="center" style="font-size:12px;">
                
                    <table align= center border="1px" style="width:800px;line-height:20px">
                        <tr style="background:gray;color:white;"><td>user Id</td><td>User Name</td><td>First Name</td><td>Last Name Name</td><td>Email</td><td>Action</td></tr>
                        <?php
                        $sql="SELECT userid, username, fname, lname,email,active FROM user"; 
                        $result = mysqli_query($conn,$sql);
                         while( $rows = mysqli_fetch_assoc($result))
                         {
                        ?>
                         <tr style="width:600px;line-height:25px;font-size:12px">
                             <td><?php echo $rows['userid']; ?> </td>
                             <td><?php echo $rows['username']; ?> </td>
                             <td><?php echo $rows['fname']; ?> </td>
                             <td><?php echo $rows['lname']; ?> </td>
                             <td><?php echo $rows['email']; ?> </td>
                             
                             <?php
                             if($rows['active']==1)
                              {
                             ?>
                             <td><a href="userupdate.php?mode=0&id=<?php $rows['userid'];?>"> Block</a></td>
                            <?php
                              }
                              else 
                              {
                            ?>
                              <td><a href="userupdate.php?mode=1&id=<?php $rows['userid'];?>"> Unblock</a></td>     
                              
                           <?php } ?>
                        </tr>
                        
                        <?php 
                        }
                        mysqli_close($conn); 
                        ?>
                    </table>
                </td>
            </tr>
		</table>           
      </form>
    </td>    
   </tr>
  </table>
 </body>
</html>