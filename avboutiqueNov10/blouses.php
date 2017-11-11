<!DOCTYPE html>
<?php
$page_id =2;
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
<title>Blouses</title>
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
<p>The following Classic Silk Blouses are available</p>
<ul>
<li>Long Sleeves</li>
<img src=blouse1.jpg alt="Long Sleeve Silk Blouse" style="width:150px;height:150px;">
<li>Cap Sleeves</li>
<img src=blouse2.jpg alt="Cap Sleeve Silk Blouse" style="width:150px;height:150px;">
<li>Sleeveless</li>
<img src=blouse3.jpg alt="Sleeveless Silk Blouse" style="width:150px;height:150px;">
</ul>
</body>
</html>