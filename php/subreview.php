<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['Submit'])) {
    if (empty($_POST['rating']) || empty($_POST['review'])) {
        if (empty($_POST['rating'])) {
            $error = "Rating can't be blank";
            echo($error);
            $_SESSION['error'] = $error;
            header("location: ../productdisplay.php?id=".$id); // Redirecting back
            }
        if (empty($_POST['review'])) {
            $error = "Review can't be blank";
            echo($error);
            $_SESSION['error'] = $error;
            header("location: ../productdisplay.php?id=".$id); // Redirecting back
            }
}
else
{
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysqli_connect("localhost", "root", "redhat");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        echo('connection to db failed');
        echo($connection);
    }
    echo("Connected successfully \n");
    // To protect MySQL injection for Security purpose
    $rating = ($_POST['rating']);
    $username = $_SESSION['login_user'];
    $review = ($_POST['review']);
    $review_f = floatval($review);
    parse_str($_SERVER['QUERY_STRING']);
    $db = mysqli_select_db($connection, "abc");
    // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($connection, "insert into reviews values('$id','$review','$username',default);");
        echo(mysqli_error($connection));
        $query = mysqli_query($connection, "insert into rating values('$id','$review_f');");
        echo(mysqli_error($connection));
        $_SESSION['error'] = "Review Submitted";
        header("location: ../productdisplay.php?id=".$id);
    mysqli_close($connection); // Closing Connection
}
}
?>