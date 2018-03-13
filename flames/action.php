<?php

if(isset($_POST["s1"])){

    $s1 = $_POST["s1"];
    $s2 = $_POST["s2"];
    $l1 = strlen($s1);
    $l2 = strlen($s2);

    $count=0;

    for($i=0;$i<$l1;$i++){
        for($j=0;$j<$l2;$j++){
            if(  $s2[$j]!='$' && $s1[$i]!='$' && $s1[$i]==$s2[$j]  ){
                $count++;
                $s1[$i] = '$';
                $s2[$j] = '$';
            }
        }
    }

    $result = $l1 + $l2 - 2*$count;

    $flame = 'flames';

     for ($i = strlen($flame); $i > 1; $i--) {
                $diff = $result % strlen($flame);
                if ($diff == 0) {
                    $diff = strlen($flame) - 1;
                } else {
                    $diff--;
                }
                $flame[$diff] = "@";
                list($f1, $f2) = preg_split("/@/", $flame);
                $flame = $f2 . $f1;
            }
            switch ($flame) {
                case 'f':
                    echo "You are now Friends";
                    break;
                case 'l':
                    echo "You are now Lovers";
                    break;
                case 'a':
                    echo "You are now in an Affair";
                    break;
                case 'm':
                    echo "You are now Married";
                    break;
                case 'e':
                    echo "You are now Enemy";
                    break;
                case 's':
                    echo "You are now Sister";
                    break;
            }
}

?>
