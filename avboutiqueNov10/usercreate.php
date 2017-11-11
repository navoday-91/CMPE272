<html>
<head>
<?php
extract($_POST);
$cxn = mysqli_connect("localhost","anjalivi_newuser","newuser","anjalivi_testnewdb") or die("Could not connect");
if(mysqli_connect_errno()){
echo "Failed to connect to MYSQL:" . mysqli_connect_error();
}
$query1="INSERT INTO Member (userid,firstname,lastname,email,address,homephone,cellphone) VALUES ('$userid','$fname','$lname','$email','$add','$home','$cell')" ;
$result1= mysqli_query($cxn,$query1) or die("Couldn't execute query");

$query2="INSERT INTO Authenticate (userid,password) VALUES ('$userid','$password')";
$result2= mysqli_query($cxn,$query2) or die("Couldn't execute query");

print("User Created Successfully");
mysqli_close($cxn);
?>
</head>
</html>