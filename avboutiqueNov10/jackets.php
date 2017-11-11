<!DOCTYPE html>
<?php
$page_id =6;
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
<title>Jackets</title>
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
<p>The following Jackets are available</p>
<ul>
<li>Leather</li>
<img src=jacket1.jpg alt="Leather Jacket" style="width:200px;height:200px;">
<li>Wool</li>
<img src=jacket2.jpg alt="Wool Jacket" style="width:200px;height:200px;">
<li>Silk</li>
<img src=jacket3.jpg alt="Silk Jacket" style="width:200px;height:200px;">
</ul>
</body>
</html>