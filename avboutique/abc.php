<html>
<body>
<form action="" method="post">
    <ul>
<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://www.abc-consulting.tk/fetchusers.php");
curl_setopt($ch, CURLOPT_HEADER, 0);

$result = curl_exec($ch);

curl_close($ch);

echo($result);
?>
    </ul>
</form>
</body>
</html>