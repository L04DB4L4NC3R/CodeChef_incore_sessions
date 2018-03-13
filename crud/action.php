<?php

$con = mysqli_connect("localhost","root","","pracdb") or die(mysql_error());

mysqli_select_db($con,"prac");

if(!$con){
    echo "Connection not established<br><a href = '/incore/crud/'>Go back</a>";
}

session_start();

//for register
if(isset($_POST["confirm"])){

    $name = $_POST["name"];
    $passwd = base64_encode ( $_POST["passwd"] );
    $confirm = base64_encode ( $_POST["confirm"] );

    if($passwd !== $confirm)
        echo "Please enter same passwords<br><a href = '/incore/crud/'>Go back</a>";

    else{
        $q = "select * from test where name='$name'";

        $data = $con->query($q);

        if($data->fetch_assoc()["name"])
            echo "User already exists<br><a href = '/incore/crud/'>Go back</a>";
        else{
            $query = "insert into test (name,passwd) values('$name','$passwd')";
            mysqli_query($con,$query) or die("Database error ") ;

            $_SESSION["name"] = $name;
            header('refresh:0.01;inside.php');
        }
    }
}




//for login
if(isset($_POST["login-name"])){

    $name = $_POST["login-name"];
    $passwd = $_POST["password"];

    $query = "select passwd from test where name = '$name'";
    $res = $con->query($query);
    if( $res->fetch_assoc()["passwd"] !== base64_encode($passwd) )
        echo "Wrong details!<br><a href = '/incore/crud/'>Go back</a>";

    else{
        $_SESSION["name"] = $name;
        header('refresh:0.01;inside.php');
    }

}


//unregister
if(isset($_GET["unregister"])){

    $name = $_SESSION["name"];
    $query = "delete from test where name = '$name'";
    $con->query($query) or die("database error");
    $_SESSION["name"] = '';
    header('refresh:0.01;index.html');
}

if(isset($_GET["logout"])){

    $_SESSION["name"] = '';
    header('refresh:0.01;index.html');
}


if(isset($_POST["newname"])){

    $newname = $_POST["newname"];
    $session = $_SESSION["name"];
    $query = "update test set name = '$newname' where name = '$session'";
    $con->query($query) or die("database error");
    $_SESSION["name"] = '';
    header('refresh:0.01;index.html');
}

mysqli_close($con);

?>
