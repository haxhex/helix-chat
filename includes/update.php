<?php

$conn = mysqli_connect("localhost","root","","mychat_db");
	if (mysqli_connect_errno())
	{
	die('<br>Connect error no: '. mysqli_connect_errno() . 'Could not connect: ' . mysqli_connect_error()) ;
	}

$id=$_GET['id'];
$message=$_GET['message'];


print_r($_GET);
echo "<br>";

echo "THIS <br>";
echo "Message: " . $message . "<br>";
echo "ID: " . $id . "<br>";
$sql = "UPDATE messages set message='$message' WHERE id='$id'";
//exit;
if (mysqli_query($conn, $sql)) {
	
    header('Location: ../index.php');
} else {
    echo "Error updating message ....: " . mysqli_error($conn);
}
mysqli_close($conn);
?>