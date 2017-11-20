<!doctype html>
<html>
    <head>
        <title>Social Communicator</title>
        <style>
            @media only screen and (max-width : 540px)
            {
                .chat-sidebar
                {
                    display: none !important;
                }

                .chat-popup
                {
                    display: none !important;
                }
            }

            body
            {
                background-color: #e9eaed;
            }

            .chat-sidebar
            {
                width: 200px;
                position: fixed;
                height: 100%;
                right: 0px;
                top: 0px;
                bottom: 0px;
                padding-top: 10px;
                padding-bottom: 10px;
                border: 1px solid rgba(29, 49, 91, .3);
                overflow-y: scroll;
            }

            .sidebar-name
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }

            .sidebar-name span
            {
                padding-left: 5px;
            }

            .sidebar-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }

            .sidebar-name:hover
            {
                background-color:#e1e2e5;
            }

            .sidebar-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }

            .popup-box
            {
                display: none;
                position: fixed;
                bottom: 0px;
                right: 220px;
                height: 285px;
                background-color: rgb(237, 239, 244);
                width: 300px;
                border: 1px solid rgba(29, 49, 91, .3);
            }

            .popup-box .popup-head
            {
                background-color: #6d84b4;
                padding: 5px;
                color: white;
                font-weight: bold;
                font-size: 14px;
                clear: both;
            }

            .popup-box .popup-head .popup-head-left
            {
                float: left;
            }

            .popup-box .popup-head .popup-head-right
            {
                float: right;
                opacity: 0.5;
            }

            .popup-box .popup-head .popup-head-right a
            {
                text-decoration: none;
                color: inherit;
            }

            .popup-box .popup-messages
            {
                height: 100%;
                overflow-y: scroll;
                position: relative;
            
            }
            .popup-text
            {
                position: absolute;
                bottom: 0px;
                
            }
            
            .send {
                -webkit-appearance: none;
                width: 70px;
                height: 20px;
            }




        </style>
        
        <script language="javascript" type="text/javascript">
          
          <?php
              session_start();
              ?>
              user = "<?php echo($_SESSION['login_user']) ?>";
              inuser = ""
              var optext = [];
          function init()
          {
        	
              doConnect();
          }
          function doConnect()
          {
            websocket = new WebSocket("ws://35.197.90.146:9000/");
            websocket.onopen = function(evt) { onOpen(evt) };
            websocket.onclose = function(evt) { onClose(evt) };
            websocket.onmessage = function(evt) { onMessage(evt) };
            websocket.onerror = function(evt) { onError(evt) };
          }
          function onOpen(evt)
          {
            websocket.send(user + ";" + "TEST");
        	
          }
          function onClose(evt)
          {
            writeToScreen("disconnected\n");
        	
          }
          function onMessage(evt)
          {
              found = 0;
              inuser = evt.data.split(";",3)[0];
            for(var iii = 0; iii < popups.length; iii++)
                {
                    optext[iii] = document.getElementById(popups[iii].concat("optext")).value;
                    //already registered. Bring it to front.
                    if(inuser == popups[iii])
                    {
                        Array.remove(popups, iii);
                        temphold = optext[iii];
                        Array.remove(optext, iii);
                        popups.unshift(inuser);
                        optext.unshift(temphold);
                        calculate_popups();
                        found = 1;
                        for(var iii = 0; iii < popups.length; iii++)
                        {
                            document.getElementById(popups[iii].concat("optext")).value = optext[iii];
                        }
                    }
                }
            if (found == 0){
                
                register_popup(inuser, inuser);
            }
            writeToScreen(evt.data.split(";",3)[0]+': '+evt.data.split(";",3)[2] +'\n');
          }
          function onError(evt)
          {
            writeToScreen('error: ' + evt.data + '\n');
        	websocket.close();
        	
          }
          function doSend(message)
          {
            writeToScreen("You: " + message.split(";",2)[1] + '\n');
            websocket.send(user + ";" + message);
            document.getElementById(inuser.concat("iptext")).value = ""
          }
          function writeToScreen(message)
          {
            document.getElementById(inuser.concat("optext")).value += message
        	document.getElementById(inuser.concat("optext")).scrollTop = document.getElementById(inuser.concat("optext")).scrollHeight;
          }
          window.addEventListener("load", init, false);
           function sendText(id) {
                   inuser = id;
        		doSend(id + ";" + document.getElementById(id.concat("iptext")).value);
           }
          function clearText() {
        		document.myform.outputtext.value = "";
           }
           function doDisconnect() {
        		websocket.close();
           }
        </script>


        <script>
            //this function can remove a array element.
            Array.remove = function(array, from, to) {
                var rest = array.slice((to || from) + 1 || array.length);
                array.length = from < 0 ? array.length + from : from;
                return array.push.apply(array, rest);
            };

            //this variable represents the total number of popups can be displayed according to the viewport width
            var total_popups = 0;

            //arrays of popups ids
            var popups = [];

            //this is used to close a popup
            function close_popup(id)
            {
                for(var iii = 0; iii < popups.length; iii++)
                {
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);
                        Array.remove(optext, iii);
                        document.getElementById(id).style.display = "none";

                        calculate_popups();
                        for(var iii = 0; iii < popups.length; iii++)
                        {
                            document.getElementById(popups[iii].concat("optext")).value = optext[iii];
                        }
                        return;
                    }
                }
            }

            //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
            function display_popups()
            {
                var right = 220;

                var iii = 0;
                for(iii; iii < total_popups; iii++)
                {
                    if(popups[iii] != undefined)
                    {
                        var element = document.getElementById(popups[iii]);
                        element.style.right = right + "px";
                        right = right + 320;
                        element.style.display = "block";
                    }
                }

                for(var jjj = iii; jjj < popups.length; jjj++)
                {
                    var element = document.getElementById(popups[jjj]);
                    element.style.display = "none";
                }
            }

            //creates markup for a new popup. Adds the id to popups array.
            function register_popup(id, name)
            {

                for(var iii = 0; iii < popups.length; iii++)
                {
                    optext[iii] = document.getElementById(popups[iii].concat("optext")).value;
                    //already registered. Bring it to front.
                    if(id == popups[iii])
                    {
                        
                        Array.remove(popups, iii);
                        var temphold = optext[iii];
                        Array.remove(optext, iii);
                        popups.unshift(id);
                        optext.unshift(temphold);

                        calculate_popups();
                        for(var iii = 0; iii < popups.length; iii++)
                        {
                            document.getElementById(popups[iii].concat("optext")).value = optext[iii];
                        }

                        return;
                    }
                }

                var element = '<div class="popup-box chat-popup" id="'+ id +'">';
                element = element + '<div class="popup-head">';
                element = element + '<div class="popup-head-left">'+ name +'</div>';
                element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
                element = element + '<div style="clear: both"></div></div><div class="popup-messages">';
                element = element + '<form id='+id.concat("form")+'><textarea readonly id='+ id.concat("optext") + ' rows="16" cols="47"></textarea></textarea><textarea id='+ id.concat("iptext") + ' rows="2" cols="33"></textarea> <input class="send" type="button" name=sendButton id="send" value="Send" onClick="sendText(\''+ id +'\');"></form></div></div>';
                
                document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;

                popups.unshift(id);
                optext.unshift("");

                calculate_popups();
                for(var iii = 0; iii < popups.length; iii++)
                        {
                            document.getElementById(popups[iii].concat("optext")).value = optext[iii];
                        }

            }

            //calculate the total number of popups suitable and then populate the toatal_popups variable.
            function calculate_popups()
            {
                var width = window.innerWidth;
                if(width < 540)
                {
                    total_popups = 0;
                }
                else
                {
                    width = width - 200;
                    //320 is width of a single popup box
                    total_popups = parseInt(width/320);
                }

                display_popups();

            }

            //recalculate when window is loaded and also when window is resized.
            window.addEventListener("resize", calculate_popups);
            window.addEventListener("load", calculate_popups);

        </script>
    </head>
    <body>
        <div class="chat-sidebar">
            
            <div class="sidebar-name">
                <!-- Pass username and display name to register popup -->
                <a href="javascript:register_popup('911', '911 - Emergency');">
                    <img width="30" height="30" src="https://scontent-sjc2-1.xx.fbcdn.net/v/t1.0-9/1966860_10203635303187228_940938618_n.jpg?oh=93caaa2b1784b28ee0d2eda0404c1255&oe=5AA5DC11" />
                    <span>911 - Emergency</span>
                </a>
            </div>
            <?php
                $connection = mysqli_connect("localhost", "admin", "redhat");
                // Selecting Database
                    $db = mysqli_select_db($connection, "cmpe281");
                    // SQL query to fetch information of registerd users and finds user match.
                    $query = mysqli_query($connection, "select `username`, `first name` from userdata;");
                    $rows = mysqli_num_rows($query);
                    if ($rows > 0) {
                        while ($user = $query->fetch_assoc()) {
                ?>
                    <div class="sidebar-name">
                        <!-- Pass username and display name to register popup -->
                        <a href="javascript:register_popup('<?php echo($user["username"]) ?>', '<?php echo($user["first name"]) ?>');">
                            <img width="30" height="30" src="https://scontent-sjc2-1.xx.fbcdn.net/v/t1.0-9/1966860_10203635303187228_940938618_n.jpg?oh=93caaa2b1784b28ee0d2eda0404c1255&oe=5AA5DC11" />
                            <span><?php echo($user["first name"]) ?></span>
                        </a>
                    </div>
            
                <?php
                        }
                    }
                ?>
        </div>
            <script src="https://static.hsstatic.net/jquery-libs/static-1.4/jquery/jquery-1.11.2.js"></script>
    <script type="text/javascript">hsjQuery = window['jQuery']</script>
    <link href="https://static.hsstatic.net/content_shared_assets/static-1.4049/css/public_common.css" rel="stylesheet">
    <meta property="og:description" content=".">
    <meta property="og:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:title" content="">


    
    

    
    
    <link rel="canonical" href="http://www.e-zest.com/bpm_consulting/">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-362796-1', 'auto');
  ga('send', 'pageview');

