<?php
session_start();

	$user = $_SESSION['username'];
    $query = "SELECT * FROM `wishlist` WHERE user='$user'";
    $search_result = filterTable($query);


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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/style.css">
<title>My ParrySound Wishlist</title>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

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
            <h1>My Wishlist</h1>
            </div>
<br />

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <div class="title">
                <p>  
                
                
                
                    <h6>ID: <?php echo $row['ad_id'];?></h6>
                    <img height="auto" width="150px" style="float: right; margin-top: -55px;" src="/classifieds/listing<?php echo $row['ad_id']; ?>.jpg" />
                    <a href="/classifieds/full.php?id=<?php echo $row['ad_id'];?>">
                    
                    <button style="width: 13%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 8px;">View Ad</button></a>
                     &nbsp; &nbsp; &nbsp; <br /><br />


<form action="/classifieds/wishlist_delete.php?id=<?php echo $row['id']; ?>" method="post">
                     <input type="submit" value="Remove From Wishlist" name="submit" style="width: 20%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 8px;"/>
                     </form>
                    </p>
         </div>
         
<br />


                <?php endwhile;?>
                <br />


            <footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
            </div>
        </form>



</div>
<script>
var screenHeight = window.screen.availHeight;
document.getElementById('left-sidebar').style.height = screenHeight + "px";
</script> 
<br />

</body>
</html>
