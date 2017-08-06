<?php
    include('dbconfig.php');
    session_start();

    if(isset($_SESSION['login_user']))
    {
        echo "You are already logged in as '".$_SESSION['login_user']."'";
        echo "<a href='home.php'>Go to Home</a>";
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // get form values
        $username = $dbconn->real_escape_string($_POST['username']);
        $password = $dbconn->real_escape_string($_POST['password']);

        // validate values
        if(strlen($username)==0)
            $login_err = 'Missing Username.';
        else if(strlen($password)==0)
            $login_err = 'Missing Password';
        else
        {
            // verify user/password in db
            $res = $dbconn->query("select username from users where username='$username' and password = '$password'");

            if($res->num_rows<1)
            {
                $login_err = "User not found";
            }
            else
            {
                $row = $res->fetch_assoc();
                $_SESSION['login_user'] = $row['username'];
                header('location: home.php');
            }
        }

    }
    else
    {
        //echo 'request is not POST.';
    }
?>


<?php
    if(isset($login_err))
        echo $login_err;
?>

<html>
    <head>
        <title>Login Test</title>
    </head>
    <body>
        <div>
            <form method="POST" action="login.php">
                <h2>Login</h2>
                <input type="text" name="username" placeholder="username"></input>
                <input type="password" name="password" placeholder="password"></input>
                <input type="submit" name="submit" value="Login"/>
            </form>
        </div>
        
        <div>
            <form method="POST" action="register.php">
                <h2>Register</h2>
                <input type="text" name="username" placeholder="username"></input>
                <input type="password" name="password" placeholder="password"></input>
                <input type="password" name="passwordConfirm" placeholder="confirm password"></input>
                <input type="submit" name="submit" value="Register"/>
            </form>
        </div>
    </body>
</html>