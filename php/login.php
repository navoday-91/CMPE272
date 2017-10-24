<?php
session_start(); // Starting Session
echo("You are here!");
$error=''; // Variable To Store Error Message
if (isset($_POST['Login'])) {
echo('you made it');
if (empty($_POST['user_username']) || empty($_POST['user_password'])) {
$error = "Username or Password is invalid";
echo($error);
header("location: ../index.html"); // Redirecting back
}
else
{
echo('You are here in else');
// Define $username and $password
$username=$_POST['user_username'];
$password=$_POST['user_password'];
echo($username);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli("localhost", "root", "redhat");
echo($username + $password);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    echo('connection to db failed');
    echo($connection);
}
echo("Connected successfully");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("abc", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: ../base.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
echo($error);
}
mysql_close($connection); // Closing Connection
}
}
?>