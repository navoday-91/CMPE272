<html>
<body>
<form action="" method="post">
    <ul>
<?php
$ch = curl_init();

echo("Users from Navoday's Site: <br/> ");
curl_setopt($ch, CURLOPT_URL, "http://www.abc-consulting.tk/fetchusers.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

echo($result."<br/>");

echo("Users from Neha's Site:<br/>");
curl_setopt($ch, CURLOPT_URL, "http://www.wonderarchitectures.ga/fetchusers.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

echo($result."<br/>");

echo("Users from Anav's Site:<br/>");
curl_setopt($ch, CURLOPT_URL, "http://anavsharma.com/barkinghampalace/curlmydb/index.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

echo($result."<br/>");

curl_close($ch);
?>
    </ul>
</form>
</body>
</html>