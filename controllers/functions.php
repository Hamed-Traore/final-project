<?php



// user creation functions
//check is there is an empty field
function emptyInputSignup($firstname,$lastname,$phone_number,$email,$password,$conf_password){
    $result;
    if(empty($firstname)||empty($lastname)||empty($phone_number)||empty($email)||empty($password)||empty($conf_password)){
        $result=true;
    }
    else {
        $result=false;
    }
    return $result;
}

//check if email structure is valid
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else {
        $result=false;
    }
    return $result;
}

//password match
function passworsMatch($password,$conf_password){
    $result;
    if($password!==$conf_password){
        $result=true;
    }
    else {
        $result=false;
    }
    return $result;
}

//check if account already exist
function accountExist($conn,$email){
    //select all emails and id in the DB
    $sql="SELECT * FROM `users` WHERE  email= ?;";
    // prepared statement to check if there is a match in the DB(to prevent users form injecting bad code into the DB)
    $stmt= mysqli_stmt_init($conn);//initialized statement
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../register_form.php?error=You already have an account");
        exit();
    }
    //if it does not fail, then insert the data
    mysqli_stmt_bind_param($stmt,"s",$email);
    // now execute the statement
    mysqli_stmt_execute($stmt);

    //grab the resulat from the database
    $resultData=mysqli_stmt_get_result($stmt);
    //check if there is actually a result
    if ($row=mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result=false;
    }
    return $result;
    mysqli_stmt_close($stmt);

}


function createAccount($conn,$firstname,$lastname,$email,$phone_number,$password){
    //insert the data into the DB
    $sql="INSERT INTO `users`(`firstname`, `lastname`, `email`, `phone_number`, `passwords`) VALUES (?,?,?,?,?)";
    // prepared statement to check if there is a match in the DB(to prevent users form injecting bad code into the DB)
    $stmt= mysqli_stmt_init($conn);//initialized statement
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../register_form.php?error= Can't create account");
        exit();
    }

    //we have the encrypt the passwords
    
    $hashedPassword= md5($password);
    
    //if it does not fail, then insert the data
    mysqli_stmt_bind_param($stmt,"sssis",$firstname,$lastname,$email,$phone_number,$hashedPassword);
    // now execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../View/login_form.php?AccountCreatedSuccessfully");


 }

// user login functions
function emptyInputLogin($email,$password){
    $result;
    if(empty($email)||empty($password)){
        $result=true;
    }
    else {
        $result=false;
    }
    return $result;
}


function  loginUser($conn,$email,$password){
    // Check users email
    $userExist=accountExist($conn,$email);
    if ($userExist===false) {
        header("location: ../View/login_form.php?error= Your email is wrong");
        exit();
    }
    

    // compare password
    $hashedPassword= md5($password); 
    
    if ($userExist["passwords"]===$hashedPassword) {
        session_start();
        $_SESSION["user_id"]=$userExist["users_id"];
        $_SESSION['firstname']=$userExist['firstname'];
        header("location: ../View/home.php");
        
        exit();
    }
    else  {
        header("location: ../View/login_form.php?error= Your password is wrong");

    }

}


//create an event
function creat_event($conn,$event_type,$title,$colours,$start_date,$end_date,$cake_size,$budget,$event_details,$user_id){
    // query to insert the data into the DB
    $sql="INSERT INTO `events`(`event_type`, `title`, `colours`, `start_date`, `end_date`, `Cake_size`, `budget`, `event_details`, `users_id`) VALUES (?,?,?,?,?,?,?,?,?)";
    // prepared statement to check if there is a match in the DB(to prevent users form injecting bad code into the DB)
    $stmt= mysqli_stmt_init($conn);//initialized statement
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../createEvent.php?error=Oops! couldn't create event");
        exit();
    }

    //we have the encrypt the passwords
    
    //$hashedPassword= password_hash($password, PASSWORD_DEFAULT);

    //if it does not fail, then insert the data
    mysqli_stmt_bind_param($stmt,"ssssssisi",$event_type,$title,$colours,$start_date,$end_date,$cake_size,$budget,$event_details,$user_id);
    // now execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    

}

