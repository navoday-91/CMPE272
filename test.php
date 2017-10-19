      <?php
        $myfile = fopen("webcontacts.txt", "r") or die("Unable to open file!");
        while (!feof($myfile))
        {
        $frec = fgets($myfile);
        $info = explode(";",$frec);
        print($info[0]);
        }
      ?>