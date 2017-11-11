

    
<!DOCTYPE html>
<?php
$page_id = 9;
$cookie_name = "prev_visits";
$cookie_value = $_COOKIE[$cookie_name];
$cookie_value = json_decode($cookie_value, true);
if (in_array($page_id, $cookie_value)){
    for($i=array_search($page_id, $cookie_value);$i<4;$i++){
        $cookie_value[$i] = $cookie_value[$i+1];
    }
}
else{
    $i = 0;
    for($i=0;$i<4;$i++){
        $cookie_value[$i] = $cookie_value[$i+1];
    }
}
$cookie_value[4] = $page_id;
setcookie($cookie_name, json_encode($cookie_value), time() + (86400 * 30), "/");

$cookie_name = "most_visits";
$cookie_value = $_COOKIE[$cookie_name];
$cookie_value = json_decode($cookie_value, true);
$cookie_value[$page_id] += 1;
setcookie($cookie_name, json_encode($cookie_value), time() + (86400 * 30), "/");

?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ABC | Compliance Certification Services Inc.</title>

<link rel="stylesheet" href="http://www.ccsrf.com/wp-content/plugins/sitepress-multilingual-cms/res/css/language-selector.css?v=3.1.5" type="text/css" media="all" />

            
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="http://www.ccsrf.com/xmlrpc.php" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

                <link rel="shortcut icon" href="http://192.168.1.20/wp-content/themes/ccsrf/images/logo/favicon.ico" type="image/x-icon" />
    
                <link rel="apple-touch-icon-precomposed" href="http://192.168.1.20/wp-content/themes/ccsrf/images/logo/apple-touch-icon.png">
    
                <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://192.168.1.20/wp-content/themes/ccsrf/images/logo/apple-touch-icon-114x114.png">
    
                <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://192.168.1.20/wp-content/themes/ccsrf/images/logo/apple-touch-icon-72x72.png">
    
                <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://192.168.1.20/wp-content/themes/ccsrf/images/logo/apple-touch-icon-144x144.png">
    
        
    
            <style>

                
            </style>

            <script type="text/javascript">

                var yith_wcwl_plugin_ajax_web_url = 'http://www.ccsrf.com/wp-admin/admin-ajax.php';

                var login_redirect_url = 'http://www.ccsrf.com/wp-login.php?redirect_to=%2F%3Flang%3Den';

            </script>

            
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="http://www.ccsrf.com/wp-content/themes/ccsrf/css/ie8.css" />
    <![endif]-->
            <style type="text/css">
                .animated { visibility:hidden; }
            </style>
                    <!--[if lt IE 10]>
    <style type="text/css">
    .animated {
        visibility:visible !important;
        -webkit-transition: none !important;
        -moz-transition: none !important;
        -o-transition: none !important;
        -ms-transition: none !important;
        transition: none !important;
    }
    </style>
    <![endif]-->
