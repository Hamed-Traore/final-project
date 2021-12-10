<?php
// database credential
define('username','root');
define('password','');
define('database','eventsystemdb');
define('servername','localhost');

//create the connection
$conn= mysqli_connect(servername,username,password,database);

// check the connection
if(!$conn){
    die("connection failed: ". mysqli_connect_error());
}

// $sql = "SELECT * FROM users WHERE facultyid=3241";

// if ($result=mysqli_query($conn,$sql))
//   {
//       echo 'worked';
//   // Return the number of rows in result set
//   $rowcount=mysqli_num_rows($result);
//   printf("Result set has %d rows.\n",$rowcount);
//   // Free result set
//   mysqli_free_result($result);
//   }

// mysqli_close($conn);


// else{
//     echo 'connected';
// }

// $sql="INSERT INTO `users`(`name`, `email`, `phone_number`, `facultyid`, `userpassword`)
//  VALUES('ha','ha@gmail.com',24423456,3241,'rez');";

// //$sql = "INSERT INTO MyGuests (firstname, lastname, email)
// //VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();


?>
