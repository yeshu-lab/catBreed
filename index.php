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
  <form action="searchResult.php" method="post" > 
    <input type="text" name="search" id="myInput" placeholder="Search for cat breeds..." autocomplete="on"/> 
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
       
     ?>

        <li><a href="<?php echo $rows['url']; ?>?id=<?php echo $rows['breedid']; ?>"><?php echo $rows['breedname']; ?></a></li>
        
    <?php
    }
        mysqli_close($conn);   
     ?>
      </ul>
    </div>
  </div>
  <div id="rightbarContainer">
    <h2>Yeshi Cat Breesds Consultant</h2>
    <div class="rightbar">
      <h3>Mission</h3>
      <p class="news"> Our mission as cat breeds consultant is to deliver sufficient information to cat buyers and sellers by by updating new findings of researchers.
        Then help cat care givers to give proper caring based on the scientically approved characterstichs of cat breeds. 
     </p>
      <h3>Vision</h3>
      <p class="news"> Our vision is to make cat breeds research and deliver uptodate relevat information about characterstics, nutrition, problemm and similar specious specific information to the cat care givers.</p>
      <h3>Values</h3>
      <p class="news"> 
        <ul>
          <li>
            Cat's Health and Happiness
          </li>
          <li>
            Ethical professional Practices
          </li>
          <li>
            Quality Assurance and Control
          </li>
          <li>
            Education
          </li>
          <li>
            Innovation
          </li>
        </ul>
      </p>
    </div>
    
   
  </div>
  <div id="content">
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to Yeshi </h1>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cat Breeds Consultant</h1>
    
    <table>
      
      <tr><td><a href="Abyssinian.html"><img src="image/img_Abyssinian/Abyssinian5.jfif" height="115px" width="115px"/></a></td>
        <td><a href="AmericanBobtail.html"><img src="image/img_AmericanBobtail/AmericanBobtail9.jfif" height="115px" width="115px"/></a></td>
        <td><a href="AmericanCurlKoster.html"><img src="image/img_AmericanCurlKoster/AmericanCurlKoster10.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>Abyssinian</td><td>American Bobtail</td><td>American Curl Koster</td></tr>
      <tr><td><a href="AmericanShorthair.html"><img src="image/img_AmericanShorthair/AmericanShorthair5.jfif" height="115px" width="115px"/></a></td>
        <td><a href="AmericanWirehair.html"><img src="image/img_AmericanWirehair/AmericanWirehair9.jfif" height="115px" width="115px"/></a></td>
        <td><a href="Balinese.html"><img src="image/img_Balinese/Balinese1.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>American Short hair</td><td>American Wire hair</td><td>Balinese</td></tr>
      <tr><td><a href="Bengals.html"><img src="image/img_Bengals/Bengals3.jfif" height="115px" width="115px"/></a></td>
        <td><a href="Birmans.html"><img src="image/img_Birmans/Birmans9.jfif" height="115px" width="115px"/></a></td>
        <td><a href="Bombay.html"><img src="image/img_Bombay/Bombay5.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>Bengals</td><td>Birmans</td><td>Bombay</td></tr>
      <tr><td><a href="BritishShorthair.html"><img src="image/img_BritishShorthair/BritishShorthair9.jfif" height="115px" width="115px"/></a></td>
        <td><a href="Burmese.html"><img src="image/img_Burmese/Burmese1.jfif" height="115px" width="115px"/></a></td>
        <td><a href="CaliforniaSpangledCat.html"><img src="image/img_CaliforniaSpangledCat/CaliforniaSpangledCat4.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>British Short hair</td><td>Burmese</td><td>California Spangled Cat</td></tr>
      <tr><td><a href="Chartreux.html"><img src="image/img_Chartreux/Chartreux8.jfif" height="115px" width="115px"/></a></td>
        <td><a href="ColorpointShorthair.html"><img src="image/img_ColorpointShorthair/ColorpointShorthair3.jfif" height="115px" width="115px"/></a></td>
        <td><a href="CornishRex.html"><img src="image/img_CornishRex/CornishRex7.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>Chartreux</td><td>ColorpointShorthair</td><td>CornishRex</td></tr>
      <tr><td><a href="Cymric.html"><img src="image/img_Cymric/Cymric4.jfif" height="115px" width="115px"/></a></td>
        <td><a href="DevonRex.html"><img src="image/img_DevonRex/DevonRex10.jfif" height="115px" width="115px"/></a></td>
        <td><a href="EgyptianMau.html"><img src="image/img_EgyptianMau/EgyptianMau7.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>Cymric</td><td>DevonRex</td><td>Egyptian Mau</td></tr>
      <tr><td><a href="EuropeanBurmese.html"><img src="image/img_EuropeanBurmese/EuropeanBurmese3.jfif" height="115px" width="115px"/></a></td>
        <td><a href="ExoticShorthair.html"><img src="image/img_ExoticShorthair/ExoticShorthair3.jfif" height="115px" width="115px"/></a></td>
        <td><a href="HavanaBrown.html"><img src="image/img_HavanaBrown/HavanaBrown6.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>European Burmese</td><td>Exotic Short hair</td><td>Havana Brown</td></tr>
      <tr><td><a href="Himalayan.html"><img src="image/img_Himalayan/Himalayan3.jfif" height="115px" width="115px"/></a></td>
        <td><a href="JapaneseBobtail.html"><img src="image/img_JapaneseBobtail/JapaneseBobtail2.jfif" height="115px" width="115px"/></a></td>
        <td><a href="Javanese.html"><img src="image/img_Javanese/Javanese1.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>Himalayan</td><td>Japanese Bob tail</td><td>Javanese</td></tr>
      <tr>
        <td><a href="Korat.html"><img src="image/img_Korat/Korat7.jfif" height="115px" width="115px"/></a></td>
        <td><a href="MaineCoon.html"><img src="image/img_MaineCoon/MaineCoon10.jfif" height="115px" width="115px"/></a></td>
        <td><a href="Manx.html"><img src="image/img_Manx/Manx4.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>Korat</td><td>Maine Coon</td><td>Manx</td></tr>
      <tr>
        <td><a href="Munchkin.html"><img src="image/img_Munchkin/Munchkin2.jfif" height="115px" width="115px"/></a></td>
        <td><a href="Nebelung.html"><img src="image/img_Nebelung/Nebelung3.jfif" height="115px" width="115px"/></a></td>
        <td><a href="TurkishAngora.html"><img src="image/img_TurkishAngora/TurkishAngora8.jfif" height="115px" width="115px"/></a></td>
      </tr>
      <tr><td>Munchkin</td><td>Nebelung</td><td>Turkish Angora</td></tr>
      
      
    </table>
  </div>
 
  <div id="footer"> <a href="#">Home</a> | <a href="aboutus.html">About US</a> | <a href="photogallery.html">Photo Gallery</a> | <a href="contactus.html">Contact US</a> <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&copy; 2021 Design by Yeshihareg Hailu
    
</div>
</body>
</html>
