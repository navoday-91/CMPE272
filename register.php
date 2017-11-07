<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ABC Consulting User Registration and Search</title>
  
  
  
      <link rel="stylesheet" href="css/signup.css">

  
</head>

<body>
  <div id="login-box">
  <div class="left">
    <h1>Sign up</h1>
    <form id="register_form" action="php/signup.php" method="POST">
    <fieldset>
    <input type="text" name="user_username" placeholder="Username" />
    <input type="password" name="user_password" placeholder="Password" />
    <input type="text" name="first_name" placeholder="First Name" />
    <input type="text" name="last_name" placeholder="Last Name" />
    <input type="text" name="email" placeholder="E-mail" />
    <input type="text" name="address" placeholder="Address" />
    <input type="text" name="phone" placeholder="Phone" />
    
    <input type="submit" name="Register" value="Register" />
    </fieldset>
    </form
  </div>
  
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>
  </div>
  <div class="or">OR</div>
</div>
  
  
</body>
</html>