</script>

<meta property="og:image" content="images/abclogo.jpg">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="200">
<meta property="og:image:height" content="200">
<meta property="og:url" content="http://abc-consulting.tk/">
<link href="//cdn2.hubspot.net/hub/-1/hub_generated/template_assets/1495141902003/hubspot_default/shared/responsive/layout.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://www.e-zest.com/hs-fs/hub/744339/hub_generated/template_assets/1499943837348/custom/system/css/Act-Theme-Custom.min.css">


    <!-- The style tag has been deprecated. Attached stylesheets are included in the required_head_tags page variable. -->
    <!-- Act Theme Main.js, please do not delete -->
<script src="//cdn2.hubspot.net/hub/273774/file-1924801657-js/mp/themes/Act-Theme/js/act-async-load.js"></script>
<!--/ Act Theme Main.js, please do not delete -->
    


</head>
<body class="act-theme act-two-column-hero   hs-content-id-3699427022 hs-site-page page " style="">
    <div class="header-container-wrapper">
    <div class="header-container container-fluid">

        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
        <div class="row-fluid ">
            <div class="span12 widget-span widget-type-global_group " style="" data-widget-type="global_group" data-x="0" data-w="12">
<!-- start coded_template: id:3646437396 path:generated_global_groups/3646437371.html -->
<div class="" data-global-widget-path="generated_global_groups/3646437371.html"><div class="row-fluid-wrapper row-depth-1 row-number-1 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell header-wrapper with-navigation" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-2 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell header-inner-wrapper centered" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-3 ">
<div class="row-fluid ">
<div class="span4 widget-span widget-type-logo header-logo" style="" data-widget-type="logo" data-x="0" data-w="4">
<!--end layout-widget-wrapper -->
</div><!--end widget-span -->
<div class="span8 widget-span widget-type-menu menu-reset flyouts-fade flyouts-slide main-navigation sticky menu-top-15" style="" data-widget-type="menu" data-x="4" data-w="8">
<div class="cell-wrapper layout-widget-wrapper">
<span id="hs_cos_wrapper_module_14496767418724" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_menu" style="" data-hs-cos-general-type="widget" data-hs-cos-type="menu"><div id="hs_menu_wrapper_module_14496767418724" class="hs-menu-wrapper active-branch flyouts hs-menu-flow-horizontal" role="navigation" data-sitemap-name="Main">
 <ul>
  <li class="hs-menu-item hs-menu-depth-1 hs-item-has-children"><a href="../index.php">Home</a>
  </li>
  <li class="hs-menu-item hs-menu-depth-1 hs-item-has-children"><a href="../php/logout.php">Logout</a>
  </li>
  <li class="hs-menu-item hs-menu-depth-1"><a href="https://navoday91.wordpress.com/"><span>Blog</span></a></li>
 </ul>
