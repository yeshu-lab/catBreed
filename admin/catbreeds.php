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
   
   
   $breedname = $_POST['breedname'];
   $url = $_POST['url'];
   $stockbalance = $_POST['url'];
   
     $sql="INSERT INTO  catbreeds (breedname, url)
     VALUES('$breedname', '$url')";
      
     if(mysqli_query($conn,$sql))
     {
        $message= "Cat Bread record inserted successfully.";
        $error="";
      } 
     else
      {
        $error= "ERROR: Could not able to be saveed Cat Breed data" . mysqli_error($conn);
        $message="";
      }
 
     //mysqli_close($conn);
     
}

?>


<!DOCTYPE html>
<html>
   
   <head>
      <title>New Cat Breeds Entry</title>
      <link rel="stylesheet" type="text/css" href="styles.css" />
      <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
    
   </head>
   
   <body bgcolor = "#FFFFFF">
	
       
           
           <form  onSubmit = "" action = "" method = "post">
             
           <div class="message"><?php if($message!="") { echo $message; } ?></div>
           <div class="message"><?php if($error!="") { echo $error; } ?></div>
		    <table border="1" cellpadding="10" cellspacing="1" width="100%" align="center" >
       
			<tr class="tableheader">
			<td align="center" colspan="4">New Cat Breeds Recording</td>
			</tr>
			
            <tr >
            <td align="right">
            Cat Breed Name<span class="mandatory">*</span>
            </td>
            <td align="left">
			 <input type="text" name="breedname"   required class="input_control">
            </td>
            <td align="right">
            URL<span class="mandatory">*</span>
            </td>
            <td align="left">
			<input type="text" name="url"  required class="input_control">
            </td>
			</tr>
            <tr >
            <td colspan="2"></td>
			</tr>
            <tr class="tableheader">
			<td align="center" colspan="4"><input type="submit" name="Save" value="Save" class="btnSubmit"></td>
            </tr>
            <tr>
                <td colspan=4 align="center" style="font-size:12px;">
                
                    <table align= center border="1px" style="width:800px;line-height:20px">
                        <tr style="background:gray;color:white;"><td>Cat Breeds Code</td><td>Cat Breeds Name</td><td>url</td><td colspan="2">Action</td></tr>
                        <?php
                        $sql="SELECT breedid, breedname, active,url FROM catbreeds"; 
                        $result = mysqli_query($conn,$sql);
                         while( $rows = mysqli_fetch_assoc($result))
                         {
                        ?>
                         <tr style="width:600px;line-height:25px;font-size:12px">
                             <td><?php echo $rows['breedid']; ?> </td>
                             <td><?php echo $rows['breedname']; ?> </td>
                             <td><?php echo $rows['url']; ?> </td>
                             <td><a href="catbreedsupdate.php?mode=update&id=<?php $rows['breedid'];?>"> Change</a></td>
                             <?php
                             if($rows['active']==1)
                              {
                             ?>
                             <td><a href="catbreedsupdate.php?mode=delete&id=<?php $rows['breedid'];?>"> Delete</a></td>
                            <?php
                              }
                              else 
                              {
                            ?>
                              <td><a href="catbreedsupdate.php?mode=activate&id=<?php $rows['breedid'];?>"> Activate</a></td>     
                              
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