// add to the location table
function AddLocation($conn,$location_name,$contact,$opening_time,$details,$event_id){
    // query to insert the data into the DB
    $sql="INSERT INTO `location`( `location_name`, `contact`, `opening_time`, `details`,`event_id`) VALUES (?,?,?,?,?)";
    // prepared statement to check if there is a match in the DB(to prevent users form injecting bad code into the DB)
    $stmt= mysqli_stmt_init($conn);//initialized statement
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../createEvent.php?error=Oops! couldn't create event Location");
        exit();
    }

    //we have the encrypt the passwords
    
    //$hashedPassword= password_hash($password, PASSWORD_DEFAULT);

    //if it does not fail, then insert the data
    mysqli_stmt_bind_param($stmt,"sissi",$location_name,$contact,$opening_time,$details,$event_id);
    // now execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
}

//add to payement table
function Addpayment($conn,$paymentMethod,$Name_on_card,$card_num,$amount_paid,$expire_date,$CVV,$event_id){
    // query to insert the data into the DB
    $sql="INSERT INTO `payment`( `paymentMethod`, `Name_on_card`, `card_num`, `amount_paid`, `expire_date`, `CVV`,`event_id`) VALUES (?,?,?,?,?,?,?)";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// used to identify the errors
    // prepared statement to check if there is a match in the DB(to prevent users form injecting bad code into the DB)
    $stmt= mysqli_stmt_init($conn);//initialized statement
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../createEvent.php?error=Oops! couldn't create event payment");
        exit();
    }
    

    //we have the encrypt the passwords
    
    //$hashedPassword= password_hash($password, PASSWORD_DEFAULT);

    //if it does not fail, then insert the data
    mysqli_stmt_bind_param($stmt,"ssiisii",$paymentMethod,$Name_on_card,$card_num,$amount_paid,$expire_date,$CVV,$event_id);
    // now execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}




// Update event        
function Update_event($conn,$event_type,$title,$colours,$start_date,$end_date,$cake_size,$budget,$event_details,$event_id){
    // query to insert the data into the DB
    $sql = "UPDATE `events` SET `event_type`=?,`title`=?,`colours`=?,`start_date`=?,`end_date`=?,`Cake_size`=?,`budget`=?,`event_details`=? WHERE event_id=?" ;
    // prepared statement to check if there is a match in the DB(to prevent users form injecting bad code into the DB)
    $stmt= mysqli_stmt_init($conn);//initialized statement
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../Update.php?error=Oops! couldn't Update event");
        exit();
    }
    //if it does not fail, then insert the data
    mysqli_stmt_bind_param($stmt,"ssssssisi",$event_type,$title,$colours,$start_date,$end_date,$cake_size,$budget,$event_details,$event_id);
    // now execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: home.php");
}

// Update Payment      
function Update_payment($conn,$paymentMethod,$Name_on_card,$card_num,$amount_paid,$expire_date,$CVV,$event_id){
    // query to insert the data into the DB
    $sql = "UPDATE `payment` SET `paymentMethod`=?,`Name_on_card`=?,`card_num`=?,`amount_paid`=?,`expire_date`=?,`CVV`=? WHERE event_id=?" ;
    // prepared statement to check if there is a match in the DB(to prevent users form injecting bad code into the DB)
    $stmt= mysqli_stmt_init($conn);//initialized statement
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../Update.php?error=Oops! couldn't Update event");
        exit();
    }
    //if it does not fail, then insert the data
    mysqli_stmt_bind_param($stmt,"ssiisii",$paymentMethod,$Name_on_card,$card_num,$amount_paid,$expire_date,$CVV,$event_id);
    // now execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: home.php");
}


// Update Location      
function Update_Location($conn,$location_name,$contact,$opening_time,$details,$event_id){
    // query to insert the data into the DB
    $sql = "UPDATE `location` SET `location_name`=?,`contact`=?,`opening_time`=?,`details`=? WHERE event_id=?" ;
    // prepared statement to check if there is a match in the DB(to prevent users form injecting bad code into the DB)
    $stmt= mysqli_stmt_init($conn);//initialized statement
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../Update.php?error=Oops! couldn't Update event");
        exit();
    }
    //if it does not fail, then insert the data
    mysqli_stmt_bind_param($stmt,"sissi",$location_name,$contact,$opening_time,$details,$event_id);
    // now execute the statement
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: home.php");
}
?>