<!DOCTYPE html>
<?php
$page_id =7;
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
<title>Gloves</title>
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
<p>The following Gloves are available</p>
<ul>
<li>Leather</li>
<img src=glove1.jpg alt="Leather Glove" style="width:150px;height:150px;">
<li>Wool</li>
<img src=glove2.jpg alt="Wool Glove" style="width:150px;height:150px;">
<li>Silk</li>
<img src=glove3.jpg alt="Silk Glove" style="width:150px;height:150px;">
</ul>
</body>
</html>