<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ABC Login</title>
<?php
    session_start();
    if (!(isset($_SESSION['login_user'])))
    {
    header("location: index.html");
    }
?>

  <link rel='stylesheet prefetch' href='https://www.google.com/fonts#UsePlace:use/Collection:Roboto:400,300,100,500'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://www.google.com/fonts#UsePlace:use/Collection:Roboto+Slab:400,700,300,100'>

      <link rel="stylesheet" href="css/style.css">


</head>

<div id="dialog" class="dialog dialog-effect-in">
  <div class="dialog-front">
      <h3>Users registered:</h3>
    <div class="dialog-content">
        <?php
            $connection = mysqli_connect("localhost", "navoday", "redhat");
            // Selecting Database
            $db = mysqli_select_db($connection, "abc");
            // SQL query to fetch information of registerd users and finds user match.
            $query = mysqli_query($connection, "select * from login;");
            $rows = mysqli_num_rows($query);
            $result = mysqli_fetch_all($query);
            echo($result[0]);
            if ($rows > 0) {
                while ($row = mysql_fetch_assoc($result)) {
        ?>
        <li><?php echo($row["username"]); ?></li>
        <?php
                }
            }
            else
            {
        ?>
            <li>No Users Registered</li>
        <?php } ?>
        <h5><a href = "base.php"> Continue</a> to website.</h5>
    </div>
  </div>
</div>