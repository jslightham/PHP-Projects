<?php
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
         $errors[]="Please only upload .JPG files.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be under 2 MB';
      }
      
      if(empty($errors)==true) {
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
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
			
      </form>
      
   </body>
</html>