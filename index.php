<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ABC Consulting</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/font-icon.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<?php
//    session_start();
//    if (!(isset($_SESSION['login_user'])))
//    {
//    $_SESSION['error'] = "You must login first!";
//    header("location: index.php");
//    }
?>
<body>
<!-- header section -->
<section class="banner" role="banner">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="index.html">ABC Consulting</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
          <li><a href="#intro">About</a></li>
          <li><a href="#services">services</a></li>
          <li><a href="#teams">Our Team</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
          <li><a href="#contact">Contact</a></li>
          <?php
              session_start();
              if(isset($_SESSION['login_user'])){
          ?>
          <li><a href="#"><?php echo($_SESSION['login_user']) ?></a></li>
          <li><a href="php/logout.php">Logout</a></li>
          <?php
              }
              else{
          ?>
          
          <li><a href="userlogin.php">Login</a></li>
          <?php 
              }
          ?>
          <li><a href="register.php">User Area</a></li>
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
  <!-- banner text -->
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <div class="banner-text text-center">
        <h1>ABC Consulting: Solutions For Everything!</h1>
        <p>Have a business? Problems are bound to arise... Contact us, we are a team of experts who love challenges. Our head on approach will yield results more promptly than you expect.</p>
        <a href="#" class="btn btn-large">Find out more</a> </div>
      <!-- banner text --> 
    </div>
  </div>
</section>
<!-- header section --> 
<!-- intro section -->
<section id="intro" class="section intro">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3>We've got what you need!</h3>
      <p>At ABC, we deliver solutions ranging from IT, marketing and web solutions to deep insights on your business patterns and data analytics. Champions of multi faceted business horizons. Take a look at our work!</p>
    </div>
  </div>
</section>
<!-- intro section --> 
<!-- services section -->
<section id="services" class="services service-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-strategy"></span>
        <div class="services-content">
          <h5><a href = "services/str_cnslt.php">Strategy & Consulting</a></h5>

        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-briefcase"></span>
        <div class="services-content">
          <h5><a href = "services/branding1.php">corporate identity</a></h5>

        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-tools"></span>
        <div class="services-content">
          <h5><a href = "services/webdesign.php">web design and development</a></h5>

        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-genius"></span>
        <div class="services-content">
          <h5><a href = "services/branding.php">Branding</a></h5>

        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-megaphone"></span>
        <div class="services-content">
          <h5><a href = "services/digmrktng.php">Digital marketing</a></h5>

        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-trophy"></span>
        <div class="services-content">
          <h5>Promotion material</h5>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- services section --> 
<!-- work section -->
<section id="works" class="works section no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="services/portal.php" class="work-box"> <img src="images/work-1.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <h5>Changing How It Looks!</h5>
            <p>Portal Design</p>
          </div>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="services/process_mgmt.php" class="work-box"> <img src="images/work-2.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <h5>Process Matters!</h5>
            <p>Process Management</p>
          </div>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="services/comp_cert.php" class="work-box"> <img src="images/work-3.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <h5>Compliance & Standardization</h5>
            <p>Compliance Certifications</p>
          </div>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="services/analytics.php" class="work-box"> <img src="images/work-4.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <h5>Managing Tastes!</h5>
            <p>Surveys and Analytics</p>
          </div>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/work-5.jpg" class="work-box"> <img src="images/work-5.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <h5>Keeping You One Step Ahead!</h5>
            <p>Reading Market Trends and Expectations</p>
          </div>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/work-6.jpg" class="work-box"> <img src="images/work-6.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <h5>Supply Chain</h5>
            <p>We know sourcing and management market better</p>
          </div>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/work-7.jpg" class="work-box"> <img src="images/work-7.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <h5>Reinventing Style</h5>
            <p>Designing and inventing new definitions</p>
          </div>
        </div>
        <!-- overlay --> 
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/work-8.jpg" class="work-box"> <img src="images/work-8.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <h5>Legal Matters</h5>
            <p>Sharper minds to save your pain</p>
          </div>
        </div>
        <!-- overlay --> 
        </a> </div>
    </div>
  </div>
