<?php

require_once 'c.php';

$randNumber = mt_rand(0, 100);

$query = "INSERT INTO access_log (id, host, path, log) VALUES (NULL, '{$ip}', {$randNumber}, CURRENT_TIMESTAMP)";

$mysqli->query($query);

echo $randNumber;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="padding-top: 50px;">
        <form action="login.php" method="POST">            
            <input name="uid" type="text" placeholder="uid"><br>
            <input name="pwd" type="password" placeholder="password"><br>
            <button type="submit">login</button>
        </form>    
    </div>

    <a href="create_user.php">create_user</a>
    
</body>
</html>