<html>
<body>
<form action="" method="post">
    <ul>
<?php
$ch = curl_init();

echo("Users from Navoday's Site:");
curl_setopt($ch, CURLOPT_URL, "http://www.abc-consulting.tk/fetchusers.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

echo($result);

echo("Users from Neha's Site:");
curl_setopt($ch, CURLOPT_URL, "http://www.wonderarchitectures.ga/fetchusers.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

echo($result);

curl_close($ch);
?>
    </ul>
</form>
</body>
</html>