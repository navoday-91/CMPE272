<?php
session_start(); // Starting Session
echo("You are here!");
$error=''; // Variable To Store Error Message
if (isset($_POST['Login'])) {
echo('you made it');
echo(($_POST['user_password']));
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
$connection = mysqli_connect("localhost", "navoday", "redhat");
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
$username = mysqli_real_escape_string($username);
$password = mysqli_real_escape_string($password);
// Selecting Database
$db = mysqli_select_db("abc", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: ../base.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
echo($error);
//header("location: ../index.html"); // Redirecting To Login Page
}
mysqli_close($connection); // Closing Connection
}
}
?>