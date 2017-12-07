<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<form action="" method="post">
    <ul>
        <?php
                                            $ch = curl_init();
                                            
                                            echo("<b>Users from Navoday's Site: </b><br/><br/> ");
                                            curl_setopt($ch, CURLOPT_URL, "http://www.abc-consulting.tk/fetchusers.php");
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                            
                                            $result = curl_exec($ch);
                                            
                                            echo($result."<br/>");
                                            
                                            echo("<b>Users from Neha's Site:</b><br/><br/>");
                                            curl_setopt($ch, CURLOPT_URL, "http://www.wonderarchitectures.ga/fetchusers.php");
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                            
                                            $result = curl_exec($ch);
                                            
                                            echo($result."<br/>");
                                            
                                            echo("<b>Users from Anav's Site:</b><br/><br/>");
                                            curl_setopt($ch, CURLOPT_URL, "http://anavsharma.com/barkinghampalace/curlmydb/index.php");
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                            
                                            $result = curl_exec($ch);
                                            
                                            echo($result."<br/>");
                                            
                                            echo("<b>Users from Rahul's Site:</b><br/><br/>");
                                            curl_setopt($ch, CURLOPT_URL, "http://www.highlights-gaming.ga/highlights-979943632/fetchusers.php");
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                            
                                            $result = curl_exec($ch);
                                            
                                            echo($result."<br/>");
                                            curl_close($ch);
                                        ?>
    </ul>
</form>
</body>
</html>