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
      <form id="login_form" class="dialog-form" action="php/login.php" method="POST">
        <fieldset>
          <legend>Log in</legend>
          <div class="form-group">
            <label for="user_username" class="control-label">Username:</label>
            <input type="text" id="user_username" class="form-control" name="user_username" autofocus/>
          </div>
          <div class="form-group">
            <label for="user_password" class="control-label">Password:</label>
            <input type="password" id="user_password" class="form-control" name="user_password"/>
          </div>
          <div class="text-center pad-top-20">
            <p>Have you forgotten your<br><a href="#" class="link"><strong>Username</strong></a> or <a href="#" class="link"><strong>Password</strong></a>?</p>
          </div>
          <?php
            session_start();
          ?>
          <?php if (isset($_SESSION['error'])){ ?>
          <div class="text-center pad-top-20">
            <p><font color="red"><strong><?php echo($_SESSION['error']); ?></strong></font></p>
          </div>
          <?php } ?>
          <div class="pad-top-20 pad-btm-20">
            <input type="submit" class="btn btn-default btn-block btn-lg" name="Login" value="Login">
          </div>
          <div class="text-center">
            <p>Do you wish to register<br> for <a href="register.php" class="link user-actions"><strong>a new account</strong></a>?</p>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
  <div class="dialog-back">
    <div class="dialog-content">
      <form id="register_form" class="dialog-form" action="" method="POST">
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
            <label for="user_cnf_password" class="control-label">Confirm password:</label>
            <input type="password" id="user_cnf_password" class="form-control" name="user_cnf_password"/>
          </div>
          <div class="form-group pad-top-20 form-group-checkbox">
            <div class="checkbox">
              <label>
                <input type="checkbox" id="user_terms" name="user_terms">
                I have read and I agree with the Terms and Conditions
              </label>
            </div>
          </div>
          <div class="pad-btm-20">
            <input type="submit" class="btn btn-default btn-block btn-lg" value="Continue"/>
          </div>
          <div class="text-center">
            <p>Return to <a href="#" class="link user-actions"><strong>log in page</strong></a>?</p>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="php/login.php"></script>

</body>
</html>