<link rel="alternate" type="application/rss+xml" title="CCSRF &raquo; Feed" href="http://www.ccsrf.com/?feed=rss2&#038;lang=en" />
<link rel="alternate" type="application/rss+xml" title="CCSRF &raquo; Comments Feed" href="http://www.ccsrf.com/?feed=comments-rss2&#038;lang=en" />
<link rel="alternate" type="application/rss+xml" title="CCSRF &raquo; 程智科技 Comments Feed" href="http://www.ccsrf.com/?lang=en&#038;feed=rss2&#038;page_id=2902" />
<link rel='stylesheet' id='wpml-cms-nav-css-css'  href='http://www.ccsrf.com/wp-content/plugins/wpml-cms-nav/res/css/navigation.css?ver=1.4.2-b2' type='text/css' media='all' />
<link rel='stylesheet' id='cms-navigation-style-base-css'  href='http://www.ccsrf.com/wp-content/plugins/wpml-cms-nav/res/css/cms-navigation-base.css?ver=1.4.2-b2' type='text/css' media='screen' />
<link rel='stylesheet' id='cms-navigation-style-css'  href='http://www.ccsrf.com/wp-content/plugins/wpml-cms-nav/res/css/cms-navigation.css?ver=1.4.2-b2' type='text/css' media='screen' />
<link rel='stylesheet' id='layerslider-css'  href='http://www.ccsrf.com/wp-content/plugins/LayerSlider/static/css/layerslider.css?ver=5.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='ls-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900|Open+Sans:300|Indie+Flower:regular|Oswald:300,regular,700&#038;subset=latin,latin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='http://www.ccsrf.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.0.1' type='text/css' media='all' />
<link rel='stylesheet' id='rs-settings-css'  href='http://www.ccsrf.com/wp-content/plugins/revslider/rs-plugin/css/settings.css?rev=4.0.5&#038;ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='rs-captions-css'  href='http://www.ccsrf.com/wp-content/plugins/revslider/rs-plugin/css/dynamic-captions.css?rev=4.0.5&#038;ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='rs-plugin-static-css'  href='http://www.ccsrf.com/wp-content/plugins/revslider/rs-plugin/css/static-captions.css?rev=4.0.5&#038;ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='wcva-frontend-css'  href='http://www.ccsrf.com/wp-content/plugins/woocommerce-colororimage-variation-select/css/front-end.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='yith_wcas_frontend-css'  href='http://www.ccsrf.com/wp-content/plugins/yith-woocommerce-ajax-search/assets/css/yith_wcas_ajax_search.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-colorbox-css'  href='http://www.ccsrf.com/wp-content/plugins/yith-woocommerce-compare/assets/css/colorbox.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='yith-wcwl-main-css'  href='http://www.ccsrf.com/wp-content/plugins/yith-woocommerce-wishlist/assets/css/style.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='plugins-css'  href='http://www.ccsrf.com/wp-content/themes/ccsrf/css/plugins.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='venedor-styles-css'  href='http://www.ccsrf.com/wp-content/themes/ccsrf/css/styles.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='system-css'  href='http://www.ccsrf.com/wp-content/themes/ccsrf/_config/system_1.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='animate-css'  href='http://www.ccsrf.com/wp-content/themes/ccsrf/css/animate.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='http://www.ccsrf.com/wp-content/themes/ccsrf/style.css?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='ebs_dynamic_css-css'  href='http://www.ccsrf.com/wp-content/plugins/easy-bootstrap-shortcodes/styles/ebs_dynamic_css.php?ver=4.0.10' type='text/css' media='all' />
<link rel='stylesheet' id='redux-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Oswald%3A400%7CPT+Sans%3A400%2C700%7CGudea%3A700%2C400&#038;ver=1418145192' type='text/css' media='all' />
<script type='text/javascript' src='http://www.ccsrf.com/wp-includes/js/jquery/jquery.js?ver=1.11.1'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/LayerSlider/static/js/layerslider.kreaturamedia.jquery.js?ver=5.0.2'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/LayerSlider/static/js/greensock.js?ver=1.11.2'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/LayerSlider/static/js/layerslider.transitions.js?ver=5.0.2'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.plugins.min.js?rev=4.0.5&#038;ver=4.0.10'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js?rev=4.0.5&#038;ver=4.0.10'></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.ccsrf.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.ccsrf.com/wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 4.0.10" />
<meta name="generator" content="WooCommerce 2.2.8" />
<link rel='shortlink' href='http://www.ccsrf.com/?lang=en' />
<meta name="generator" content="WPML ver:3.1.5 stt:1,61,63;0" />
<link rel="alternate" hreflang="zh-TW" href="http://www.ccsrf.com" />
<link rel="alternate" hreflang="zh-CN" href="http://www.ccsrf.com?lang=zh-hans" />
<link rel="alternate" hreflang="en-US" href="http://www.ccsrf.com?lang=en" />

<style type="text/css">                                                																								                                                                                                                                                                        																				                                    
</style><meta name="generator" content="Powered by Visual Composer - drag and drop page builder for WordPress."/>
<link rel='canonical' href='http://www.ccsrf.com/?page_id=2476' />

    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://www.ccsrf.com/wp-content/themes/ccsrf/js/ie8.js"></script>
        <script type="text/javascript" src="http://www.ccsrf.com/wp-content/themes/ccsrf/js/html5.js"></script>
        <script type="text/javascript" src="http://www.ccsrf.com/wp-content/themes/ccsrf/js/respond.min.js"></script>
    <![endif]-->

                
</head>



