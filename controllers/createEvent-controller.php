<?php 


//error handler
$errors= array();

if (isset($_POST['create'])) 
{
    //error connection and functions file
    require_once 'DB-connection.php';
    require_once 'functions.php'; 

    // Event data
	$event_type= $_POST['event_type'];
	$title= $_POST['title'];
	$colours= $_POST['colours'];
	$start_date= $_POST['start_date'];
	$end_date= $_POST['end_date'];
	$budget= $_POST['budget'];
	$cake_size= $_POST['Cake_size'];
	$event_details= $_POST['event_details'];

    // Location
	$location_name=$_POST['location_name'];
    $contact=$_POST['contact'];
    $opening_time=$_POST['opening_time'];
    $details=$_POST['details'];
	
    //payement data
    $paymentMethod=$_POST['paymentMethod'];
    $Name_on_card=$_POST['Name_on_card'];
    $card_num=$_POST['card_num'];
    $amount_paid=$_POST['budget'];
    $expire_date=$_POST['expire_date'];
    $CVV=$_POST['CVV'];

    

    // validation code of event data
    // since i used the attribute required in the htlm I don't need to check for empty input

    //ckeck length to make the length of the input matchs the length definied in the database 
    if(strlen($title)>50)
    {
    	array_push($errors,"The event name must be less than 50 characters");
    }
    if (strlen($colours)>50)
    {
    	array_push($errors,"The colours must be less than 50 characters");
    }
    // compare the starting and ending dates
    if (strlen($start_date>$end_date))
    {
    	array_push($errors,"The starting date cannot be later than the ending date");
    }
    if(!intval($budget))
    {
    	array_push($errors,"The budget field must contain numbers only");
    }
 
    // validation code of Location data
    if(!intval($contact))
    {
        array_push($errors,"The contact field in location section must contain numbers only");
    }

    // validation code for Payement
    if(!intval($card_num))
    {
        array_push($errors,"The card number field in payement section must contain numbers only");
    }


    session_start();
    if (count($errors)==0) 
    {
    	// if there is no error in the input, store the data in the DB
    	$user_id=$_SESSION["user_id"];
    	creat_event($conn,$event_type,$title,$colours,$start_date,$end_date,$cake_size,$budget,$event_details,$user_id);

        // mysqli_insert_id($conn) is used to get the last id auto generated in 
        $event_id = mysqli_insert_id($conn);

        // add data to the location table
        AddLocation($conn,$location_name,$contact,$opening_time,$details,$event_id);

        // add data to the payment table
        Addpayment($conn,$paymentMethod,$Name_on_card,$card_num,$amount_paid,$expire_date,$CVV,$event_id);
        header("location: ../View/home.php?EventCreatedSuccessfully");
    }
    // return the errors on the form page
    else 
    {
        
        // store the errors inside session
        $_SESSION["errors"] = $errors;
        header("location: ../View/createEvent_form.php?error= connection Failed");
    
    }
    














    
}


?>