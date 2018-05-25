<?php
session_start();
	if(isset($_SESSION['id'])){
		if(isset($_POST['submit'])){
	$user = $_SESSION['username'];
	$conn = mysqli_connect("", "", "", "");
	$ad_id = $_POST['ad_id'];
    $sql = "INSERT INTO wishlist (ad_id, user)
VALUES ('$ad_id', '$user')";
if ($conn->query($sql) === TRUE) {
    echo "Added to wishlist";
	?>
    <script type="text/javascript">
window.location.href = 'http://myparrysound.com/classifieds/wishlist.php';
</script>
    <?php	
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