<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if (isset($_SESSION['id'])){
if (isset($_POST['title'])){
$conn = new mysqli("", "", "", "");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user_email = $_SESSION['user_email'];
$title = strip_tags($_POST['title']);
$price = strip_tags($_POST['price']);
$baths = strip_tags($_POST['baths']);
$sleeps = strip_tags($_POST['sleeps']);
$bedrooms = strip_tags($_POST['bedrooms']);
$desc = strip_tags($_POST['desc']);
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$website = strip_tags($_POST['website']);
$phone = strip_tags($_POST['phone']);    
$type = strip_tags($_POST['type']);
$area = strip_tags($_POST['area']);
$address = strip_tags($_POST['address']);
$available = strip_tags($_POST['available']);
$minimum = strip_tags($_POST['minimum']);
$view = strip_tags($_POST['view']);
$cooking = strip_tags($_POST['cooking']);
$heating = strip_tags($_POST['heating']);
$type = strip_tags($_POST['type']);
$amenities = strip_tags($_POST['amenities']);
$cooking = strip_tags($_POST['cooking']);
$lat = strip_tags($_POST['lat']);
$lng = strip_tags($_POST['lng']);
$username = $_SESSION['username'];
$date = date("Y/m/d");

$sql = "INSERT INTO listings (Name, Price, Sleeps, Town, Bedrooms, Baths, Address, email, realname, telephone, weburl, lat, lng, Amenities, View, Avail, Minimum, Cooking, Heating, Descri, username, Type, DatePosted)
VALUES ('$title', '$price', '$sleeps', '$area', '$bedrooms', '$baths', '$address', '$email', '$name', '$phone', '$website', '$lat', '$lng', '$amenities', '$view', '$available', '$minimum', '$cooking', '$heating', '$desc', '$username', '$type', '$date')";
?>
<?php
    if ($conn->query($sql) === TRUE) {
    echo "AD Posted";
	
	$email_to = "info@myparrysound.com";
 
    $email_subject = "New Listing at MyParrySound";

    $email_message .= "Hello, ".($name). "\n";
 
    $email_message .= "Thanks for posting a listing at www.myparrysound.com. Now that you have created a listing you will recieve inquires through our online form or by email. Posting another listing is free, you can edit the listing you have just posted by going to My Account > MyListings write down the info for your property, click on post listing. If you need any help listing a property ad please reply to this email."."\n";
	
 $email_message .= "Please make a note of your username and password, as you will need them in the future anytime that you logon in order to modify your listing or post new listings.  They are as follows:"."\n";
 $email_message .= "\n"."Username: ".($username)."\n";
 $email_message .= "Password: ".($password)."\n";
$email_message .= "Name: ".($name)."\n";
$email_message .= "Email: ".($email)."\n";	

$email_message .= "\n"."Sincerely,"."\n";

$email_message .= "Johnathon, Webmaster"."\n";
$email_message .= "www.myparrysound.com"."\n";

// create email headers
 
$headers = 'From: '.$email_to."\r\n".
 
'Reply-To: '.$email."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 

@mail($email, $email_subject, $email_message, $headers);  

	?>
   <script type="text/javascript">
window.location.href = 'http://myparrysound.com/classifieds/all_listings.php';
</script>
<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
}else{
	?>
   <script type="text/javascript">
window.location.href = 'http://myparrysound.com/classifieds/login.php';
</script>
    <?php
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/style.css">
 <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<title>My ParrySound Post Listing</title>
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


</div>



<div class="slider">
<span id="slider">
</span>
<div class="content">
<div class="image">
<center>
<h1>Your Picture will appear here. You can upload this once you have posted your ad. </h1>
</center>

</div>
<div class="title">
<form method="post" action="/classifieds/place.php">
<h1>Title: <input type="text" name="title"/></h2>
<strong>Id: TBD</strong> 
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
<th>$<input type="number" name="price" />/week</th>
<th><input type="number" name="baths" /></th>
<th><input type="number" name="sleeps" /></th>
<th><input type="number" name="bedrooms" /></th>
</tr>
</table>
</div>
</center>
<hr />
<h4>Description</h4>
<textarea name="desc"></textarea><br />
</div>

<div class="section">

<div class="col1">
<h4>Owner Information</h4>
Your Name: <input type="text" name="name" /><br />
E-Mail Address: <input type="text" name="email" /><br />
Website URL: <input type="text" name="website" /><br />
Telephone: <input type="number" name="phone" /><br />
AD Number: TBD<br />

</div>

<div class="col2">
<h4>Property Information</h4>
Date Posted: TBD<br />
Type of Property: <input type="text" name="type"><br />
Area: <input type="text" name="area" /><br />
Address: <input type="text" name="address" /><br />
When is it available?: <input type="text" name="available" /><br />
Minimum Booking: <input type="text" name="minimum" /><br />
View: <input type="text" name="view" /><br />
Cooking: <input type="text" name="cooking" /><br />
Heating: <input type="text" name="heating" /><br />



<h4></h4>
</div>
</div>

<div class="section">
<div class="col1">
<h4>Amenities</h4>
Separate each new line by a comma. E.x: Water Bottles, Towels. <strong>Do not put each on a new line, use a comma. </strong><br />

<textarea name="amenities"></textarea>​
</div>
<div class="col2">

</div>
</div>
<div class="section">
<h4>Map</h4>
Latitude: <input type="text" id="lat" onChange="latlng()" name="lat" /><br />

Longitude: <input type="text" id="lng" onChange="latlng()" name="lng" /><br />

    
    </div>
    <div class="side-bar">
    Post Ad<br />
    
<br />

<input type="submit" style="width: 80%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 8px;" value="Post AD"></center>
    </div>
    </form><br />

    <footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
</body>
</html>
