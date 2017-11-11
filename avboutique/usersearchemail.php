<html>
<head>
<?php
extract($_POST);
$cxn = mysqli_connect("localhost","anjalivi_newuser","newuser","anjalivi_testnewdb") or die("Could not connect");
if(mysqli_connect_errno()){
echo "Failed to connect to MYSQL:" . mysqli_connect_error();
}
if(!$email){
die("Empty Fields");
}
else{
$query1="SELECT * FROM Member WHERE email='$email'";
}
$result= mysqli_query($cxn,$query1) or die("Couldn't execute query");
if(mysqli_num_rows($result) > 0){
echo "<table><tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Address</th><th>Home Phone</th><th>Cell Phone</th></tr>";
while($row = mysqli_fetch_assoc($result)){
echo "<tr><td>".$row["userid"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["email"]."</td><td>".$row["address"]."</td><td>".$row["homephone"]."</td><td>".$row["cellphone"]."</td></tr>";
}
echo "</table>";
}
else{
echo "No results";
}
mysqli_close($cxn);
?>
</head>
</html>