<?php
if (isset($_POST['title'])){
$conn = new mysqli("", "", "", "");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

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
$available = strip_tags($_POST['availalbe']);
$minimum = strip_tags($_POST['minimum']);
$view = strip_tags($_POST['view']);
$cooking = strip_tags($_POST['cooking']);
$heating = strip_tags($_POST['heating']);
$type = strip_tags($_POST['cooking']);
$amenities = strip_tags($_POST['amenities']);
$cooking = strip_tags($_POST['cooking']);
$lat = strip_tags($_POST['lat']);
$lng = strip_tags($_POST['lng']);


$sql = "INSERT INTO listings (Name, Price, Sleeps, Town, Bedrooms, Baths, Address, email, realname, telephone, weburl, View, Cooking, Heating, Type, lat, lng, Desc)
VALUES ('$title', '$price', '$sleeps', '$area', '$bedrooms', '$baths', '$address', '$email', '$name', '$phone', '$website', '$lat', '$lng', '$desc')";
?>
<?php
    if ($conn->query($sql) === TRUE) {
    echo "AD Posted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/style.css">
 <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
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
<li><a href="/login.php">My Account</a></li>
<li><a href="/classifieds/search.php">Search</a></li>
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
<form method="post" action="/classifieds/place2.php">
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
Latitude: <input type="text" id="lat" onchange="latlng()" name="lat" /><br />

Longitude: <input type="text" id="lng" onchange="latlng()" name="lng" /><br />

    
    </div>
    <div class="side-bar">
    Post Ad<br />
<br />

<input type="submit" style="width: 80%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 8px;" value="Post AD"></center>
    </div>
    </form>
    
</body>
</html>