<body class="home page page-id-2902 page-template-default  woocommerce-wishlist woocommerce woocommerce-page wpb-js-composer js-comp-ver-3.7.4 vc_responsive">
    
    
    <div id="wrapper" class="wrapper-full"><!-- wrapper -->
        <div class="header-wrapper clearfix
                                    "><!-- header wrapper -->
            

<!-- header -->
<div class="header
            ">
    <div class="container">
        <div class="row">
            <!-- header left -->
            <div class="col-sm-4 left">
                                <!-- logo -->
                <h1 class="logo">
                    <a href="http://www.ccsrf.com/?lang=en" title="ABC - Compliance Certification Services" rel="home">
                        <img src="images/abclogo.jpg" />                    </a>
                </h1>
                <!-- end logo -->
                            </div>
            <!-- end header left -->
            
                        
            <!-- header right -->
            <div class="col-sm-8 right">
                                            </div>
            <!-- header right -->
        </div>
    </div>
    <!-- menu -->
    <div class="menu-wrapper hide-search">
        <div class="container">
            
                                <!-- main menu -->
    <div id="main-menu" class="mega-menu">
    <ul id="menu-menu-tw-%e8%8b%b1%e8%aa%9e0" class=""><li id="nav-menu-item-4157" class="menu-item menu-item-type-post_type menu-item-object-page  narrow "><a href="http://www.abc-consulting.tk" class="">Company Profile</a></li>
<li id="nav-menu-item-4158" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  has-sub narrow "><h5>News Center</h5>
<div class="popup"><div class="inner" style=""><ul class="sub-menu">
	<li id="nav-menu-item-4305" class="menu-item menu-item-type-custom menu-item-object-custom " data-cols="1"><a href="http://www.abc-consulting.tk" class="">Company News</a></li>
	<li id="nav-menu-item-4307" class="menu-item menu-item-type-custom menu-item-object-custom " data-cols="1"><a href="http://www.abc-consulting.tk" class="">Certification News</a></li>
</ul></div></div>
</li>
<li id="nav-menu-item-4159" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  has-sub wide pos-center col-3"><h5>Service Scope</h5>
<div class="popup"><div class="inner" style=""><ul class="sub-menu">
	<li id="nav-menu-item-5706" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  sub" data-cols="1"><a href="http://www.ccsrf.com/?page_id=2967&amp;lang=en" class="">Product Certification</a>
	<ul class="sub-menu">
		<li id="nav-menu-item-4161" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.abc-consulting.tk" class="">EMC</a></li>
		<li id="nav-menu-item-4162" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.abc-consulting.tk" class="">RF</a></li>
		<li id="nav-menu-item-4163" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.abc-consulting.tk" class="">Automotives</a></li>
		<li id="nav-menu-item-5749" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.abc-consulting.tk" class="">OTA</a></li>
		<li id="nav-menu-item-5750" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.abc-consulting.tk" class="">SAR</a></li>
		<li id="nav-menu-item-4164" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.abc-consulting.tk" class="">Global Certification</a></li>
		<li id="nav-menu-item-4209" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.abc-consulting.tk" class="">Railway/Marinetime Application</a></li>
		<li id="nav-menu-item-4165" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.abc-consulting.tk" class="">Accreditations</a></li>
		<li id="nav-menu-item-4916" class="menu-item menu-item-type-custom menu-item-object-custom "><a href="http://www.abc-consulting.tk"">RCB</a></li>
	</ul>
</li>
</ul>        </div>
        </div>
    <!-- end mobile menu -->
                            
            <!-- quick access -->
            <div class="quick-access">
                                
                            <div class="view-switcher"><!-- view switcher -->
            <div id="lang_sel"  >
</div>
        </div>
                                </div>
            <!-- end quick access -->
            
                    </div>
        <div class="container-shadow"></div>
    </div>
    <!-- end menu -->
</div>
<!-- end header -->
        </div><!-- end header wrapper -->
        
                <div class="sticky-header"><!-- sticky header -->
            

