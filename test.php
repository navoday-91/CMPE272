      <?php
        $myfile = fopen("webcontacts.txt", "r") or die("Unable to open file!");
        while (!feof($webcontacts))
        {
        $frec = fgets($myfile);
        $info = explode(";",$frec);
        print($info[0]);
        }
      ?>