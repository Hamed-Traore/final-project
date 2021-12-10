<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "register_style.css">
    <link rel="javascript" type="text/css" href="">
    
    <title>Registration form</title>
</head>
    <body>
                
        <div class = "container" >
             <!-- ADD THIS ATTRIBUTE TO THE FORM TO ALSO VALIDATE WITH JAVASCRIPT BEFORE SUBMITTING TO BACKEND:
              onsubmit="return validateForm(event);" -->
                
            <form id="form" class="form" action="../controlLers/register-controller.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm(event);">
                        <h2>Register With Us</h2>
                        <h5 style="color: red;">
                            <?php
                                if (isset($_GET["error"])){
                                    echo $_GET["error"];
                                }
                            ?>
                        </h5><br>
                        <div class="form-control ">
                            <label for="firstname">First name:</label>
                            <input type="text" id="firstname" name="firstname">
                            <small id="firstnameError"></small>
                        </div>

                        <div class="form-control ">
                            <label for="lastname">Last name:</label>
                            <input type="text"  id="lastname" name="lastname">
                            <small id="lastnameError"></small>
                        </div>

                        <div class="form-control ">
                            <label for="email">Email address:</label>
                            <input type="email"  id="email" name="email">
                            <small id="emailError"></small>
                        </div>

                        <div class="form-control">
                            <label for="phone_number">Mobile number:</label>
                            <input type="text" id="phone_number" name="phone_number">
                            <small id="phone_numberError"></small>
                        </div>

                        <div class="form-control">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password">
                        </div>

                        <div class="form-control">
                            <label for="conf_password">Confirm password:</label>
                            <input type="password" class="form-control" id="conf_password" name="conf_password">
                            <small id="conf_passwordError"></small>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Create account</button><br>

                        Already have an account? <a href="login_form.php">Login</a>
            </form>
                
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./register_form.js"></script>
        
    </body>

</html>