<!-- header -->
<div class="header">
    <!-- menu -->
    <div class="menu-wrapper">
        <div class="container">
                        <!-- header left -->
            <div class="left">
                <!-- logo -->
                <h1 class="logo">
                    <a href="http://www.ccsrf.com/?lang=en" title="CCSRF - Compliance Certification Services Inc." rel="home">
                        <img src="http://www.ccsrf.com/wp-content/uploads/2014/12/logo1.png" />                    </a>
                </h1>
                <!-- end logo -->
            </div>
            <!-- end header left -->
                    
                                <!-- main menu -->
    <div id="main-menu" class="mega-menu">
    <ul id="menu-menu-tw-%e8%8b%b1%e8%aa%9e0-2" class=""><li id="nav-menu-item-4157" class="menu-item menu-item-type-post_type menu-item-object-page  narrow "><a href="http://www.ccsrf.com/?page_id=2922&amp;lang=en" class="">Company Profile</a></li>
<li id="nav-menu-item-4158" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  has-sub narrow "><h5>News Center</h5>
<div class="popup"><div class="inner" style=""><ul class="sub-menu">
	<li id="nav-menu-item-4305" class="menu-item menu-item-type-custom menu-item-object-custom " data-cols="1"><a href="http://www.ccsrf.com/?cat=3&amp;lang=en" class="">Company News</a></li>
	<li id="nav-menu-item-4307" class="menu-item menu-item-type-custom menu-item-object-custom " data-cols="1"><a href="http://www.ccsrf.com/?cat=42&amp;lang=en" class="">Certification News</a></li>
</ul></div></div>
</li>
<li id="nav-menu-item-4159" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  has-sub wide pos-center col-3"><h5>Service Scope</h5>
<div class="popup"><div class="inner" style=""><ul class="sub-menu">
	<li id="nav-menu-item-5706" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  sub" data-cols="1"><a href="http://www.ccsrf.com/?page_id=2967&amp;lang=en" class="">Product Certification</a>
	<ul class="sub-menu">
		<li id="nav-menu-item-4161" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3139&amp;lang=en" class="">EMC</a></li>
		<li id="nav-menu-item-4162" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3144&amp;lang=en" class="">RF</a></li>
		<li id="nav-menu-item-4163" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3149&amp;lang=en" class="">Automotives</a></li>
		<li id="nav-menu-item-5749" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=5742&amp;lang=en" class="">OTA</a></li>
		<li id="nav-menu-item-5750" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=5722&amp;lang=en" class="">SAR</a></li>
		<li id="nav-menu-item-4164" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3154&amp;lang=en" class="">Global Certification</a></li>
		<li id="nav-menu-item-4209" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3208&amp;lang=en" class="">Railway/Marinetime Application</a></li>
		<li id="nav-menu-item-4165" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3159&amp;lang=en" class="">Accreditations</a></li>
		<li id="nav-menu-item-4916" class="menu-item menu-item-type-custom menu-item-object-custom "><a href="http://rcb.ccsrf.com" class="">RCB</a></li>
	</ul>
</li>
	<li id="nav-menu-item-4166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  sub" data-cols="1"><a href="http://www.ccsrf.com/?page_id=2977&amp;lang=en" class="">Safety Certification</a>
	<ul class="sub-menu">
		<li id="nav-menu-item-4167" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3164&amp;lang=en" class="">IT &#038; Telecom</a></li>
		<li id="nav-menu-item-4168" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3169&amp;lang=en" class="">Audio.Video</a></li>
		<li id="nav-menu-item-4169" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3174&amp;lang=en" class="">Household Appliance</a></li>
		<li id="nav-menu-item-4170" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3178&amp;lang=en" class="">Lighting appliance</a></li>
		<li id="nav-menu-item-5558" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=5539&amp;lang=en" class="">3C lithium-ion power bank &#038; 3C secondary lithium-ion battery / group</a></li>
	</ul>
</li>
	<li id="nav-menu-item-4171" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  sub" data-cols="1"><h5>EMI Components</h5>
	<ul class="sub-menu">
		<li id="nav-menu-item-4172" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3114&amp;lang=en" class="">Inductors</a></li>
		<li id="nav-menu-item-4173" class="menu-item menu-item-type-post_type menu-item-object-page "><a href="http://www.ccsrf.com/?page_id=3119&amp;lang=en" class="">Discretes</a></li>
	</ul>
