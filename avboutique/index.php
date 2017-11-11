<?php
$cookien = "av_visits";
if(!isset($_COOKIE[$cookien])){
$cookiev = [0,0,0,0,0];
setcookie($cookien,json_encode($cookiev), time() + (86400 * 30), "/", "anjalivijay.com");
}
?>
<html>
<head>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<title>Boutique</title>
<link rel="stylesheet" type="text/css" href="avstyle.css">
</head>

<body>
<h1>AV's Boutique</h1>

<div class="tab">
<button class="tablinks" onclick="openTab(event, 'About')" href="#about">About</button>
<button class="tablinks" onclick="openTab(event,'Products')" id="products" href="#products">Products</button>
<button class="tablinks" onclick="openTab(event,'News')" id="news" href="#news">News</button>
<button class="tablinks" onclick="openTab(event,'Contacts')" id="contacts" href="#contacts">Contacts</button>
<button class="tablinks" onclick="openTab(event,'Secure')" id="secure" href="#secure">Secure</button>
<button class="tablinks" onclick="openTab(event,'User')" id="user" href="#user">User</button>
</div>

<div id="About" class="tabcontent">
<h3>About</h3>
<?php
$aboutfile = fopen("about.txt","r") or die("File not found");
while(!feof($aboutfile)){
echo fgets($aboutfile) . "<br>";
}
fclose($aboutfile);
?>
</div>

<div id="Products" class="tabcontent">
<h3>Products</h3>
<a href="skirts.php" target="_blank">Skirts</a><br>
<a href="blouses.php" target="_blank">Classic Silk Blouses</a><br>
<a href="scarves.php" target="_blank">Silk Scarves</a><br>
<a href="camisoles.php" target="_blank">Camisoles</a><br>
<a href="pants.php" target="_blank">Pant Suites</a><br>
<a href="jackets.php" target="_blank">Jackets</a><br>
<a href="gloves.php" target="_blank">Gloves</a><br>
<a href="hats.php" target="_blank">Hats</a><br>
<a href="dress.php" target="_blank">Cocktail Dresses</a><br>
<a href="gowns.php" target="_blank">Wedding Gowns</a><br>
<br>
<a href="calcookie.php" target="_blank">Last 5 products visited</a>
</div>

<div id="News" class="tabcontent">
<h3>News</h3>
<?php
$newsfile = fopen("news.txt","r") or die("File not found");
echo fread($newsfile,filesize("news.txt"));
fclose($newsfile);
?>
</div>

<div id="Contacts" class="tabcontent">
<h3>Contacts</h3>
<?php
$contactsfile = fopen("contacts.txt","r") or die("File not found");
while(!feof($contactsfile)){
echo fgets($contactsfile) . "<br>";
}
fclose($contactsfile);
?>
</div>

<div id="Secure" class="tabcontent">
<h3>Secure</h3>
<form action="secure.php" method="post">
<br/>Username: <input type="text" name="userid" id="userid">
<br/>Password: <input type="password" name="pwd" id="pwd">
<br/><input type="submit" value="Login" name="Login"/>
</form>
</div>

<div id="User" class="tabcontent">
<h3>User</h3>
<p><a href="usercreate.html" target="_blank">User Creation</a></p>
<p><a href="usersearchname.html" target="_blank">User Search by Name</a></p>
<p><a href="usersearchemail.html" target="_blank">User Search by E-mail</a></p>
<p><a href="usersearchphone.html" target="_blank">User Search by Phone Number</a></p>
</div>
<script>
function openTab(evt, tabOption)
{
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for(i=0;i<tabcontent.length;i++){
tabcontent[i].style.display="none";
}
tablinks =  document.getElementsByClassName("tablinks");
for(i=0;i<tablinks.length;i++){
tablinks[i].className = tablinks[i].className.replace("active", "");
}
document.getElementById(tabOption).style.display="block";
evt.currentTarget.className = "active";
}
</script>
</body>
</html>