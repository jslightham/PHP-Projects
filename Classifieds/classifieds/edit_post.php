<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

?>
<?php
if (isset($_SESSION['id'])) {
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
$adToEdit = strip_tags($_POST['adToEdit']);
$user = $_SESSION['username'];

$sql = "UPDATE listings 
SET Name = '$title', Price = '$price', Sleeps = '$sleeps', Town = '$area', Bedrooms = '$bedrooms', Baths = '$baths', Address = '$address', email = '$email', realname = '$name', telephone = '$phone', weburl = '$website', lat = '$lat', lng = '$lng', Amenities = '$amenities', View = '$view', Avail = '$available', Minimum = '$minimum', Cooking = '$cooking', Heating = '$heating', Descri = '$desc', Type = '$type' WHERE id = '$adToEdit'";
?>
<?php
    if ($conn->query($sql) === TRUE) {
    echo "AD Edited";
	$email_to = "info@myparrysound.com";
 
    $email_subject = "Your Listing was edited - myparrysound.com";

    $email_message .= "Hello, ".($name). "\n";
 
    $email_message .= "This is an automated message, your listing has been edited. Not you? Please reply to this email and click this link, it will no longer be editable: www.myparrysound.com/classifieds/recover-listing.php?id=".($adToEdit)." and change your password. We will get back to you as soon as possible. "."\n";
	
 $email_message .= "Please make a note of your AD Id and Title, as you will need them to go on with the recovery process.  They are as follows:"."\n";
 $email_message .= "\n"."AD ID: ".($adToEdit)."\n";
 $email_message .= "Ad Title: ".($title)."\n";
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
window.location.href = 'http://myparrysound.com/classifieds/full.php?id=<?php echo $_POST['adToEdit']; ?>';
</script>
        <?php
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
}else{
		?>
        <script type="text/javascript">
window.location.href = 'http://myparrysound.com/login.php';
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
<div class="nav"> </div>

<div class="slider">
<span id="slider">
</span>
<div class="content">
<div class="image">
<center>
<h1>Your Listing Was Edited. Post another Below:</h1>
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
    </form>
    <br />
<br />

<footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
</body>
</html>
