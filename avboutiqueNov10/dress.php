<!DOCTYPE html>
<?php
$page_id =9;
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
<title>Cocktail Dresses</title>
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
<p>The following Cocktail Dresses are available</p>
<ul>
<li>Silk</li>
<img src=dress1.jpg alt="Silk Cocktail Dress" style="width:150px;height:150px;">
<li>Satin</li>
<img src=dress2.jpg alt="Satin Cocktail Dress" style="width:150px;height:170px;">
<li>Georgette</li>
<img src=dress3.jpg alt="Georgette Cocktail Dress" style="width:150px;height:220px;">
</ul>
</body>
</html>