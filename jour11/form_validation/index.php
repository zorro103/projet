<?php   
    
    require_once 'lib/validator.php';

    $errorMessage = '';

    if (!empty($_REQUEST)) {
        /*
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $pwd= $_REQUEST['password'];
        $cfm_pwd = $_REQUEST['confirm_pwd'];
        */

        // Nettoyage des inputs username
        /*
        $username = trim($username);
        $username = htmlspecialchars($username);
        $username = stripslashes($username);
        */

        // Nettoyage des inputs sur une seule ligne et pour tous les inputs
        /*
        $username = stripslashes(htmlspecialchars(trim($_REQUEST['username'])));
        $email = stripslashes(htmlspecialchars(trim($_REQUEST['email'])));
        $pwd = stripslashes(htmlspecialchars(trim($_REQUEST['password'])));
        $cfm_pwd = stripslashes(htmlspecialchars(trim($_REQUEST['confirm_pwd'])));*/

        $username = validateInput($_REQUEST['username']);
        $email = validateInput($_REQUEST['email']);
        $pwd = validateInput($_REQUEST['password']);
        $cfm_pwd = validateInput($_REQUEST['confirm_pwd']);

        $match = comparePwd($pwd, $cfm_pwd);

        if (!$match) {
            $errormessage = "Passwords don't match !";
        }

        
        //var_dump($match);

        //var_dump($username);

        /*
        echo '<pre>';
        print_r($_REQUEST);
        echo '</pre>';
        */
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <form action="" method="post">
        <label for="user-name">User Name</label>
        <input type="text" name="username" id="user-name" required pattern="[A-Za-z">

        <label for="user-email">Email</label>
        <input type="email" name="email" id="user-email" required>

        <label for="user-password">Password</label>
        <input type="password" name="password" id="user-password" required>

        <label for="user_confirm">Confirm Password</label>
        <input type="password" name="confirm_pwd" id="user-confirm" required>

        <button type="submit" value="Log In">Envoyez</button>
    </form>
    <?php echo '$errormessage'?>
</body>
</html>