<?php
include_once(__DIR__ . "/./utils/authentificationUtils.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Miage Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.min.css" >
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/authentificationCss.css" />
    <script src="main.js"></script>
</head>
<body>
    <div id="draggable" class="p-3 mb-2 bg-info text-white" class='blog'>
    <h1>Welcome to our Miage Blog</h1>
    <div class="p-3 mb-2 bg-light text-dark" class='registration'>
    <h2 class="text-primary">Registration</h2>
    <?php
    if (hasAuthenticationError()) {
        $err = getAuthenticationError();
        echo "<p class='error'> $err</p>";
    }
    ?>
    <form method='post' action='./scripts/registrationInsert.php'>
    <input type='text' name='firstname' placeholder='firstname' required/>
    <input type='password' name='lastname'placeholder='lastname' required/>
    <input type='text' name='username' placeholder='username' required/>
    <input type='password' name='password'placeholder='password' required/>
    <input type='email' name='email' placeholder='E-mail' required/>
    <input type='telephone' name='number' placeholder='Phone number' required/>
    <select class='gender' name='gender' required>
    <option name='MALE'>male</option>
    <option name='FEMALE'>female</option>
    </select>
    <input class="btn btn-primary" type='submit' name='submit' value='SIGN IN' />
    <a href='index.php'>Already Registered? Please Login Here</a>
    </form>
    </div>
    </div>
</body>
</html>