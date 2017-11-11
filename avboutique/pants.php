<!DOCTYPE html>
<?php
$page_id =5;
$cookien = "av_visits";
$cookiev = $_COOKIE[$cookien];
$cookiev = json_decode($cookiev, true);
if (in_array($page_id, $cookiev)){
for($i=array_search($page_id,$cookiev);$i<4;$i++){
$cookiev[$i] = $cookiev[$i+1];
}
}
else{
$i = 0;
for($i=0;$i<4;$i++){
$cookiev[$i] = $cookiev[$i+1];
}
}
$cookiev[4] = $page_id;
setcookie($cookien,json_encode($cookiev), time() + (86400*30), "/");

?>
<html>
<head>
<title>Pant Suites</title>
<link href="avstyle.css" type="text/css" rel="stylesheet">
<style>
p {
font-family:arial;
font-size:20;
}
li {
font-family:arial;
font-size:20;
}
</style>
</head>
<body>
<p>The following Pant Suites are available</p>
<ul>
<li>European</li>
<img src=pant1.jpg alt="European Pant Suit" style="width:200px;height:200px;">
<li>Indian</li>
<img src=pant2.jpg alt="Indian Pant Suit" style="width:200px;height:200px;">
<li>Vintage</li>
<img src=pant3.jpg alt="Vintage Pant Suit" style="width:200px;height:200px;">
</ul>
</body>
</html>