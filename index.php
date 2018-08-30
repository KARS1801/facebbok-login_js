<?php
session_start();
if(isset($_POST['userId']))
{
	$_SESSION['userId']=$_POST['userId'];
	$_SESSION['name']=$_POST['name'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['picture']=$_POST['picture'];

	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $_SESSION['email']; ?>
</body>
</html>