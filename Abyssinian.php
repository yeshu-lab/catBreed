<?php
 $message="";
 $error="";
 $breedid="";
 $id="";
 if(isset($_GET['id']))
    $id = $_GET['id']; 
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
      <li><a href="index.html" id="current">Home</a></li>
      <li><a href="aboutus.html">About US</a></li>
      <li><a href="photogallery.html">Photo Gallery</a></li>
      <li><a href="contactus.html">Contact US</a></li>
    </ul>
  </div>
  <div id="leftbar">
    <h2>Cat Breeds</h2>
    <div id="menu">
      <ul>
      <?php
       $sql = "SELECT breedid, breedname, url FROM catbreeds WHERE active = 1";
       $result = mysqli_query($conn,$sql); 
      
       while( $rows = mysqli_fetch_assoc($result))
       {
         $breedid = $rows['breedid'];
         $breedname = $rows['breedname'];
         $url = $rows['url'];
         if($rows['breedid']== $id)
         {?>
             <li id="activenav"><a href="#"><?php echo $rows['breedname']; ?></a></li>
         
       <?php
         }
        else
       {
       ?>

        <li><a href="<?php echo $rows['url']; ?>?id=<?php echo $rows['breedid']; ?>"><?php echo $rows['breedname']; ?></a></li>
        
    <?php
       }
    }
        mysqli_close($conn); 
        ?>
      </ul>
    </div>
  </div>
  <div id="rightbarContainer">
    <h2>Abyssinian</h2>
    <div class="rightbar">
      <h1>HISTORY</h1>
      <p class="news"> 
        Though the Abyssinian is one of the oldest known breeds, their exact origins have always carried an air of mystery. For a number of years, it was popularly assumed they originated along the Nile river basin, and it’s easy to see why: One look at an Aby in a seated position is enough to see the easy parallels between the breed and the statues and depictions of cats in ancient Egypt. However, more recent genetic studies have shown the most convincing argument for their origins to be Southeast Asia and the coast of the Indian Ocean. 
      </p>
      <p>
        The oldest extant example of the cat that would become known as the Abyssinian is from the Leiden Zoological Museum in Holland, which has a taxidermied example that was purchased for the museum around 1834. That specimen is labeled “Patrie, domestica India”, giving further credence to the cat’s Southeast Asian origins.
      </p>
      <p>
        The name “Abyssinian” comes from Abyssinia (modern-day Ethiopia), from whence the cats who gave birth to the breed were brought to England after the Abyssinian War in the 1860s. Those first cats featured the trademark ticked coats but were otherwise markedly different from today’s Abys, with stockier bodies and shorter ears. Once they were settled in the U.K., cross-breeding with local cats eventually gave birth to the Abyssinian cat we know and love today.
      </p>
    </div>
    
   
  </div>
  <div id="content">
    <table>
      <tr>
        <td> <img src="image/img_Abyssinian/Abyssinian5.jfif" height="280px" width="250px"/></td>
      </tr>
      <tr>
        <td>Abyssinian </td>
      </tr>
    </table>
   <p></p>
    <h1>BEHAVIOR</h1>
   <p>
    Abyssinian cats are elegant, majestic, and fun to be around. These felines are intelligent, amiable, and affectionate with their owners. However, when faced with new surroundings and unfamiliar strangers, Abyssinians can get confused, shy, and even jealous around their pet parents.
    On the other hand, they do love being the center of attention, but only in their own comfort zones, among people they know.
    Regardless of the Abyssinian cat’s gender or age, it will demand constant attention and a close bond with its owner. If you’re looking for a calm, quiet, and independent feline pet, this is definitely not the breed for you.
   </p>
   <p>
    The Abyssinian is a demanding breed. And by demanding we don’t mean that it requires constant grooming. On the contrary! These furry pals have an extremely low tendency to shed and mat. They aren’t less allergenic than other cat breeds, but they are quite low maintenance. Of course, regular bathing and brushing are inevitable, but you won’t be buried in cat hair with this breed.
   </p>
   <p>However, they are demanding in terms of attention. The Abyssinian is among the most affectionate breeds out there. As such, it will never say no to spending quality bonding time with its pet parent. Sometimes, this behavior can come across as needy and clingy. They can’t be left home alone over longer periods of time as they constantly want to be around their family.</p>
   <p>
    Due to the fact that these kitties want constant attention from their owners, they feel the need to please their pet parents. Combined with their intelligence, this makes Abyssinians the perfect feline pets for families with active kids.
   </p>
   <h1>GROOMING</h1>
   <p>
    Abyssinians have a ticked coat, which makes them look much more like wildcats than your standard tabby. They don't shed much and require little grooming beyond their own personal beauty rituals.
   </p>
   <h1>HEALTH PROBLEMS</h1>
   <p>
    Unfortunately, the Abyssinian is not among the healthiest of feline breeds out there. Gingivitis, familial renal amyloidosis, hereditary retinal degeneration, urinary tract problems, and so forth are the most common health-related issues affecting the Abyssinian cat.
   </p>
   <p>Abyssinians are notoriously playful, amiable, and intelligent. Thus, regardless of their health problems, they are quite popular among feline pet parents. If you wish to make the most out of your time with your Abyssinian kitty, make its health your priority. Focus on crucial nutrition, spend as much time with your furball as it needs, and don’t ever miss a scheduled appointment with your vet.</p>
   <h1>NUTRITION</h1>
   <p>Due to their hyperactivity and moderately unstable health, they have special nutritional needs. Some Abyssinians may require additional supplements to their regular cat food diet.</p>
   <p>The breed requires special diets consisting mainly of high quality dry cat food. As such, it needs a lot of fresh water on a daily basis in order to avoid dehydration and other related health issues.</p>
   <p>A well-balanced diet and proper nutrition are essential for Abyssinian cats of all ages. Proteins and vitamins are vital for these kitties in order to keep them healthy and thriving.</p>
   
  </div>
  <div style="clear:both"> </div>
  <div id="footer"> <a href="index.html">Home</a> | <a href="aboutus.html">About US</a> | <a href="photogallery.html">Photo Gallery</a> | <a href="contactus.html">Contact US</a> <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&copy; 2021 Design by Yeshihareg Hailu
    
</div>
</body>
</html>
