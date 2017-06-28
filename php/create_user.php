<?php

require_once 'c.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create user</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">
</head>
<body>

    <div class="container" style="padding-top: 50px;">
        <form action="signup.php" method="GET">
            <input name="first" type="text" placeholder="first name"><br>
            <input name="last" type="text" placeholder="last name"><br>
            <input name="uid" type="text" placeholder="uid"><br>
            <input name="pwd" type="password" placeholder="password"><br>
            <button type="submit">submit</button>
        </form>    
    </div>
    
</body>
</html>