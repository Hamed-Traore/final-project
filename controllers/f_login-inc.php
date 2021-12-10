<?php

if (isset($_POST["login"])) {

    //store login credentials
    $user_id= $_POST["user_id"];
    $password= $_POST["password"];

    require_once 'DB-connection.php';
    require_once 'functions-inc.php';

    //check if the user inserted all the required values
    if(emptyInputLogin($user_id,$password)!==false){
        header("location: ../logs/f_login.php?error=emptyInput");
        exit();
    }
    
    //login
    loginUser($conn,$user_id,$password);
    

}
else {
    header("location: ../logs/f_login.php");
    exit();
}





?>