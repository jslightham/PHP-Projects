<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$adId = htmlspecialchars($_GET["id"]);
if (isset($_SESSION['id'])) {
if (isset($_POST['submit'])){
$conn = new mysqli("", "", "", "");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = htmlspecialchars($_GET["id"]);
$user = $_SESSION['username'];

$sql = "DELETE FROM wishlist WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
    echo "Wishlist Item Removed";
	
	?>
        <script type="text/javascript">
window.location.href = 'http://myparrysound.com/classifieds/wishlist.php';
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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
<li>
<div class="dropdown">
    <button class="dropbtn" onClick="myFunction()">
<?php 
if (isset($_SESSION['id'])){
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

</div>
</center>
<hr />

    <br />

<footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
</body>
</html>