</div></span></div><!--end layout-widget-wrapper -->
</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->
</div><!-- end coded_template: id:3646437396 path:generated_global_groups/3646437371.html -->

            </div><!--end widget-span -->
        </div><!--end row-->
        </div><!--end row-wrapper -->

    </div><!--end header -->
</div><!--end header wrapper -->

<div class="body-container-wrapper">
    <div class="body-container container-fluid">

        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
        <div class="row-fluid ">
            <div class="span12 widget-span widget-type-cell hero-wrapper" style="" data-widget-type="cell" data-x="0" data-w="12">

                <div class="row-fluid-wrapper row-depth-1 row-number-2 ">
                <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-cell centered-small" style="" data-widget-type="cell" data-x="0" data-w="12">

                        <div class="row-fluid-wrapper row-depth-2 row-number-1 ">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-header " style="" data-widget-type="header" data-x="0" data-w="12">
                                <div class="cell-wrapper layout-widget-wrapper">
                                    <span id="hs_cos_wrapper_module_14509432248707604" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_header" style="" data-hs-cos-general-type="widget" data-hs-cos-type="header"><h1><span id="hs_cos_wrapper_name" class="hs_cos_wrapper hs_cos_wrapper_meta_field hs_cos_wrapper_type_text" style="" data-hs-cos-general-type="meta_field" data-hs-cos-type="text">
                                        Products Visited
                                    </span></h1></span>
                                </div><!--end layout-widget-wrapper -->
                            </div><!--end widget-span -->
                        </div><!--end row-->
                        </div><!--end row-wrapper -->
                        <div class="row-fluid-wrapper row-depth-2 row-number-2 ">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-rich_text " style="" data-widget-type="rich_text" data-x="0" data-w="12">
                                <div class="cell-wrapper layout-widget-wrapper">
                                    <span id="hs_cos_wrapper_module_14509432659418859" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><p>You visited these products recently</p></span>
                                </div><!--end layout-widget-wrapper -->
                            </div><!--end widget-span -->
                        </div><!--end row-->
                        </div><!--end row-wrapper -->
                        <div class="row-fluid-wrapper row-depth-2 row-number-3 ">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-rich_text " style="" data-widget-type="rich_text" data-x="0" data-w="12">
                                <div class="cell-wrapper layout-widget-wrapper">
                                    <span id="hs_cos_wrapper_module_145112232657853958" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><p><a class="default-button" href="/request-for-services">Get In Touch ›</a></p></span>
                                </div><!--end layout-widget-wrapper -->
                            </div><!--end widget-span -->
                        </div><!--end row-->
                        </div><!--end row-wrapper -->
                    </div><!--end widget-span -->
            </div><!--end row-->
            </div><!--end row-wrapper -->
            <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
            <div class="row-fluid ">
                <div class="span12 widget-span widget-type-raw_jinja " style="" data-widget-type="raw_jinja" data-x="0" data-w="12">

    
    
    
    
    

    
    

    
    
    

    
    
    
    
    

    

    

    

    











    <style>

        body .hero-wrapper {

            
            

            
            

            
            
                background-color: #fcfcfc;
            

            
            
                background-image: url(https://www.e-zest.com/hubfs/background_images/mgmt-consulting-services.jpg?t=1510343398533);
            

            
            
                background-position: center center;
            

            
            
                background-repeat: no-repeat;
            

            
            
                background-attachment: fixed;
            

            
            
                -webkit-background-size: cover;
                background-size: cover;
            

            
            
        }
        
        
        
        
        
        
            body .hero-wrapper,
            body .hero-wrapper q,
            body .hero-wrapper blockquote,
            body .hero-wrapper hr,
            body .hero-wrapper .field > label {
                color: #ffffff;
            }
            body .hero-wrapper hr {
                background: #ffffff;
            }
        
        
        
        
            body .hero-wrapper h1,
            body .hero-wrapper h2,
            body .hero-wrapper h3,
            body .hero-wrapper h4,
            body .hero-wrapper h5,
            body .hero-wrapper h6,
            body .hero-wrapper .section-intro {
                color: #ffffff;
            }
            body .hero-wrapper h1:after {
                background: #ffffff;
            }
        

        
        
            body .hero-wrapper a {
                color: #ffffff;
            }
        

    </style>



</div><!--end widget-span -->

            </div><!--end row-->
            </div><!--end row-wrapper -->
        </div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->
<div class="row-fluid-wrapper row-depth-0 row-number-1 ">
<div class="row-fluid ">
    <div class="span12 widget-span widget-type-cell content-section columns-section two-column-right-section" style="" data-widget-type="cell" data-x="0" data-w="12">

        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
        <div class="row-fluid ">
            <div class="span12 widget-span widget-type-cell centered column-equal-height medium-stack" style="" data-widget-type="cell" data-x="0" data-w="12">

                <div class="row-fluid-wrapper row-depth-1 row-number-2 ">
                <div class="row-fluid ">
                    <div class="span8 widget-span widget-type-widget_container column main-column" style="" data-widget-type="widget_container" data-x="0" data-w="8">
                        <span id="hs_cos_wrapper_module_14045563837526290" class="hs_cos_wrapper hs_cos_wrapper_widget_container hs_cos_wrapper_type_widget_container" style="" data-hs-cos-general-type="widget_container" data-hs-cos-type="widget_container"><div id="hs_cos_wrapper_widget_3699427007" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><p><span class="hs_cos_wrapper hs_cos_wrapper_widget_container hs_cos_wrapper_type_widget_container" data-hs-cos-general-type="widget_container" data-hs-cos-type="widget_container">
                                        <ul>
                                        <?php 
                                            if($cookie_value[4] == 0){
                                                echo("No Products Visited");
                                            }
                                            else{
                                                $i = 4;
                                                for ($i=4;$i>=0 && $cookie_value[$i]>0;$i--){
                                                    ?>
                                                    <li>
                                                    <?php
                                                    echo($services_dict[$cookie_value[$i]]);
                                                    ?>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        </ul>
</div></div></span>
                    
    </div><!--end row-->
    </div><!--end row-wrapper -->
</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

    </div><!--end body -->
</div><!--end body wrapper -->

<div class="footer-container-wrapper">
    <div class="footer-container container-fluid">

        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
        <div class="row-fluid ">
            <div class="span12 widget-span widget-type-global_group " style="" data-widget-type="global_group" data-x="0" data-w="12">
<!-- start coded_template: id:3670990962 path:generated_global_groups/3670990947.html -->
<div class="" data-global-widget-path="generated_global_groups/3670990947.html"><div class="row-fluid-wrapper row-depth-1 row-number-1 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell footer-wrapper" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-2 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell footer-main" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-3 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell centered medium-stack" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-4 ">
<div class="row-fluid ">
<div class="span3 widget-span widget-type-cell footer-column" style="" data-widget-type="cell" data-x="0" data-w="3">

<div class="row-fluid-wrapper row-depth-2 row-number-1 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-linked_image " style="" data-widget-type="linked_image" data-x="0" data-w="12">
<div class="cell-wrapper layout-widget-wrapper">

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->



</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

<div class="row-fluid-wrapper row-depth-1 row-number-1 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell footer-bottom" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-2 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell centered" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-3 ">
<div class="row-fluid ">
<div class="span6 widget-span widget-type-page_footer footer-copyright1 footer-go-foggy" style="" data-widget-type="page_footer" data-x="0" data-w="6">
<div class="cell-wrapper layout-widget-wrapper">
<span id="hs_cos_wrapper_module_144967676630618" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_page_footer" style="" data-hs-cos-general-type="widget" data-hs-cos-type="page_footer">
<footer>
    <span class="hs-footer-company-copyright">© 2017 ABC Consulting</span>
</footer>
</span></div><!--end layout-widget-wrapper -->
</div><!--end widget-span -->
<div class="span6 widget-span widget-type-rich_text " style="" data-widget-type="rich_text" data-x="6" data-w="6">
<div class="cell-wrapper layout-widget-wrapper">
</div><!--end layout-widget-wrapper -->
</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->
</div><!-- end coded_template: id:3670990962 path:generated_global_groups/3670990947.html -->

            </div><!--end widget-span -->
        </div><!--end row-->
        </div><!--end row-wrapper -->

    </div><!--end footer -->
</div><!--end footer wrapper -->


    
<script type="text/javascript" src="https://static.hsstatic.net/content_shared_assets/static-1.4049/js/public_common.js"></script>
<script src="https://static.hsstatic.net/AsyncSupport/static-1.7/js/post_listing_asset.js"></script>
<script>
  hsjQuery(document).ready(function () {
    var options = {
      'id': "769389336",
      'listing_url': "/_hcms/postlisting?blogId=3203284127&maxLinks=4&listingType=recent&orderByViews=false&hs-expires=1510948570&hs-version=1&hs-signature=AIj1bPu_wEV1mX3BQFFGxva6jXwLwEzDoA",
      'include_featured_image': false
    };
    window.hsPopulateListingFeed(options);
  });
</script>


        <!--[if lte IE 8]>
        <script charset="utf-8" src="https://js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
     
<script src="https://js.hsforms.net/forms/v2.js"></script>

    <script>
        hbspt.forms.create({
            portalId: '744339',
            formId: '22c3f1ae-be53-4109-b02c-7c16cbfd6f26',
            formInstanceId: '3043',
            pageId: 3699427022,
            
            
            
            
            pageName: "Business Process Management (BPM) Consulting Services",
            
            
            redirectUrl: "http:\/\/www.e-zest.com\/bpm_consulting\/?portalId=744339&hsFormKey=82c8f16f8eb4834c41d62892df3e71ac#module_144967676630613",
            
            
            
            css: '',
            target: '#hs_form_target_module_144967676630613',
            
            
            
            
            
            contentType: "standard-page",
            
            formData: {
            cssClass: 'hs-form stacked hs-custom-form'
            }
        });
    </script>


<!-- Start of HubSpot Analytics Code -->
<script type="text/javascript">
var _hsq = _hsq || [];
_hsq.push(["setContentType", "standard-page"]);
_hsq.push(["setCanonicalUrl", "http:\/\/www.e-zest.com\/bpm_consulting\/"]);
_hsq.push(["setPageId", "3699427022"]);
_hsq.push(["setContentMetadata", {
    "contentPageId": 3699427022,
    "legacyPageId": "3699427022",
    "contentGroupId": null,
    "abTestId": null,
    "languageVariantId": 3699427022,
    "languageCode": null
}]);
_hsq.push(["setTargetedContentMetadata", []]);
</script>

<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/744339.js"></script>
<!-- End of HubSpot Analytics Code -->


<script type="text/javascript">
var hsVars = {
    ticks: 1510343470960,
    page_id: 3699427022,
    content_group_id: 0,
    portal_id: 744339,
    app_hs_base_url: "https://app.hubspot.com",
    language: "en",
    analytics_page_type: "standard-page"
}
</script>


    </body>
</html>