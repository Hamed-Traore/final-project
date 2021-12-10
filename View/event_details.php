<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
}


// On this page, I am going to display everyting the user needs to know about the event he has booked
require('../controllers/DB-connection.php');
//storing the IDs
$event_id=$_GET['event_id'];
$users_id=$_SESSION["user_id"];

$sql_event="SELECT * FROM `events` WHERE `event_id`='$event_id' AND `users_id`= '$users_id'";
if ($result1 = mysqli_query($conn, $sql_event)) 
{
	if (mysqli_num_rows($result1) >0) 
	{
		$row1=mysqli_fetch_assoc($result1);
		// Event data
		$event_type= $row1['event_type'];
		$title= $row1['title'];
	}
}
// //select event detaIl from event table
// $sql_event="SELECT * FROM `events` WHERE `event_id`='$event_id' AND `users_id`= '$users_id'";
// if ($result = mysqli_query($conn, $sql_event)) 
// {
// 	if (mysqli_num_rows($result) >0) 
// 	{
// 		$row=mysqli_fetch_assoc($result);
// 		// Event data
// 		$event_type= $row['event_type'];
// 		$title= $row['title'];
// 		$colours= $row['colours'];
// 		$start_date= $row['start_date'];
// 		$end_date= $row['end_date'];
// 		$budget= $row['budget'];
// 		$cake_size= $row['Cake_size'];
// 		$event_details= $row['event_details'];
// 	}
// 	else  {
// 		echo'Oops! Somthing went wrong, please try again later...';
// 	}
// }

// //select event details from location table
// $sql_location="SELECT * FROM `location` WHERE `event_id`='$event_id' ";
// if ($result1 = mysqli_query($conn, $sql_location)) 
// {
// 	if (mysqli_num_rows($result1) >0) 
// 	{
// 		$row1=mysqli_fetch_assoc($result1);
// 		// Location
// 		$location_name=$row1['location_name'];
// 	    $contact=$row1['contact'];
// 	    $opening_time=$row1['opening_time'];
// 	    $details=$row1['details'];
		
// 	}
// 	else  {
// 		echo'Oops! Somthing went wrong, please try again later...';
// 	}
// }

// //select event detaIl from Payment table
// $sql_payment="SELECT * FROM `payment` WHERE  `event_id`='$event_id' ";
// if ($result2 = mysqli_query($conn, $sql_payment)) 
// {
// 	if (mysqli_num_rows($result2) >0) 
// 	{
// 		$row2=mysqli_fetch_assoc($result2);
// 		//payement data
// 	    $paymentMethod=$row2['paymentMethod'];
// 	    $Name_on_card=$row2['Name_on_card'];
// 	    $card_num=$row2['card_num'];
// 	    $amount_paid=$row2['amount_paid'];
// 	    $expire_date=$row2['expire_date'];
// 	    $CVV=$row2['CVV'];
		
// 	}
// 	else  {
// 		echo'Oops! Somthing went wrong, please try again later...';
// 	}
// }


	

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Event details</title>
  </head>
  <body>
  	<?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
    <h1><?php echo 'Tasks for the '.$event_type.' event titled '.$title. ' are:' ; ?></h1>
    <table class="table table-bordered table-striped">
    	<thead>
    		<tr>
    			<th>Role</th>
    			<th>Full name</th>
    			<th>Phone Number</th>
    			<th>Status</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
    		//select Staff info from Payment table
			$sql_staff="SELECT * FROM `staff` WHERE  `event_id`='$event_id' ";
			if ($result = mysqli_query($conn, $sql_staff)) 
			{

				if (mysqli_num_rows($result) >0) 
				{
				    
	    			while ($row = mysqli_fetch_array($result)) 
	    			{
	    				echo '<tr>';
	                            echo '<td>' .$row['role']. '</td>';
	                            echo '<td>' .$row['Full_name'] . '</td>';
	                            echo '<td>' . $row['phone_number'] . '</td>';
	                            echo '<td>' .$row['Status']. '</td>';
	    				echo'</tr>';
	    			}
	    			// Free result set
                    mysqli_free_result($result);
	    			
	    		}else 
                    {
                        echo '<div class="alert alert-danger"><em>No Event were found.</em></div>';
                    }
    		}else {
                        echo 'Oops! Something went wrong. Please try again later.';
                    }
  
    		?>
    	</tbody>
    </table>

    

    
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>