<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
echo("Session Started");
if (isset($_POST['user_search'])) {
    if (empty($_POST['first_name']) && empty($_POST['last_name']) && empty($_POST['email']) && empty($_POST['phone'])) {
            $error = "Specify atleast one criteria";
            echo($error);
            $_SESSION['error'] = $error;
            $_SESSION['active-tab'] = "registration";
            header("location: ../register.php"); // Redirecting back
        
}
else
{
    echo("In ELSE");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysqli_connect("localhost", "navoday", "redhat");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        echo('connection to db failed');
        echo($connection);
    }
    echo("Connected successfully \n");
    // To protect MySQL injection for Security purpose
    $firstname = ($_POST['first_name']);
    $lastname = ($_POST['last_name']);
    $email = ($_POST['email']);
    $phone = ($_POST['phone']);
    // Selecting Database
    $where_clause = '';
    $i = 0;
    if (!(empty($firstname))) {
        $where_clause .= "`first name` =". "'".$firstname."'";
        $i += 1;
    }
    if (!(empty($lastname))) {
        if($i > 0){
            $where_clause .= " and `last name` =" . "'".$lastname."'";
        }
        else{
            $where_clause .= "`last name` ="."'".$lastname."'";
        }
            $i += 1;
        }
    if (!(empty($email))) {
        if($i > 0){
            $where_clause .= " and `last name` =" . "'".$email."'";
        }
        else{
            $where_clause .= "`last name` ="."'".$email."'";
        }
            $i += 1;
        }
    if (!(empty($phone))) {
        if($i > 0){
            $where_clause .= " and `last name` =" . "'".$phone."'";
        }
        else{
            $where_clause .= "`last name` ="."'".$phone."'";
        }
            $i += 1;
        }
    echo($where_clause);
    $db = mysqli_select_db($connection, "abc");
    // SQL query to fetch information of registerd users and finds user match.
    $query = mysqli_query($connection, "select * from userdata where $where_clause;");
    $rows = mysqli_num_rows($query);
    if ($rows == 0) {
        $_SESSION['error'] = "No Users Match This Criteria!";
        $_SESSION['active-tab'] = "registration";
        //$_SESSION['error'] = "select * from userdata where $where_clause $i $firstname $lastname;";
        header("location: ../register.php");
    } 
    else {
        $_SESSION['query'] = "select * from userdata where $where_clause;";
        header("location: ../userdata.php"); // Redirecting To User Data Page
        }
    mysqli_close($connection); // Closing Connection
}
}
?>