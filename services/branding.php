
<!doctype html>
<?php
$page_id = 4;
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
<!-- start coded_template: id:3859515515 path:generated_layouts/3859515505.html --><!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]--><!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en">        <![endif]--><!--[if IE 8]>    <html class="no-js lt-ie9" lang="en">               <![endif]--><!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]--><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="ABC Solutions">
    <meta name="description" content="ABC Consulting provides analytics services and understands perspective required for building and implementation of Business and Market Data.">
    <meta name="generator" content="HubSpot">
    <title>Branding</title>
    <link rel="shortcut icon" href="https://www.e-zest.com/hubfs/images/sitefavicon.ico?t=1510343398533">

    
    
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
                                    <span id="hs_cos_wrapper_module_14509432248707604" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_header" style="" data-hs-cos-general-type="widget" data-hs-cos-type="header"><h1><span id="hs_cos_wrapper_name" class="hs_cos_wrapper hs_cos_wrapper_meta_field hs_cos_wrapper_type_text" style="" data-hs-cos-general-type="meta_field" data-hs-cos-type="text">Branding Services</span></h1></span>
                                </div><!--end layout-widget-wrapper -->
                            </div><!--end widget-span -->
                        </div><!--end row-->
                        </div><!--end row-wrapper -->
                        <div class="row-fluid-wrapper row-depth-2 row-number-2 ">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-rich_text " style="" data-widget-type="rich_text" data-x="0" data-w="12">
                                <div class="cell-wrapper layout-widget-wrapper">
                                    <span id="hs_cos_wrapper_module_14509432659418859" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><p>Helping businesses become visible</p></span>
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
                        <span id="hs_cos_wrapper_module_14045563837526290" class="hs_cos_wrapper hs_cos_wrapper_widget_container hs_cos_wrapper_type_widget_container" style="" data-hs-cos-general-type="widget_container" data-hs-cos-type="widget_container"><div id="hs_cos_wrapper_widget_3699427007" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><p><span class="hs_cos_wrapper hs_cos_wrapper_widget_container hs_cos_wrapper_type_widget_container" data-hs-cos-general-type="widget_container" data-hs-cos-type="widget_container">A strong brand architecture will harness economies of scale.

Brand Architecture is a challenge that comes with success.  You create a new product line, a new profit center or a new service, better yet you grow or acquire a new business but with all this growth when do you take stock of the logos you have acquired.  When and how do you make the time to get your house of brands in order.  After all when we grow these brands and build these businesses the expectation is to harness “economies”.  Without a coherent brand architecture, you are lost, you spend money marketing brands that don’t reinforce one another, you create runts, and your marketing efforts get bogged down by costs and complexities… it’s simple, you’re not harnessing “brand equity” and it’s time consuming, expensive and inefficient.

Let ABC help you explore your brand architecture, it’s an exercise we have a lot of experience doing. We’ll help you create a brand persona that fits your market, products and audience. We’ll take a holistic look at your house of brands and tie them together with our logo development process and brand architecture analysis.  Our logo creation process will help your business look professional, and we’ll also work with your company (or companies) on creating an effective brand architecture strategy making your brand consistent and recognizable across all channels.  Don’t just take our word for it check out these case studies Chinburg Properties & Key Auto Group, blog posts Brand Strategy and it’s effects on SEO, Brand Architecture Strategy, building brand value and articles.

Achieve economies of scale with a strong brand architecture:
Logo development
Logo & Brand Strategy
Corporate Style Guides
Brand Guidelines
SEO through brand & web architecture
Analysis, Research and experience
</div></div></span>
                    </div><!--end widget-span -->
                    <div class="span4 widget-span widget-type-widget_container column sidebar right" style="" data-widget-type="widget_container" data-x="8" data-w="4">
                        <span id="hs_cos_wrapper_module_140455646182616613" class="hs_cos_wrapper hs_cos_wrapper_widget_container hs_cos_wrapper_type_widget_container" style="" data-hs-cos-general-type="widget_container" data-hs-cos-type="widget_container"><div id="hs_cos_wrapper_widget_3699427012" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><div class="module-wrapper"><p><!--HubSpot Call-to-Action Code --> 
