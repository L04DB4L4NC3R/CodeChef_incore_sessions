<?php
if(isset($_POST["plain"])){
    $hash = base64_encode($_POST["plain"]);
    echo $hash;
}

if(isset($_POST["crypt"])){
    $plain = base64_decode($_POST["crypt"]);
    echo $plain;
}
?>
