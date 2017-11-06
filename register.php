<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ABC Consulting Login</title>
  
  
  <link rel='stylesheet prefetch' href='https://www.google.com/fonts#UsePlace:use/Collection:Roboto:400,300,100,500'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://www.google.com/fonts#UsePlace:use/Collection:Roboto+Slab:400,700,300,100'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<div id="dialog" class="dialog dialog-effect-in">
  <div class="dialog-front">
    <div class="dialog-content">
      <form id="register_form" class="dialog-form" action="php/signup.php" method="POST">
        <fieldset>
          <legend>Register</legend>
          <div class="form-group">
            <label for="user_username" class="control-label">Username:</label>
            <input type="text" id="user_username" class="form-control" name="user_username"/> 
          </div>
          <div class="form-group">
            <label for="user_password" class="control-label">Password:</label>
            <input type="password" id="user_password" class="form-control" name="user_password"/>
          </div>
          <div class="form-group">
            <label for="first_name" class="control-label">First Name:</label>
            <input type="text" id="first_name" class="form-control" name="first_name"/>
          </div>
          <div class="form-group">
            <label for="last_name" class="control-label">Last Name:</label>
            <input type="text" id="last_name" class="form-control" name="last_name"/> 
          </div>
          <div class="form-group">
            <label for="email" class="control-label">E-Mail:</label>
            <input type="text" id="email" class="form-control" name="email"/> 
          </div>
          <div class="form-group">
            <label for="address" class="control-label">Address:</label>
            <input type="text" id="address" class="form-control" name="address"/> 
          </div>
          <div class="form-group">
            <label for="phone" class="control-label">Phone:</label>
            <input type="text" id="phone" class="form-control" name="phone"/> 
          </div>
          <div class="form-group">
          <div class="pad-btm-20">
            <input type="submit" class="btn btn-default btn-block btn-lg" value="Continue"/>
          </div>
          <div class="text-center">
            <p>Return to <a href="userlogin.php" class="link user-actions"><strong>log in page</strong></a>?</p>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
