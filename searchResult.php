<?php
  include("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en-US" style="height: 100%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>My Cat</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  
<div id="container">
  
  <div id="banner"> <img src="image/Catmain3.jpg" height="250px" width="320px"/>  
  </div>
 
  <div id="bannerb">
    <p class="companyname">
      <img src="image/mycatlogo.jpg" height="100px" width="120px"/>
  </div>
  <form action="results.shtml" method="get" > 
    <input type="text" name="search" id="myInput" placeholder="Search for cat breeds.."/> 
    <input type="submit" name="form_submit" value="Search" /> 
  </form>
   
  <div id="navcontainer">
    <ul id="navlist">
      <li id="active"><a href="#" id="current">Home</a></li>
      <li><a href="aboutus.html">About US</a></li>
      <li><a href="photogallery.html" >Photo Gallery</a></li>
      <li><a href="contactus.html">Contact US</a></li>
    </ul>
  </div>
  <div  width="600">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <?php
       if($_POST['search']!='')
       {
       $criteria=$_POST['search'];
       $sql = $sql = "SELECT a.breedid, a.breedname, a.url, b.catagid, b.catagname,c.contentid, \n"
       ." c.isbulleted, c.paragraph from mycatdb.catbreeds as a inner join mycatdb.infocategory as b \n" 
       ." on a.breedid= b.breedid inner join mycatdb.content as c on b.catagid= c.catid and a.breedname \n"
       ." like '%$criteria%' or b.catagname like '%$criteria%' or c.paragraph like '%$criteria%' \n"
       . "ORDER by a.breedid,b.catagid,c.contentid";
      
       $result = mysqli_query($conn,$sql); 
       $rowNum=mysqli_num_rows($result);
       
       echo '<p><h2>' .$rowNum. 'results found</h2></p>';
       while( $rows = mysqli_fetch_assoc($result))
       {
         $breedid = $rows['breedid'];
         $breedname = $rows['breedname'];
         $infoCategory = $rows['catagname'];
         $content = $rows['paragraph'];
         $url = $rows['url'];
         echo '<h3>'. '<li><a href='.$url.'?id='.$breedid.'>'.$breedname.'</a></li>'. '</h3><br/>'. '<h4>'.$infoCategory.'</h4><br/><p>'. $content.'</p></br>'
         
     ?>

        
        
    <?php
    }
        mysqli_close($conn);  
   } 
     ?>
  </div>
  
    
   
  </div>
  <div id="content">
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to Yeshi </h1>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cat Breeds Consultant</h1>
    
    <table>
      
      <tr>
          <td></td>  
      </tr>
       
    </table>
  </div>
 
  <div id="footer"> <a href="#">Home</a> | <a href="aboutus.html">About US</a> | <a href="photogallery.html">Photo Gallery</a> | <a href="contactus.html">Contact US</a> <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&copy; 2021 Design by Yeshihareg Hailu
    
</div>
</body>
</html>
