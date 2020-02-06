<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
	$sleepsSearch = $_POST['sleepsSearch'];
    // search in all table columns
    // using concat mysql function
	if (empty($_POST['sleepsSearch'])){
		$query = "SELECT * FROM `listings` WHERE CONCAT(`id`, `Name`, `Town`, `Descri`, `View`, `Amenities`) LIKE '%".$valueToSearch."%'";
		$search_result = filterTable($query);
	}else{
	$query = "SELECT * FROM `listings` WHERE CONCAT(`id`, `Name`, `Town`, `Descri`, `View`, `Amenities`) LIKE '%".$valueToSearch."%' AND sleeps = '$sleepsSearch'";
    $search_result = filterTable($query);
	}
}
 else {
    $query = "SELECT * FROM `listings`";
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
<link rel="stylesheet" href="/style.css">
<title>Parry Sound Cottage Rentals - MyParrysound.com</title>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
.view-left{
	display: inline-block;
	width: 25%;	
	vertical-align: center;
}
.view-right{
	display: inline-block;
	width: 70%;	
	
}
.grey{
	color: grey;	
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



            <br><br>
            

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <center>
                <div class="title" style="text-align: left;" >
                <div class="view-left">
                <a href="/classifieds/full.php?id=<?php echo $row['id']; ?>">
                <img src="/classifieds/listing<?php echo $row['id']; ?>.jpg" width="150px" height="auto"/></a></div>
                <div class="view-right">
                <h3 style="line-spacing: 15%"><?php echo $row['Name']; ?> (<?php echo $row['DatePosted'];?>)</h3><span style="text-align: right;">$<?php echo $row['Price'];?>/week </span>
<br />

                Vacation Rental in <?php echo $row['Town'];?><br />
				<span class="grey">
                <?php echo $row['Sleeps'];?> Sleeps, <?php echo $row['Bedrooms'];?> Bedrooms, Baths <?php echo $row['Baths'];?></span><br /><a href="/classifieds/full.php?id=<?php echo $row['id']; ?>">See More</a>

                </div>
                </div></center><br />

                <?php endwhile;
				
				?>
            </table><br />


        

</div>
<footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
</body>
</html>
