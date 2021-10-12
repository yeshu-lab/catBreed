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
   
   
   $catagname = $_POST['catagname'];
   
     $sql="INSERT INTO  infocategory (catagname)
     VALUES('$catagname')";
      
     if(mysqli_query($conn,$sql))
     {
        $message= "Cat Info Category record inserted successfully.";
        $error="";
      } 
     else
      {
        $error= "ERROR: Could not able to save Cat Info Category record " . mysqli_error($conn);
        $message="";
      }
 
     //mysqli_close($conn);
     
}

?>


<!DOCTYPE html>
<html>
   
   <head>
      <title>New Cat Breeds info Category  Entry</title>
      <link rel="stylesheet" type="text/css" href="styles.css" />
      <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
    
   </head>
   
   <body bgcolor = "#FFFFFF">
	
       
           
           <form  onSubmit = "" action = "" method = "post">
             
           <div class="message"><?php if($message!="") { echo $message; } ?></div>
           <div class="message"><?php if($error!="") { echo $error; } ?></div>
		    <table border="1" cellpadding="10" cellspacing="1" width="100%" align="center" >
       
			<tr class="tableheader">
			<td align="center" colspan="4">New Cat Breeds info Category Recording</td>
			</tr>
			
            <tr >
            <td align="right">
            Cat Breed info Category<span class="mandatory">*</span>
            </td>
            <td align="left">
			 <input type="text" name="catagname"   required class="input_control">
            </td>
            
			</tr>
           
            <tr class="tableheader">
			<td align="center" colspan="4"><input type="submit" name="Save" value="Save" class="btnSubmit"></td>
            </tr>
            <tr>
                <td colspan=4 align="center" style="font-size:12px;">
                
                    <table align= center border="1px" style="width:800px;line-height:20px">
                        <tr style="background:gray;color:white;"><td>Breed Info Category Id</td><td>Breeds Info Category Name</td><td colspan="2">Action</td></tr>
                        <?php
                        $sql="SELECT catagid, catagname, active FROM infocategory"; 
                        $result = mysqli_query($conn,$sql);
                         while( $rows = mysqli_fetch_assoc($result))
                         {
                        ?>
                         <tr style="width:600px;line-height:25px;font-size:12px">
                             <td><?php echo $rows['catagid']; ?> </td>
                             <td><?php echo $rows['catagname']; ?> </td>
                             <td><a href="catbreedsupdate.php?mode=update&id=<?php $rows['catagid'];?>"> Change</a></td>
                             <?php
                             if($rows['active']==1)
                              {
                             ?>
                             <td><a href="catbreedsupdate.php?mode=delete"> Delete</a></td>
                            <?php
                              }
                              else 
                              {
                            ?>
                              <td><a href="catbreedsupdate.php?mode=activate"> Activate</a></td>     
                              
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
   </body>
</html>