<?php
session_start();
if (isset($_SESSION['id'])){
$connect = mysqli_connect("", "", "", "");

 $uid = $_SESSION['id'];
    $user = $_SESSION['username']; 
	$sql = "SELECT * FROM members WHERE username = '$user' LIMIT 1";
	$query = mysqli_query($connect, $sql); 
	$row = mysqli_fetch_row($query);
	$username = $row[1];
	$password = $row[2];
	$email = $row[3];
	$name = $row[4];
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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/style.css">
 <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<title>My ParrySound - MyAccount</title>

<style>
body{
	background-color: #f2f2f2;
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
echo $username;
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

</div>


</div>


<div id="left-sidebar">
<ul><br />

  <li><center><a href="/classifieds/myAccount.php"><i class="fa fa-tachometer" aria-hidden="true" style="text-align: center;"></i>

  Dashboard</a></li></center><br />

  <li><center><a href="/classifieds/messages.php"><i class="fa fa-comments-o" aria-hidden="true" style="text-align: center;"></i>Messages</a></center></li>
  <li><a href="/classifieds/all_listings.php"><center><i class="fa fa-home" aria-hidden="true" style="text-align: center;"></i><br />
My Ads</a></center></li>
  <li><a href="/classifieds/wishlist.php"><center><i class="fa fa-heart" aria-hidden="true"></i><br />
My Wishlist</a></center></li>
</ul>
</div>


</div>


<div class="right-side">

<div class="title">

<h1>My Account</h2>
<strong>Username: <?php echo $username ?></strong> 
<hr />
<center>
<div class="details">
<table align="center">
<tr>
<th>Email</th>
<th>Name</th>
<th>Password</th>
</tr>
<tr>
<th><?php echo $row[3]; ?></th>
<th><?php echo $row[4]; ?></th>
<th><?php echo $row[2]; ?></th>
</tr>
</table>
</div>
</center>
</div>

<div class="section">

<h4>My Listings</h4>
From Here you can edit, delete, and upload photos for your ads:<br />

<a href="/classifieds/all_listings.php">Click to view all listings posted by <?php echo $username ?></a>
<br>
UID: <?php echo $uid; ?>
</div>

<div class="slider">
<span id="slider">
</span>
<div class="content">

<script>
var screenHeight = window.screen.availHeight;
document.getElementById('left-sidebar').style.height = screenHeight + "px";
</script>  <br />
  
<footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
</body>
</html>
