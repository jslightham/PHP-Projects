<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if (isset($_SESSION['id'])){


if (isset($_POST['reply_send'])){
$conn = new mysqli("", "", "", "");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);


$from_user = htmlspecialchars($_POST['from_user']);
$to_user = htmlspecialchars($_POST['to_user']);
$content = htmlspecialchars($_POST['content']);
$date = date("Y-m-d");
$email1 = htmlspecialchars($_POST['email1']);
$email2 = htmlspecialchars($_POST['email2']);
$username = $_SESSION['username'];

echo $from_user;
echo $to_user;
echo $content;
echo $date;
echo $email1;
echo $email2;
echo $username;

$sql = "INSERT INTO messages (from_user, to_user, content, date)
VALUES ('$username', '$to_user', '$message', '$date')";
?>
<?php
    if ($conn->query($sql) === TRUE) {
    echo "Message Sent";
	
	$email_to = "info@myparrysound.com";
 
    $email_subject = "You have New Messages at MyParrysound";

    $email_message .= "Hello, "."\n";
 
     $email_message .= ($username);
 
    $email_message .= " has sent you a message. Don't Reply to this email, reply online. Thanks for using our messaging service at www.myparrysound.com. You can reply and view the message at www.myparrysound.com/classifieds/messages.php Here is the message:"."\n";

 $email_message .= "\n"."Sender Username: ".($username)."\n";
 $email_message .= "Message: ".($message)."\n";	

$email_message .= "\n"."Sincerely,"."\n";

$email_message .= "Johnathon, Webmaster"."\n";
$email_message .= "www.myparrysound.com"."\n";

// create email headers
 
$headers = 'From: '.$email_to."\r\n".
 
'Reply-To: '.$email."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 

@mail($email1, $email_subject, $email_message, $headers);  

@mail($email2, $email_subject, $email_message, $headers);  

	?>
   <script type="text/javascript">
window.location.href = 'http://myparrysound.com/classifieds/all_listings.php';
</script>
<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
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
<title>My ParrySound Reply</title>
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
<li><a href="/classifieds/search.php">Search</a></li>
<li><a href="/contact.php">Contact</a></li>
<li><a href="/classifieds/place.php">Place Listing</a></li>
<li><a href="/classifieds/view.php">View Listings</a></li>
<li><a href="/index.php">Home</a></li>
</ul>
</div>



</div>



<div class="slider">
<span id="slider">
</span>
<div class="content">
<div class="right-side">
            <div class="title">
            <h1>Reply</h1>
            </div>
<br />

      <!-- populate table from mysql database -->
               
                <div class="title">
                <p>  
                
                <div class="message-info" style="postion: absolute; vertical-align: top;">
                    
					<h5>From: <?php echo $to_user; ?> &nbsp; 
                    To <?php echo $from_user;?></h5>
                    <?php echo $old_content;?>
                    <div class="date" style="text-align: right; vertical-align: top;"><?php echo $old_date;?></div> 
                    </div>
                    <form action="/classifieds/replysend.php" method="post">
                    <input type="hidden" value="<?php echo $from_user;?>" name="from_user" />
                    <input type="hidden" value="<?php echo $to_user;?>" name="to_user" />
                    <textarea name="content_new" /></textarea>
                    <input type="hidden" value="<?php echo $row['date'];?>" name="date" />
                    <input type="hidden" value="<?php echo $email1;?>" name="email1" />
                    <input type="hidden" value="<?php echo $email2;?>" name="email2" /><br />

                    <input type="submit" value="Reply" name="reply_send" style="width: 10%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 8px;" />
                    </form>
                    </p>
         </div>
         <br />
                
            
            </div>
            </div>
</body>
</html>