</section>
<!-- work section --> 
<!-- our team section -->
<section id="teams" class="section teams">
  <div class="container">
    <div class="row">
      <?php
        $myfile = fopen("webcontacts.txt", "r") or die("Unable to open file!");
        while (!feof($myfile))
        {
        $frec = fgets($myfile);
        $info = explode(";",$frec);
      ?>
      <div class="col-md-3 col-sm-6">
        <div class="person"><img src="<?php echo $info[2]; ?>" alt="" class="img-responsive">
          <div class="person-content">
            <h4><?php echo $info[0]; ?></h4>
            <h5 class="role"><?php echo $info[1]; ?></h5>
            <p><?php echo $info[3]; ?></p>
          </div>
          <ul class="social-icons clearfix">
            <li><a href="<?php echo $info[4]?>"><span class="fa fa-facebook"></span></a></li>
            <li><a href="<?php echo $info[5]?>"><span class="fa fa-twitter"></span></a></li>
            <li><a href="<?php echo $info[6]?>"><span class="fa fa-linkedin"></span></a></li>
            <li><a href="<?php echo $info[7]?>"><span class="fa fa-google-plus"></span></a></li>
            <li><a href="<?php echo $info[8]?>"><span class="fa fa-dribbble"></span></a></li>
          </ul>
        </div>
      </div>
      <?php
        }
        fclose($myfile);
      ?>
    </div>
  </div>
</section>
<!-- our team section --> 
<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>""Hey, I haven’t done that before. But I can find out how to do it, and it can be done."" </h1>
                <p>Rene Brown, Open Window production</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"It’s really helped us grow. I can keep all of the customer’s information in there so if I need to look up something in the future or call them for a follow up, I have all of that there so it’s really helped us organize the whole business. "</h1>
                <p>Brain Rice, Lexix Private Limited.</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"It’s really helped us grow. I can keep all of the customer’s information in there so if I need to look up something in the future or call them for a follow up, I have all of that there so it’s really helped us organize the whole business. "</h1>
                <p>Andi Simond, Global Corporate Inc</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"With a heavy focus on collecting and analyzing data, they can help organizations that are looking for a robust analytical tool and consider content management a key concern." </h1>
                <p>Kristy Gabbor, Martix Media</p>
              </blockquote>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials section --> 

<!-- contact section -->
<section id="contact" class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 conForm">
        <h5>Shoot An Email</h5>
        <p>We are happy to talk you through any projects or run live demos for those wishing to see what it is to use our products and how they look like.</p>
        <div id="message"></div>
        <form method="post" action="php/contact.php" name="cform" id="cform">
          <input name="name" id="name" type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Your name..." >
          <input name="email" id="email" type="email" class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr" placeholder="Email Address..." >
          <textarea name="comments" id="comments" cols="" rows="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Project Details..."></textarea>
          <input type="submit" id="submit" name="send" class="submitBnt" value="Send your query">
          <div id="simple-msg"></div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- contact section --> 

<!-- Footer section -->
<footer class="footer">
  <div class="footer-top section">
    <div class="container">
      <div class="row">
        <div class="footer-col col-md-6">
          <h5>Our Office Location</h5>
          <p>3488, Cortese Circle, San Jose, CA - 95127.<br>
            +1 (669) 265-5946<br>
            support@abc.com</p>
          <p>All Rights Reserved.</p>
        </div>
        <div class="footer-col col-md-3">
          <h5>Services We Offer</h5>
          <p>
          <ul>
            <li><a href="#">Digital Strategy</a></li>
            <li><a href="#">Websites</a></li>
            <li><a href="#">Videography</a></li>
            <li><a href="#">Social Media</a></li>
            <li><a href="#">User Experience</a></li>
          </ul>
          </p>
        </div>
        <div class="footer-col col-md-3">
          <h5>Share with Love</h5>
          <ul class="footer-share">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- footer top --> 
  
</footer>
<!-- Footer section --> 
<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script> 
<script src="js/retina.min.js"></script> 
<script src="js/modernizr.js"></script> 
<script src="js/main.js"></script> 
<script type="text/javascript" src="js/jquery.contact.js"></script>
</body>
</html>