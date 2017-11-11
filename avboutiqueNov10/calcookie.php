<?php
$cookien = "av_visits";
$cookiev = $_COOKIE[$cookien];
$cookiev = json_decode($cookiev, true);
$services_dict = array(1 => "<a href = 'skirts.php'>Skirts</a>", 2=> "<a href = 'blouses.php'>Blouses</a>", 3=> "<a href='scarves.php'>Silk Scarves</a>", 4=> "<a href = 'camisoles.php'>Camisoles</a>", 5 => "<a href='pants.php'>Pant Suites</a>", 6 => "<a href='jackets.php'>Jackets</a>", 7 => "<a href='gloves.php'>Gloves</a>", 8=> "<a href='hats.php'>Hats</a>", 9 => "<a href='dress.php'>Cocktail Dresses</a>", 10 => "<a href='gowns.php'>Wedding Gowns</a>",);
?>

<ul>
<?php
if($cookiev[4] == 0){
echo("No products were visited");
}
else{
for($i=4;$i>=0 && $cookiev[$i]>0;$i--){
?>
<li>
<?php
echo($services_dict[$cookiev[$i]]);
?>
</li>
<?php
}
}
?>
</ul>