<?php
$page_id =1;
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
<title>Skirts</title>
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
<p>At the store we make and sell the following types of skirts</p>
<ul>
<li>Box Pleated</li>
<img src=skirt1.jpg alt="Box Pleated Skirt" style="width:150px;height:150px;">
<li>A-line</li>
<img src=skirt2.jpg alt="A-line Skirt" style="width:150px;height:150px;">
<li>Straight</li>
<img src=skirt3.jpg alt="Straight Skirt" style="width:150px;height:150px;">
</ul>

</body>
</html>