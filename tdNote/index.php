<?php
include_once(__DIR__."/./utils/authentificationUtils.php");
include_once(__DIR__."/./utils/userUtils.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Miage Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.min.index.css" >
    <link rel="stylesheet" type="text/css" media="screen" href="css/authentificationCss.css" />
    <script src="main.js"></script>
</head>
<body>
<?php
    if(isLoggedIn()) {
        header("location:home.php");
    }else{
    ?>
    
    <div class="p-3 mb-2 bg-info text-white" name='blog'>
    <h1>Welcome to our Miage Blog</h1>
    <div class="p-3 mb-2 bg-light text-dark" name='signIn'>
    <h2 class="text-primary">Sign in</h2>
    <?php
        if(hasAuthenticationError()) {
          $err = getAuthenticationError();
          echo "<p class='error' > $err </p>";
        }
        ?>
    <form method='post' action='scripts/authentification.php'>
    <input type='text' name='username' placeholder='username' required/>
    <input type='password' name='password'placeholder='password' required/>
    <input class="btn btn-primary" type='submit' name='submit' value='SIGN IN' />
    <a href='registration.php'>New User? Please Register Here</a>
    </form>
    </div>
    </div>
    <?php
    }
?>
</body>
</html>