<?php

if (isset($_POST["login"])) {

    //store login credentials
    $email= $_POST["email"];
    $password= $_POST["password"];

    require_once 'DB-connection.php';
    require_once 'functions.php';

    //check if the user inserted all the required values
    if(emptyInputLogin($email,$password)!==false){
        header("location: ../View/login_form.php?error=emptyInput");
        exit();
    }
    
    //login
    loginUser($conn,$email,$password);
    

}
else {
    header("location: ../View/login_form.php");
    exit();
}





?>