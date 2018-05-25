<?php
session_start();

if (isset($_POST['username'])) {
    
    $conn = mysqli_connect("", "", "", "");
    
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$sql = "INSERT INTO members (username, password, name, email) VALUES ('$username', '$password', '$name', '$email')";
 
	$email_to = "info@myparrysound.com";
 
    $email_subject = "New Account at MyParrySound";

    $email_message .= "Hello, ".($name). "";
 
    $email_message .= " ".($ln)."\n";
 
    $email_message .= "Thanks for registering your account at www.myparrysound.com. Now that you have created an account you may list a property or use the wishlist.  To list you can go back to the site and click Place Listing. Then scroll down add your info for your property, click on post listing. If you need any help listing a property ad please reply to this email."."\n";
	
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

if ($conn->query($sql) === TRUE) {
    echo "Success creating an account!";
 } 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/style.css">
<title>My ParrySound View Listings</title>
</head>

<body>
<div class="nav">
<ul>
<li><img class="logo" src="/logo.png" height="90px"/></li>
<br style="line-height: 150%;"/>
<li><a href="/login.php">My Account</a></li>

<li><a href="/contact.php">Contact</a></li>
<li><a href="/classifieds/place.php">Place Listing</a></li>
<li><a href="/classifieds/view.php">View Listings</a></li>
<li><a href="/index.php">Home</a></li>



</ul>
</div>


<br />
<center>
<div class="details" align="center">
<img src="/logo.png" />
<h1 style="line-height: 15%;">Register For Myparrysound.com</h1>
Already Have an account? <a href="/classifieds/login.php">Login</a>
<form action="register.php" method="post">
                    
                      <br />

                        <label for="username">Username:</label>
                        <input name="username" type="text" class="form2">
                      
                      <br><br />

                        
                        
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form2">
                      
                     <br><br />

                        
                        <label for="name">Name:&nbsp; &nbsp; &nbsp;</label>
                        <input type="text" name="name" class="form2">
                        
                        
                        <br><br />

                        <label for="email">Email:&nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" name="email" class="form2">
                        <br><br />

                        
                        <input type="Submit" value="Submit" name="Submit" style="width: 20%; background-color: #263e4a; border: none; color: white; border-radius: 0px; padding: 8px;">
                      
    </form>
                         &nbsp;
					
</div>
</center>
</div><br />
<br />

<footer>
<center>
&copy; Copyright 2000-<?php echo date("Y") ?>, this site and its licensors. All Rights Reserved. <br />
Please send your questions, comments, or bug reports to <img src="/email.jpg" alt="email" />
</center>
</footer>
</body>
</html>
