<?php
session_start();
$uid = $_SESSION['id'];
    $user = $_SESSION['username']; 
    $query = "SELECT * FROM `listings` WHERE username = '$user'";
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
 <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/style.css">
<title>My ParrySound View Listings</title>
<style>
#left-sidebar{
	display: inline-block;	
	 background-color: #17323F;
}
#left-sidebar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 100px;
    background-color: #17323F;
	display: inline-block;	
}
#left-sidebar li{
    background-color: #17323F;
}
#left-sidebar li a {
    display: block;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
}

.right-side{
	display: inline-block;
	float: right;
	width: 90%;	
	margin-top: 15px;
	    
}

.fa fa-tachometer{
    color: #fff;
    text-shadow: 1px 1px 1px #ccc;
    font-size: 1.5em;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    cursor: pointer;
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 8px 14px;
	background-color: #17323F;
}

.container a:hover, .dropdown:hover .dropbtn {

}

.dropdown-content {
    display: none;
    position: absolute;
	right: 0;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.show {
    display: block;
}
i {
    color: #fff;
    text-shadow: 1px 1px 1px #ccc;
    font-size: 1.5em;
	text-align: center;
	padding-left: 0px;
}

  @media only screen and (min-width: 768px) {
    .hide-for-small {
      display: inherit !important;
    }

    .show-for-small {
      display: none !important;
    }
  }

  .headlines {
    text-align: start;
  }

  .headlines hr {
    border: solid #aaa;
    border-width: 2px 0 0;
    clear: both;
    //margin: 0.5em 0 0.5em;
    height: 0;
    box-sizing: content-box;
  }

  .headlines div.featured {
    border: 2px solid steelblue;
    background-color: whitesmoke;
    padding: 0.5em 0 0.5em;
  }

  .headlines .featured .title,
  .headlines .featured h4,
  .headlines .featured .subheader small,
  .headlines .featured .price .subheader {
    color: red;
    font-weight: bold;
  }

  .headlines a.listing-image {
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    height: 170px;
    display: block;
  }

  .headlines img {
    max-width: 100%;
    height: auto;
  }

  .headlines .th {
    line-height: 0;
    display: inline-block;
    border: solid 4px #fff;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.2);
    box-shadow: 0 0 0 1px rgba(0,0,0,0.2);
    -webkit-transition: all 200ms ease-out;
    -moz-transition: all 200ms ease-out;
    transition: all 200ms ease-out;
  }

  .headlines .title a {
    color: black;
  }

  .headlines h4 {
    font-size: 16px;
    font-weight: 700;
    font-family: "Open Sans","Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif;
  }

  .headlines .subheader {
    line-height: 1.4;
    font-weight: 300;
    margin-top: 0.2em;
    margin-bottom: 0.5em;
    font-weight: bold;
  }

  .headlines .subheader small,
  .headlines .price .subheader {
    color: #6f6f6f;
  }

  .headlines .price h4.subheader {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .headlines .add-margin-bottom {
    margin-bottom: 20px !important;
  }

.dropdown{
	color: black;
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

            <br><br>
            <div style="padding-left: 15px;"><h1>Displaying All <?php echo $user ?>'s Listings</h1></div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Area</th>
                    <th>Sleeps</th>
                    <th>Bedrooms</th>
                    <th>Baths</th>
                    <th>Date Posted</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Upload Photo</th>
                    <th>Delete</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Price'];?></td>
                    <td><?php echo $row['Town'];?></td>
                    <td><?php echo $row['Sleeps'];?></td>
                    <td><?php echo $row['Bedrooms'];?></td>
                    <td><?php echo $row['Baths'];?></td>
                    <td><?php echo $row['DatePosted'];?></td>
                    <td><img src="/classifieds/listing<?php echo $row['id']; ?>.jpg" width="150px" height="auto"/> </td>
                    <td><a href="/classifieds/edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="/upload.php?id=<?php echo $row['id']; ?>">Upload</a></td>
                    <td><a href="/classifieds/delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
                <?php endwhile;?>
            </table><br />
<br />

            <footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
        </form>
</div>
</div>
<script>
var screenHeight = window.screen.availHeight;
document.getElementById('left-sidebar').style.height = screenHeight + "px";
</script> <br />


</body>
</html>