</li>
</ul></div></div>
</li>
<li id="nav-menu-item-4174" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  has-sub narrow "><h5>Human Resource</h5>
<div class="popup"><div class="inner" style=""><ul class="sub-menu">
	<li id="nav-menu-item-4204" class="menu-item menu-item-type-custom menu-item-object-custom " data-cols="1"><a href="http://www.104.com.tw/jobbank/custjob/index.php?r=cust&amp;j=5a4a426c38463e223c583a1d1d1d1d5f2443a363189j97" class="">Careers</a></li>
	<li id="nav-menu-item-4175" class="menu-item menu-item-type-post_type menu-item-object-page " data-cols="1"><a href="http://www.ccsrf.com/?page_id=3129&amp;lang=en" class="">Facilities</a></li>
	<li id="nav-menu-item-4176" class="menu-item menu-item-type-post_type menu-item-object-page " data-cols="1"><a href="http://www.ccsrf.com/?page_id=3134&amp;lang=en" class="">Benefits</a></li>
</ul></div></div>
</li>
<li id="nav-menu-item-4177" class="menu-item menu-item-type-post_type menu-item-object-page  narrow "><a href="http://www.ccsrf.com/?page_id=3108&amp;lang=en" class="">Contact Us</a></li>
</ul>    </div><!-- end main menu -->
                            
            <!-- quick access -->
            <div class="quick-access search-popup">
                                
                                            </div>
            <!-- end quick access -->
            
                    </div>
        <div class="container-shadow"></div>
    </div>
    <!-- end menu -->
</div>
<!-- end header -->

        </div><!-- end sticky header -->
                
                
        <!-- banner -->
                        <!-- end banner -->

        
        <div id="main" class="column1 wide no-breadcrumbs"><!-- main -->

            
                                                        <!-- main content -->
                                                            <div class="container">                                                                    </div>                                                        
    <div id="content" class="site-content" role="main">
                        
            <article id="post-2902" class="post-2902 page type-page status-publish hentry">
                <header class="entry-header container">
                    
                                    </header><!-- .entry-header -->

                <div class="entry-content">
                    <!-- START REVOLUTION SLIDER 4.0.5 fullwidth mode -->
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#f1f6f7;padding:0px;margin-top:0px;margin-bottom:0px;max-height:600px;">
	<div id="rev_slider_2_1" class="rev_slider fullwidthabanner" style="display:none;max-height:600px;height:600;">
