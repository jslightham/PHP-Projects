<?php
session_start();
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `listings` WHERE CONCAT(`id`, `Name`, `Town`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM listings ORDER BY RAND() LIMIT 3";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("", "", "", "");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Discover a large selection of Parry Sound Cottage Rentals, and Vacation Rentals. ">
<link rel="stylesheet" href="style.css">
<title>Parry Sound Cottage Rentals and Directory - myparrysound.com</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>

</style>
</head>

<body>
<div class="index">
<div class="slider">
<div class="Slides">


<div class="nav-index">
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  
  <img src="3.jpg" style="width:100%">
</div>

</div>
<div style="display: none;">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div><br />




<div class="featured-container">
<div class="under-image">
<br />

<h1 style="line-height: 25%;">My Parry Sound Vacation Rentals</h1>
<center><h2>Featured Listings</h2></center><br />



<center>
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>

                <div class="featured">
<a href="/classifieds/full.php?id=<?php echo $row['id']; ?>">
<center>
<img src="/classifieds/listing<?php echo $row['id']; ?>.jpg" width="300" height="200" style="padding: 10px;"/></center><br />

<?php echo $row['Name'];?></a> <strong>(<?php echo $row['DatePosted'];?>)</strong><br />

<span class="grey">
Vacation Rental in <?php echo $row['Town'];?><br />
<?php echo $row['Bedrooms'];?> Bedrooms, <?php echo $row['Sleeps'];?> Sleeps, <?php echo $row['Baths'];?> Baths, #<?php echo $row['id'];?>
</span>
</div>
                <?php endwhile;?>
                </center>
                <br />
                <hr />
</div>
</div>
<div class="under-image">
            
         <br />


         <div class="left-col1">

<center>
         <img src="parrysound.gif" alt="Map Of Parry Sound" width="50%"/>
         </center>
         </div>
         <div class="right-col2"><br /><br />


         <h1>About Parry Sound</h1>
         Just two hours north of Toronto, a bay in Georgian Bay. It is home to many deep bays and islands, home of the deepest natural freshwater port and has an area of 9, 322.80 square kilometers. Parry Sound is rich in culture, arts, and heritage. 
         </div>
        
      </div>   
      <br />

      <div class="areas">
      <hr />
      <h1>Areas</h1>
      

      <div class="col-index-2-1">
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Armour" />
      <input type="submit" class="link" value="Armour" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Brown" />
      <input type="submit" class="link" value="Brown" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Carling" />
      <input type="submit" class="link" value="Carling" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Hardy" />
      <input type="submit" class="link" value="Whitestone" name="Hardy"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Henvey" />
      <input type="submit" class="link" value="Henvey" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Kearney" />
      <input type="submit" class="link" value="Kearney" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Lount" />
      <input type="submit" class="link" value="Lount" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Magnetawan" />
      <input type="submit" class="link" value="Magnetawan" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="McDougall" />
      <input type="submit" class="link" value="McDougall" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="McMurrich" />
      <input type="submit" class="link" value="McMurrich" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Nipissing" />
      <input type="submit" class="link" value="Nipissing" name="search"/>
      </form><br />
<br />

      </div>
      <div class="col-index-2-2">
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Perry" />
      <input type="submit" class="link" value="Perry" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Pringle" />
      <input type="submit" class="link" value="Pringle" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Seguin" />
      <input type="submit" class="link" value="Seguin" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Strong" />
      <input type="submit" class="link" value="Strong" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Wallbridge" />
      <input type="submit" class="link" value="Wallbridge" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Whilson" />
      <input type="submit" class="link" value="Wilson" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Blair" />
      <input type="submit" class="link" value="Blair" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Callander" />
      <input type="submit" class="link" value="Callander" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="East Mills" />
      <input type="submit" class="link" value="East Mills" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Harrison" />
      <input type="submit" class="link" value="Harrison" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Joly" />
      <input type="submit" class="link" value="Joly" name="search"/>
      </form><br />
<br />

      </div>
      <div class="col-index-2-3">
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Laurier" />
      <input type="submit" class="link" value="Laurier" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Machar" />
      <input type="submit" class="link" value="Machar" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="McConkey" />
      <input type="submit" class="link" value="McConkey" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="McKellar" />
      <input type="submit" class="link" value="McKellar" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Mowat" />
      <input type="submit" class="link" value="Mowat" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Patterson" />
      <input type="submit" class="link" value="Patterson" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Patterson" />
      <input type="submit" class="link" value="Patterson" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Powassan" />
      <input type="submit" class="link" value="Powassan" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Ryerson" />
      <input type="submit" class="link" value="Ryerson" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Shawanaga" />
      <input type="submit" class="link" value="Shawanaga" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="The Archpelago" />
      <input type="submit" class="link" value="The Archpelago" name="search"/>
      </form>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="Whitestone" />
      <input type="submit" class="link" value="Whitestone" name="search"/>
      </form>
      <strong>
      <form action="/classifieds/view.php" method="post">
<input type="hidden" placeholder="Keywords" name="valueToSearch" value="" />
      <input type="submit" class="link" value="View All" name="search"/>
      </form></strong>
      </div>
    <br /><br />

<center><img src="cottagerentals.png" width="50%" height="auto" /></center><br />

      </div>
      <br />
<br />

      <footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
</div>

<br />
<br />


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</div><ul><div class="nav-index"><li><img class="logo" src="/logo.png" height="90px"/></li>
<br />
<div style="float: right;">
<li><a href="/index.php">Home</a></li>
<li><a href="/classifieds/view.php">View Listings</a></li>
<li><a href="/classifieds/place.php">Place Listing</a></li>
<li><a href="/contact.php">Contact</a></li>

<li>
<li>
<div class="dropdown">
    
<?php 
if (isset($_SESSION['id'])){
	?>
    <button class="dropbtn" onClick="myFunction()" style="background: rgba(151, 150, 150, 0.0);">
    <?php
	
echo $_SESSION['username'];
?>
 <i class="fa fa-caret-down" aria-hidden="true"></i>
</button>
    <div class="dropdown-content" id="myDropdown">
      <a href="/classifieds/myAccount.php" style="color: black;">Dashboard</a>
      <a href="/classifieds/messages.php" style="color: black;">Messages</a>
      <a href="/classifieds/all_listings.php" style="color: black;">My Ads</a>
      <a href="/classifieds/logout.php" style="color: black;">Logout</a>
    </div>
  </div>
  </li>
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<?php
}else{
?>
<li><a href="/classifieds/myAccount.php">My Account</a></li>
<?php
}
?>
</div>
<div class="search">
<h1>Find The Perfect Vacation Rental</h1>
<h4 style="color: white;">The #1 Choice For Vacation Rentals In Parry Sound</h4>
<form class="search_form" action="/classifieds/view.php" method="post">
<input type="text" placeholder="Keywords" style="padding: 10px; width: 50%;" name="valueToSearch" /> <input type="number" name="sleepsSearch" style="padding: 10px; width: 20%" placeholder="Sleeps" /> <input type="submit" value="Search" name="search" style="width: 25%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 10px;" />
</form>
</center>
</div>
</div>

</ul>
</div>

</div>



</div>




<br />

</div>
</body>
</html>
