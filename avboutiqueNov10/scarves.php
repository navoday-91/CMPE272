<!DOCTYPE html>
<?php
$page_id =3;
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
<title>Scarves</title>
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
<p>The following Classic Silk Scarves are available</p>
<ul>
<li>Solid Color</li>
<img src=scarf1.jpg alt="Solid Color Silk Scarf" style="width:150px;height:150px;">
<li>Shaded</li>
<img src=scarf2.jpg alt="Shaded Silk Scarf" style="width:150px;height:150px;">
<li>Pattern</li>
<img src=scarf3.jpg alt="Pattern Silk Scarf" style="width:150px;height:150px;">
</ul>
</body>
</html>