<span class="hs-cta-wrapper" id="hs-cta-wrapper-09d4a015-7569-4ef5-a534-f74fa28e6e34"> <span class="hs-cta-node hs-cta-09d4a015-7569-4ef5-a534-f74fa28e6e34" id="hs-cta-09d4a015-7569-4ef5-a534-f74fa28e6e34"> 
<!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]--> <a href="http://cta-redirect.hubspot.com/cta/redirect/744339/09d4a015-7569-4ef5-a534-f74fa28e6e34"><img class="hs-cta-img" id="hs-cta-img-09d4a015-7569-4ef5-a534-f74fa28e6e34" style="border-width:0px;" src="https://no-cache.hubspot.com/cta/default/744339/09d4a015-7569-4ef5-a534-f74fa28e6e34.png" alt="Request for Services"></a> </span> <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script> <script type="text/javascript">
hbspt.cta.load(744339, '09d4a015-7569-4ef5-a534-f74fa28e6e34');
</script> </span> 
<!-- end HubSpot Call-to-Action Code --><br> <!--HubSpot Call-to-Action Code --> 
<span class="hs-cta-wrapper" id="hs-cta-wrapper-50499f26-1836-40ae-8258-c9777ad4cc5c"> <span class="hs-cta-node hs-cta-50499f26-1836-40ae-8258-c9777ad4cc5c" id="hs-cta-50499f26-1836-40ae-8258-c9777ad4cc5c"> 
<!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]--> <a href="http://cta-redirect.hubspot.com/cta/redirect/744339/50499f26-1836-40ae-8258-c9777ad4cc5c"><img class="hs-cta-img" id="hs-cta-img-50499f26-1836-40ae-8258-c9777ad4cc5c" style="border-width:0px;" src="https://no-cache.hubspot.com/cta/default/744339/50499f26-1836-40ae-8258-c9777ad4cc5c.png" alt="White Papers"></a> </span> <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script> <script type="text/javascript">
hbspt.cta.load(744339, '50499f26-1836-40ae-8258-c9777ad4cc5c');
</script> </span> 
<!-- end HubSpot Call-to-Action Code --><br> <!--HubSpot Call-to-Action Code --> 
<span class="hs-cta-wrapper" id="hs-cta-wrapper-88f4cc0d-6d60-437d-9bea-8673f7a053fe"> <span class="hs-cta-node hs-cta-88f4cc0d-6d60-437d-9bea-8673f7a053fe" id="hs-cta-88f4cc0d-6d60-437d-9bea-8673f7a053fe"> 
<!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]--> <a href="http://cta-redirect.hubspot.com/cta/redirect/744339/88f4cc0d-6d60-437d-9bea-8673f7a053fe"><img class="hs-cta-img" id="hs-cta-img-88f4cc0d-6d60-437d-9bea-8673f7a053fe" style="border-width:0px;" src="https://no-cache.hubspot.com/cta/default/744339/88f4cc0d-6d60-437d-9bea-8673f7a053fe.png" alt="Case Studies"></a> </span> <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script> <script type="text/javascript">
hbspt.cta.load(744339, '88f4cc0d-6d60-437d-9bea-8673f7a053fe');
</script> </span> 
<!-- end HubSpot Call-to-Action Code --></p> </div></div>
<div id="hs_cos_wrapper_widget_3699427017" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><div class="module-wrapper"><h3>Related Information</h3>
<ul>
<li><a href="/microsoft-crm-consulting/">Microsoft CRM Consulting</a></li>
<li><a href="/km_consulting/">Knowledge Management Consulting</a></li>
<li><a href="/open_source_consulting/">Open Source Consulting</a></li>
<li><a href="/feasibility-analysis-india/">Feasibility Analysis Consulting</a></li>
<li><a href="/e-business_consulting/">e-Business Consulting</a></li>
<li><a href="/crm-consulting/">CRM Consluting</a></li>
<li><a href="/technical_consulting/">Technology Consulting</a></li>
<li><a href="/business_consulting/">Business Consulting</a></li>
<li><a href="/web-2.0-application-development-services">Web 2.0 Development</a></li>
</ul> </div></div></span>
                    </div><!--end widget-span -->
                </div><!--end row-->
                </div><!--end row-wrapper -->
            </div><!--end widget-span -->
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
<span id="hs_cos_wrapper_module_14514766896621473" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><p style="text-align: right;"><a href="http://www.e-zest.net/privacypolicy/">Privacy Policy</a> &nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.e-zest.net/legal-disclaimer">Disclaimer</a></p></span>
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






    <!-- Generated by the HubSpot Template Builder - template version 1.03 -->

<!-- end coded_template: id:3859515515 path:generated_layouts/3859515505.html -->
</body></html>