<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "register_style.css">
    
    <title>Login form</title>
</head>
    <body>
        <div class ="container">
            <form class="form" action="../controllers/login-controller.php" method="POST">
                <div class="form-control"><!--username-->
                   <label for="email">Email address:</label>
                    <input type="email"  id="email" name="email">

                    <span class="error"><!--error message on failed input-->
                        <?php if (isset($errors['email'])) echo $errors['username']; ?>
                    </span>
                </div>
                <div class="form-control"><!--password-->
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <span class="error" style="color: red;"><!--error message on failed input-->
                        
                            <?php
                                if (isset($_GET["error"])){
                                    echo $_GET["error"];
                                }
                            ?>
                        
                    </span>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button><br><br><!--login button-->
                 don't have an account? <a href = "register_form.php">Register</a><!--register button-->
            </form>
        </div>
    </body>
</html>
