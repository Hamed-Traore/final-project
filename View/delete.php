<?php

require_once '../controllers/DB-connection.php';
if (isset($_POST["submit"])) {
    $id=$_POST['event_id'];
    $sql = "DELETE FROM `events` WHERE event_id='$id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    
}






// Process delete operation after confirmation
// if (isset($_POST['yes'])) 
// {
    
//     if (isset($row['event_id']) && !empty($row['event_id']))
//     {
//         // Include config file
//         require_once '../controllers/DB-connection.php';

//         // Prepare a delete statement
//         $id=$row['event_id'];
//         $sql = "DELETE FROM `events` WHERE event_id='$id'";
//         $result = mysqli_query($conn, $sql);
//         if (mysqli_query($conn, $sql))
//         {
//             header('location: home.php?deleted');
//             exit();
//         } 
//         else 
//         {
//             header('location: home.php?error=Something is wrong');
//             exit();
//         }

//         mysqli_close($conn);
    
//     }
// }

?>