<ul>	<!-- SLIDE  -->
	<li data-transition="random" data-slotamount="7" data-masterspeed="300" >
		<!-- MAIN IMAGE -->
		<img src="http://www.ccsrf.com/wp-content/plugins/revslider/images/dummy.png" style='background-color:#5dafda' alt="blog_19" data-lazyload="http://www.ccsrf.com/wp-content/plugins/revslider/images/transparent.png" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption lfb ltb"
			data-x="64"
			data-y="20" 
			data-speed="1200"
			data-start="600"
			data-easing="Expo.easeOut"
			style="z-index: 2"><img src="http://www.ccsrf.com/wp-content/uploads/2014/12/slider_man_0131.png" alt="">
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption title-with-bg skewfromrightshort stt tp-resizeme"
			data-x="595"
			data-y="109" 
			data-speed="800"
			data-start="900"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 3">Enterprise
		</div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption subtitle-with-bg skewfromrightshort stt tp-resizeme"
			data-x="827"
			data-y="181" 
			data-speed="800"
			data-start="900"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 4">Mission
		</div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption desc sfl stl tp-resizeme"
			data-x="613"
			data-y="281" 
			data-speed="800"
			data-start="1300"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 5">Compliance Certification Services Inc.(CCSrf) has RCB(Taiwan) <br>for certification qualifications, while the TCB through <br>mutual cooperation plan, the process-technology in the <br>United States, Canada, the European Union and Japan, <br>the four regions (8 countries) can provide an efficient <br>hair certificate and verification consulting services.
		</div>

		<!-- LAYER NR. 5 -->
		<div class="tp-caption sfb stb tp-resizeme"
			data-x="1003"
			data-y="532" 
			data-speed="800"
			data-start="1800"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 6"><a href="http://www.ccsrf.com/?page_id=2734" class="btn btn-lg btn-blue">MORE >></a>
		</div>
	</li>
	<!-- SLIDE  -->
	<li data-transition="random" data-slotamount="7" data-masterspeed="300" >
		<!-- MAIN IMAGE -->
		<img src="http://www.ccsrf.com/wp-content/plugins/revslider/images/dummy.png" style='background-color:#f7be50' alt="blog_19" data-lazyload="http://www.ccsrf.com/wp-content/plugins/revslider/images/transparent.png" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption lfb ltb"
			data-x="570"
			data-y="20" 
			data-speed="1200"
			data-start="600"
			data-easing="Expo.easeOut"
			style="z-index: 2"><img src="http://www.ccsrf.com/wp-content/uploads/2014/12/slider_man_031.png" alt="">
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption title-with-bg skewfromrightshort stt tp-resizeme"
			data-x="62"
			data-y="95" 
			data-speed="800"
			data-start="900"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 3">Company
		</div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption subtitle-with-bg skewfromrightshort stt tp-resizeme"
			data-x="266"
			data-y="183" 
			data-speed="800"
			data-start="900"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 4">Vision
		</div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption desc sfl stl tp-resizeme"
			data-x="70"
			data-y="275" 
			data-speed="800"
			data-start="1300"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 5">Our professional services, a wide range of international <br>certification, as well as advanced laboratory facilities, <br>Compliance Certification Services Inc.(CCSrf) has <br>established a global reputation in the field of product <br>certification outstanding image; not only to provide the <br>highest quality testing, inspection and certification <br>services, but also for us the customers simplify and <br>manage the entire global certification throughout the <br>process.
		</div>

		<!-- LAYER NR. 5 -->
		<div class="tp-caption sfb stb tp-resizeme"
			data-x="475"
			data-y="537" 
			data-speed="800"
			data-start="1800"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 6"><a href="http://www.ccsrf.com/?page_id=2734" class="btn btn-lg btn-blue">MORE >></a>
		</div>
	</li>
	<!-- SLIDE  -->
	<li data-transition="random" data-slotamount="7" data-masterspeed="300" >
		<!-- MAIN IMAGE -->
		<img src="http://www.ccsrf.com/wp-content/plugins/revslider/images/dummy.png" style='background-color:#74a95f' alt="blog_19" data-lazyload="http://www.ccsrf.com/wp-content/plugins/revslider/images/transparent.png" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption lfb ltb"
			data-x="98"
			data-y="20" 
			data-speed="1200"
			data-start="600"
			data-easing="Expo.easeOut"
			style="z-index: 2"><img src="http://www.ccsrf.com/wp-content/uploads/2014/12/slider_man_0221.png" alt="">
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption title-with-bg skewfromrightshort stt tp-resizeme"
			data-x="609"
			data-y="186" 
			data-speed="800"
			data-start="900"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 3">INNOVATION
		</div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption subtitle-with-bg skewfromrightshort stt tp-resizeme"
			data-x="836"
			data-y="257" 
			data-speed="800"
			data-start="900"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 4">Service
		</div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption desc sfl stl tp-resizeme"
			data-x="610"
			data-y="340" 
			data-speed="800"
			data-start="1300"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 5">We uphold the “customer first, quality excellence” for the <br>concept of sustainable development.
		</div>

		<!-- LAYER NR. 5 -->
		<div class="tp-caption sfb stb tp-resizeme"
			data-x="1041"
			data-y="509" 
			data-speed="800"
			data-start="1800"
			data-easing="Power3.easeIn"
			data-endspeed="300"
			style="z-index: 6"><a href="http://www.ccsrf.com/?page_id=2734" class="btn btn-lg btn-blue">MORE >></a>
		</div>
	</li>
</ul>
	</div>
