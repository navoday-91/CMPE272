<!DOCTYPE html>
<?php
$page_id =10;
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
<title>Wedding Gowns</title>
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
<p>The following Wedding Gowns are available</p>
<ul>
<li>Silk</li>
<img src=gown1.jpg alt="Silk Wedding Gown" style="width:150px;height:200px;">
<li>Satin</li>
<img src=gown2.jpg alt="Satin Wedding Gown" style="width:150px;height:200px;">
<li>Lace</li>
<img src=gown3.jpg alt="Lace Wedding Gown" style="width:150px;height:200px;">
</ul>
</body>
</html>