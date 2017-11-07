<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ABC - User Search Results</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/signup.css">


</head>

<body>
  <div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>User Search Results</h1>
          <div class="top-row">
            <?php
            session_start();
            $connection = mysqli_connect("localhost", "navoday", "redhat");
            // Selecting Database
            $db = mysqli_select_db($connection, "abc");
            // SQL query to fetch information of registerd users and finds user match.
            $query = mysqli_query($connection, $_SESSION['query']);
            $rows = mysqli_num_rows($query);
            if ($rows > 0) {
                while ($user = $query->fetch_assoc()) {
        ?>
        <li><?php echo($user["username"]."  ".$user["first name"]."  ".$user["last name"]."..".$user["email"]."..".$user["phone"]); ?></li>
        <?php
                }
            }
            else
            {
        ?>
            <li>No Users Registered</li>
        <?php } ?>

        </div>
      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/signup.js"></script>

</body>
</html>
