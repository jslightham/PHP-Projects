<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

$connect = mysqli_connect("", "", "", "");

$id = htmlspecialchars($_GET["id"]);

$sql = "SELECT * FROM listings WHERE id = '$id' LIMIT 1";

$query = mysqli_query($connect, $sql); //search database
	$row = mysqli_fetch_row($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/style.css">
 <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<title>My ParrySound Full Listing - ID: <?php echo $id ?></title>
<style>
body{
	background-color: #f2f2f2;
}

.image, .details, .title{
	width: 70%;
	background-color: #ffffff;	
}


</style>


</head>

<body>
<div class="nav">
<ul>
<li><img class="logo" src="/logo.png" height="90px"/></li>
<br style="line-height: 150%;"/>
<li>
<div class="dropdown">
   <div class="dropdown">
    
<?php 
if (isset($_SESSION['id'])){
	?>
    <button class="dropbtn" onClick="myFunction()">
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


<li><a href="/contact.php">Contact</a></li>
<li><a href="/classifieds/place.php">Place Listing</a></li>
<li><a href="/classifieds/view.php">View Listings</a></li>
<li><a href="/index.php">Home</a></li>
</ul>
</div>

<div class="search-container">
<div class="search">
<form class="search_form" action="/classifieds/view.php" method="post">
<input type="text" placeholder="Keywords" style="padding: 10px; width: 50%;" name="valueToSearch" /> <input type="number" name="sleepsSearch" style="padding: 10px; width: 20%" placeholder="Sleeps" /> <input type="submit" value="Search" name="search" style="width: 15%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 10px;" />
</form>
</div>
</div>


<div class="slider">
<span id="slider">
</span>
<div class="content">
<div class="image">
<center>
<img src="/classifieds/listing<?php echo $id ?>.jpg" width="50%" height="auto" />
</center>

</div>
<div class="title">
<h1><?php echo $row[1]; ?></h2>
<strong>Id: <?php echo $id ?></strong> 
<hr />
<center>
<div class="details">
<table align="center">
<tr>
<th>Price</th>
<th>Baths</th>
<th>Sleeps</th>
<th>Bedrooms</th>
</tr>
<tr>
<th>$<?php echo $row[2]; ?>/week</th>
<th><?php echo $row[8]; ?></th>
<th><?php echo $row[3]; ?></th>
<th><?php echo $row[7]; ?></th>
</tr>
</table>
</div>
</center>
<hr />
<h4>Description</h4>
<?php echo $row[10]; ?><br />
</div>

<div class="section">

<div class="col1">
<h4>Owner Information</h4>
Name: <?php echo $row[14]; ?><br />
E-Mail Address: <?php echo $row[13]; ?><br />
Website URL: <?php echo $row[16]; ?><br />
Telephone: <?php echo $row[15]; ?><br />
AD Number: <?php echo $id; ?><br />

</div>

<div class="col2">
<h4>Property Information</h4>
Date Posted: <?php echo $row[5]; ?><br />
Type of Property: <?php echo $row[11]; ?><br />
Area: <?php echo $row[4]; ?><br />
Address: <?php echo $row[12]; ?><br />
When is it available?: <?php echo $row[18]; ?><br />
Minimum Booking: <?php echo $row[19]; ?><br />
View: <?php echo $row[17]; ?><br />
Cooking: <?php echo $row[20]; ?><br />
Heating: <?php echo $row[21]; ?><br />



<h4></h4>
</div>
</div>

<div class="section">
<div class="col1">
<h4>Amenities</h4>
<ul id="result">

<script>
var am = <?php echo json_encode($row[23]); ?>;
var array = am.split(",");

var html = "";
for (var i =0; i < array.length; i++) {
    html += "<li>" + array[i]+ "</li>";
}
document.write(html)

function contact(){
	alert("Messaging is still in development, Please Email the owner directly! Thanks!")
}
</script>
</ul>​
</div>
<div class="col2">

</div>
</div>
<div class="section">

    <div id="map" style="width:100%;height:500px"></div>
    <script>
function initMap() {
        var myLatLng = {lat: <?php echo $row['24'] ?>, lng: <?php echo $row['25'] ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Listing'
        });
      }

    </script>
    <script async defere
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAs7eltBvOX2-vyFEBPZC2vyjohwzSnCTQ&callback=initMap">
    </script>
    </div>
    <div class="side-bar">
    From
	<h5 style="display: inline;">$<?php echo $row[2]; ?>/week</h5>
	<h4>Owner Information:</h4>
    <h5>Name: </h5><?php echo $row[14]; ?>
	<h5>Email: </h5><?php echo $row[13]; ?><br />
    <center>
    <form action="/classifieds/wishlist_ad.php" method="post">
    <input type="hidden" value="<?php echo $id; ?>" name="ad_id" />
    <input type="submit" value="Add To Wishlist" name="submit" style="width: 80%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 8px;" /><br /><br /></form>

<button style="width: 80%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 8px;" onclick="contact();">Contact Owner</button></center>
    </div>
    <script>
    if( $(this).scrollTop() > 100 ){
		console.log("test")	
	}
    </script>
    <br />

<footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
</body>
</html>
