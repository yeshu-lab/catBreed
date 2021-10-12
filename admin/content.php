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
   
   
   $breedid = $_POST['breedid'];
   $catid = $_POST['catid'];
   $paragraph = $_POST['paragraph'];
   
     $sql="INSERT INTO  content (breedid, catid, paragraph)
     VALUES('$breedid', '$catid', '$paragraph')";
      
     if(mysqli_query($conn,$sql))
     {
        $message= "Conten/paragraph record inserted successfully.";
        $error="";
      } 
     else
      {
        $error= "ERROR: Could not able to save Conten/paragraph record " . mysqli_error($conn);
        $message="";
      }
 
     //mysqli_close($conn);
     
}

?>


<!DOCTYPE html>
<html>
   
   <head>
      <title>New Cat Breeds content Entry</title>
      <link rel="stylesheet" type="text/css" href="styles.css" />
      <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
      <script>
       
      function setSelectedBreedToHidden() {
           
           var objComboId = document.getElementById('breeds');
           var comboText = objComboId.options[objComboId.options.selectedIndex].text;
           var comboValue = objComboId.options[objComboId.options.selectedIndex].value;
           var textBoxObj = document.getElementById('breedname');
           var hiddenBoxObj = document.getElementById('breedid');
           hiddenBoxObj.value=comboValue;
           
           
        }

        function setSelectedInfCatToHidden() {
           
           var objComboId = document.getElementById('category');
           var comboText = objComboId.options[objComboId.options.selectedIndex].text;
           var comboValue = objComboId.options[objComboId.options.selectedIndex].value;
           var hiddenBoxObj = document.getElementById('catid');
           hiddenBoxObj.value=comboValue;
           
           
        }
        
   </script>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
       
           
           <form  onSubmit = "" action = "" method = "post">
             
           <div class="message"><?php if($message!="") { echo $message; } ?></div>
           <div class="message"><?php if($error!="") { echo $error; } ?></div>
		    <table border="1" cellpadding="10" cellspacing="1" width="100%" align="center" >
       
			<tr class="tableheader">
			<td align="center" colspan="4">New Cat Breeds Content Entry</td>
			</tr>
            <tr>
            <td align="right">
            Cat Breeds<span class="mandatory">*</span>
            </td>
            <td colspan=4 align="lest" style="font-size:12px;">
                <select name="breeds" id="breeds" required style=" width:400px;height:30px;" onchange="setSelectedBreedToHidden()">
                <option value="" align="center" style="color:gray;">- - - - - - - - - - - - - - - -  - select a Cat Bread  - - - - - - - - - - - -</option>
                   <?php
                        $sql="SELECT breedid, breedname  FROM catbreeds"; 
                        $result = mysqli_query($conn,$sql);
                         while( $rows = mysqli_fetch_assoc($result))
                         {
                    ?>
                        <option value="<?php echo $rows['breedid']; ?>"><?php echo $rows['breedname']; ?></option>
                        
                  <?php 
                         }
                        
                  ?>
                </select>
            </td>     
            </tr>
            <tr>
            <td align="right">
            Info Category<span class="mandatory">*</span>
            </td>
            <td colspan=4 align="left" style="font-size:12px;">
                <select name="category" required id="category" style=" width:400px;height:30px;" onchange="setSelectedInfCatToHidden()">
                <option value="" align="center" style="color:gray;">- - - - - - - - - - - - - -  select a Cat Bread Info Category  - - - - - - - - -</option>
                   <?php
                        $sql="SELECT catagid, catagname  FROM infocategory"; 
                        $result = mysqli_query($conn,$sql);
                         while( $rows = mysqli_fetch_assoc($result))
                         {
                    ?>
                          <option value="<?php echo $rows['catagid']; ?>"><?php echo $rows['catagname']; ?></option>
                        
                    <?php 
                        }   
                    ?>
                </select>
            </td>     
            </tr>
            <tr>
            <td align="right">
            <input type="hidden" name="breedid" id="breedid">
            <input type="hidden" name="catid" id="catid">
            Content/Paragraph<span class="mandatory">*</span>
            </td>
            <td align="left">
            <textarea id="openion" name="paragraph" required rows="5" cols="105"> </textarea>
            <label>Is Bulleted</label><input type="checkbox" id="iscollected" name="iscollected" value="1"/>  
            </td>
            <tr >
            <td colspan="2"></td>
			</tr>
            <tr class="tableheader">
			<td align="center" colspan="4"><input type="submit" name="Save" value="Save" class="btnSubmit"></td>
            </tr>
            <tr>
                <td colspan=4 align="center" style="font-size:12px;">
                
                    <table align= center border="1px" style="width:800px;line-height:20px">
                        <tr style="background:gray;color:white;"><td>Content Code</td><td>Content Name</td><td>Is Bulleted</td><td colspan="2">Action</td></tr>
                        <?php
                        $sql="SELECT contentid,breedid,catid, paragraph, isbulleted FROM content"; 
                        $result = mysqli_query($conn,$sql);
                        $i=0;
                         while( $rows = mysqli_fetch_assoc($result))
                         {
                            $i++;
                        ?>
                         <tr style="width:600px;line-height:25px;font-size:12px">
                             <td><?php echo $rows['contentid']; ?> </td>
                             <td><?php echo $rows['breedid']."_".$rows['catid']."_paragraph_".$i; ?> </td>
                             <td>
                                 <?php
                                  if($rows['isbulleted']==0) 
                                      echo "Yes";
                                  else
                                      echo "No";                                     
                                ?> 
                             </td>
                             <td><a href="contentupdate.php?mode=update&id=<?php $rows['contentid'];?>"> Change</a></td>
                             <td><a href="contentupdate.php?mode=delete&id=<?php $rows['contentid'];?>"> Delete</a></td>
                            
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