<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$connect = new mysqli("", "", "", "");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id = htmlspecialchars($_GET["id"]);
$sql = "SELECT * FROM listings WHERE id = '$id' LIMIT 1";
$query = mysqli_query($connect, $sql);
	$row = mysqli_fetch_row($query);
	$listingOwner = $row['26'];
	 $uid = $_SESSION['id'];
    $user = $_SESSION['username']; 
if ($listingOwner == $user) {
	$title = strip_tags($_POST['title']);
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
	  $file_name_new = "listing".htmlspecialchars($_GET["id"]).".jpg"; 
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpg");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="Please only upload .JPG files, Thanks!.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be under 2 MB';
      }
      
      if(empty($errors)==true) {
		  unlink('/classifieds/'.$file_name_new);
         move_uploaded_file($file_tmp,"classifieds/".$file_name_new);
         echo "Success";
      }else{
         print_r($errors);
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
<?php
session_start();
$uid = $_SESSION['id'];
    $user = $_SESSION['username']; 
    $query = "SELECT * FROM `listings` WHERE username = '$user'";
    $search_result = filterTable($query);


// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "rfss_jslightham", "testt", "rfss_myparrysound");
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

<li><a href="/classifieds/search.php">Search</a></li>
<li><a href="/contact.php">Contact</a></li>
<li><a href="/classifieds/place.php">Place Listing</a></li>
<li><a href="/classifieds/view.php">View Listings</a></li>
<li><a href="/index.html">Home</a></li>
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
            <div style="padding-left: 15px;"><h1>Displaying All <?php echo $user ?>'s Listings</h1>
            <h2>Upload for Ad: <?php echo $id; ?></h2>
            </div>
            
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
			
      </form>
      
</div>
</div>
<script>
var screenHeight = window.screen.availHeight;
document.getElementById('left-sidebar').style.height = screenHeight + "px";
</script> 
</body>
</html>