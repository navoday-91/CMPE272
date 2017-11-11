<html>
<head>
<?php
extract($_POST);
if(!$userid || !$pwd)
{
die("Empty Fields");
}
$cxn = mysqli_connect("162.241.244.118","anjalivi_newuser","newuser","anjalivi_testnewdb") ;
if(mysqli_connect_errno()){
echo "Failed to connect to MYSQL:" . mysqli_connect_error();
}
$query1="SELECT password FROM Authenticate WHERE userid= '$userid'" ;
$result= mysqli_query($cxn,$query1) or die("Couldn't execute query");
$row=mysqli_fetch_assoc($result);
/*Check if username exists*/
if(empty($row))
{
die("Username does not exist");
}
$cmp=strcmp(($row['password']),($_POST["pwd"]));
if($cmp==0)
{
$query2="SELECT * FROM Member";
$result2= mysqli_query($cxn,$query2) or die("Couldn't display all members");

/*Display all Members*/
echo "<h2>Members</h2>\n";
while($row2=mysqli_fetch_assoc($result2))
{
extract($row2);
echo "<p>{$row2['userid']} {$row2['fname']} {$row2['lname']}</p>";
}
}
else
{
echo "<p>Incorrect password</p>";
}
mysqli_close($cxn);
?>
</head>
</html>