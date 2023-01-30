<!DOCTYPE html>
 
<html>
 
<head>
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	* {
  outline:none;
	border:none;
	margin:0px;
	padding:0px;
}

#cont {

	position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
body {
	background:#333 url(https://static.tumblr.com/maopbtg/a5emgtoju/inflicted.png) repeat;        
}
</style>
</head>
 
 <body>

 

 <?php

	$con = mysqli_connect("localhost","root","","mychat_db");
	if (mysqli_connect_errno())
	{
	die('<br>Connect error no: '. mysqli_connect_errno() . 'Could not connect: ' . mysqli_connect_error()) ;
	}

	$id=$_GET['id'];

$sql="SELECT * from messages WHERE id='$id'";

if ($result=mysqli_query($con,$sql))
{
    $row=mysqli_fetch_row($result);
    // print_r($row);
    // echo "<br>";

 
    $form="  <div class='container' id='cont'>
	<h1 style='color:white'>Edit selected message</h1>

	<form action='update.php' method='get'>
  <div class='form-group'>
	  <input type='hidden' name='id' value='$row[0]' />
	  <textarea type='text' name='message' class='form-control' rows='5'>$row[4]</textarea>
  </div>
  <button type='submit' class='btn btn-info'>Edit</button>
	  </form>
	  </div>";

	echo $form;
}
else
{
echo "Error editing message: " . mysqli_error($con);
}
mysqli_close($con);


?>



 

</body>
</html>