<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logged in!</title>
</head>
<center>
    <body style = "background-color:black;color:red">
        <h1>Welcome user</h1><br><br>

        <form action="/incore/crud/action.php" >
            <input type="submit" name="logout" value="logout">
        </form>
        <br>
        <form action="/incore/crud/action.php" >
            <input type="submit" name="unregister" value="unregister">
        </form>
        <br>
        <form action="/incore/crud/action.php" method = "post">
            <input type="text" name="newname" placeholder="change your name">
            <input type="submit" value="Change name">
        </form>

        <script>
            <?php
                echo "<h3 style='color:red'>hey there</h3>";
            ?>
        </script>


    </body>
</center>
</html>
