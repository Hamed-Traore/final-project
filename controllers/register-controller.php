<?php
// make sure the user submitted the form properly
if(isset($_POST["submit"])) {
    
    //grab the user detailss
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $phone_number =$_POST["phone_number"];
    $password=$_POST["password"];
    $conf_password=$_POST["conf_password"];
    
    //error connection and functions file
    require_once 'DB-connection.php';
    require_once 'functions.php';    


    //check if the user inserted all the required values
    if(emptyInputSignup($firstname,$lastname,$phone_number,$email,$password,$conf_password)!==false){
        header("location: ../View/register_form.php?error= You have an emptyfield");
        exit();
    }

    //check if email structure is valid
    if(invalidEmail($email)!==false){
        header("location: ../View/register_form.php?error= Your email is Invalid");
        exit();
    }

    //check if password matchs
    if(passworsMatch($password,$conf_password)!==false){
        header("location: ../View/register_form.php?error= Your passwors don't match") ;
        exit();
    }

    //check if account already exist
    if(accountExist($conn,$email)!==false){
        header("location: ../View/register_form.php?error=You already have an account");
        exit();
    }

    //check password lengh

    createAccount($conn,$firstname,$lastname,$email,$phone_number,$password);
}
else {
    header("location: ../View/register_form.php?error= connection Failed");
    
    }

?>