</div>			
			<script type="text/javascript">

				var tpj=jQuery;				
				tpj.noConflict();				
				var revapi2;
				
				tpj(document).ready(function() {
								
				if(tpj('#rev_slider_2_1').revolution == undefined)
					revslider_showDoubleJqueryError('#rev_slider_2_1');
				else
				   revapi2 = tpj('#rev_slider_2_1').show().revolution(
					{
						delay:4000,
						startwidth:1170,
						startheight:600,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:3,
						
						navigationType:"bullet",
						navigationArrows:"solo",
						navigationStyle:"round",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:0,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:0,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:0,
						soloArrowRightVOffset:0,
								
						shadow:0,
						fullWidth:"on",
						fullScreen:"off",

						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						
						shuffle:"off",
						
						autoHeight:"off",						
						forceFullWidth:"off",						
												
						hideThumbsOnMobile:"off",
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,
						
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0,
						videoJsPath:"http://www.ccsrf.com/wp-content/plugins/revslider/rs-plugin/videojs/",
						fullScreenOffsetContainer: ""	
					});
				
				});	//ready
				
			</script>
			
			<!-- END REVOLUTION SLIDER -->
                    <div class=" container">
                                        </div>
                </div><!-- .entry-content -->
                
            </article><!-- #post -->

                        </div>

                                        
                    
                                
            
        </div><!-- end main -->

        


<div class="footer-wrapper"><!-- footer wrapper -->
    
        
    <div class="footer-bottom"><!-- social links & copyright -->
        <div class="container">
            <div class="social-links left">

                
                
                
                
                
                
                
                
                            </div>
            <div class="copyright right">
                © 2014 Compliance Certification Services Inc. All Rights Reserved.            </div>
        </div>
    </div><!-- social links & copyright -->
</div><!-- end footer wrapper -->

<!-- The Gallery as lightbox dialog -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-start-slideshow="true" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

<script type="text/javascript">
/* <![CDATA[ */
                        jQuery(document).ready(function(){

});                    /* ]]> */
</script>
    
    </div><!-- end wrapper -->

<script type="text/javascript">var addthis_for_wordpress = 'wpp-4.0';
</script><script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid="></script><script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/www.ccsrf.com\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.0.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/www.ccsrf.com\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif","i18n_view_cart":"View Cart","cart_url":"","is_cart":"","cart_redirect_after_add":"no"};
var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/www.ccsrf.com\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif","i18n_view_cart":"View Cart","cart_url":"","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type='text/javascript' src='//www.ccsrf.com/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=2.2.8'></script>
<script type='text/javascript' src='//www.ccsrf.com/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.60'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/www.ccsrf.com\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"};
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/www.ccsrf.com\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"};
/* ]]> */
</script>
<script type='text/javascript' src='//www.ccsrf.com/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=2.2.8'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/wp-retina-2x/js/retina.js?ver=1.3.0'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var yith_woocompare = {"nonceadd":"422c1dca51","nonceremove":"45d1a0cec4","nonceview":"91e567cb14","ajaxurl":"http:\/\/www.ccsrf.com\/wp-admin\/admin-ajax.php","actionadd":"yith-woocompare-add-product","actionremove":"yith-woocompare-remove-product","actionview":"yith-woocompare-view-table","added_label":"Added","table_title":"Product Comparison","auto_open":"yes"};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/yith-woocommerce-compare/assets/js/woocompare.js?ver=1.2.1'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/yith-woocommerce-compare/assets/js/jquery.colorbox-min.js?ver=1.4.21'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var yith_wcwl_l10n = {"out_of_stock":"Cannot add to the cart as product is Out of Stock!"};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.yith-wcwl.js?ver=1.0'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/themes/ccsrf/js/plugins.min.js'></script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/themes/ccsrf/js/blueimp/jquery.blueimp-gallery.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var js_venedor_vars = {"post_slider_zoom":"1","portfolio_slider_zoom":"1","infinte_blog_text":"<em>Loading the next items...<\/em>","infinte_blog_finished_msg":"<em>Loaded all the items.<\/em>","theme_color":"#e84c3d","googleplus":"Google Plus","pinterest":"Pinterest","email":"Email","ajax_url":"http:\/\/www.ccsrf.com\/wp-admin\/admin-ajax.php","menu_item_padding":"static","sidebar_scroll":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/themes/ccsrf/js/venedor.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var icl_vars = {"current_language":"en","icl_home":"http:\/\/www.ccsrf.com?lang=en"};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.ccsrf.com/wp-content/plugins/sitepress-multilingual-cms/res/js/sitepress.js?ver=4.0.10'></script>
<!--wp_footer-->
</body>
</html>