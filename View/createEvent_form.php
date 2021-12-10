<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Create an event</title>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"> 
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
          
          
          <script src="../STUDENT/PAGE/home.js"></script>

          <!--links for post section--> 
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
          <link rel="stylesheet" type="text/css" href="createEvent.css">
          <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
         

          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

         

          <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
          <link rel="stylesheet" href="careerF.css">
          
          
      

        

       
         


</head>
<body>

<?php require 'utils/header.php'; ?>


<!--code for form-->
<div class="container">
    <div class="row g-5">
        <div class="py-5 text-center">
            <h1>Create event</h1>
        </div>
        
        
          
            <div id="cover-caption" >
                <div class="container">
                    <div class="row text-white">
                        
                            
                            <?php
                                if(isset($_SESSION["errors"])){
                                    $errors = $_SESSION["errors"];
                                    // loop through errors and display them
                                    foreach($errors as $error){
                                        ?>
                                            <small style="color: red"><?= $error."<br>"; ?></small>
                                        <?php
                                    }
                                }
                                // destroy session after displaying errors
                                $_SESSION["errors"] = null;
                            ?>
                            <div class="px-2"><br>
                                <form class="needs-validation" action="../controllers/createEvent-controller.php" class="justify-content-center" method="POST">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-primary">Event</span>
                                    </h4>
                                    <div class="form-group">
                                      <label>Event Category</label>
                                    <select class="form-select" name="event_type"  required>
                                          <option disabled selected value="">Event Category</option>
                                          <option value="Private">Private</option>
                                          <option value="Corporate">Corporate</option>
                                          <option value="Charity">Charity</option>
                                          <option value="Others">Others</option>

                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Event Name:</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Colours of the event:</label>
                                        <input type="text" class="form-control" name="colours" placeholder="Ex: red-blue-black" required>
                                    </div>


                                    <div class="form-group">
                                        <label>Event starting date:</label>
                                        <input type="date" class="form-control" name="start_date" required>
                                    </div>
                                   

                                    <div class="form-group">
                                        <label>Event ending date:</label>
                                        <input type="date" class="form-control" name="end_date" required>
                                    </div>
                                     <div class="form-group">
                                        <label>If you want a cate, please select the size:</label>
                                        <select class="form-select" name="cake_size">
                                            <option selected value="null">Cake size</option>
                                            <option value="Large">Large</option>
                                            <option value="Meduim">Meduim</option>
                                            <option value="Small">Small</option>
                                        </select>
                                    </div>
                                    

                                    <div class="form-group">

                                        <label>Budget:</label> <br>
                                        <input type="text" class="form-control" name="budget" placeholder="numbes only..." required>
                                    </div>
                                    <div class="form-group">

                                        <label>Event Details:</label> <br>
                                        <input type="textarea" class="form-control" name="event_details" placeholder="300 characters max...">
                                    </div>
                                    <hr class="my-4">
                                    <div class="form-group">
                                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                                          <span class="text-primary">Location</span>
                                        </h4>
                                        
                                          
                                            <div class="form-group">
                                                <small class="text-muted">Enter the name of venue</small>
                                              <input type="text" class="form-control" name="location_name" required>
                                            </div>
                                        
                                            <div class="form-group">
                                                <small class="text-muted">Contact</small>
                                              <input type="text" class="form-control" name="contact">
                                            </div>
                                            
                                            <div class="form-group">
                                                <small class="text-muted">Opening time</small>
                                              <input type="time" class="form-control" name="opening_time" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <small class="text-muted">Description</small>
                                              <input type="textarea" class="form-control" name="details" >
                                            </div>
                                    </div>
                                    <hr class="my-4">
                                    <div>
                                        <h4 class="mb-3">Payment</h4>

                                        <div class="my-3">
                                            <div class="form-check">
                                              <input id="credit" name="paymentMethod" type="radio" value="Credit card" class="form-check-input" checked="" required="">
                                              <label class="form-check-label" for="credit">Credit card</label>
                                            </div>
                                            <div class="form-check">
                                              <input id="debit" name="paymentMethod" type="radio" value="Debit card" class="form-check-input" required="">
                                              <label class="form-check-label" for="debit">Debit card</label>
                                            </div>
                                        </div>

                                      <div class="row gy-3">
                                            <div class="col-md-6">
                                                <label for="cc-name" class="form-label">Name on card</label>
                                                <input type="text" class="form-control" id="cc-name" name="Name_on_card" required>
                                                <small class="text-muted">Full name as displayed on card</small>
                                            </div>

                                        <div class="col-md-6">
                                            <label for="cc-number" class="form-label">Credit card number</label>
                                            <input type="text" class="form-control" id="cc-number" name="card_num" required>
                                        </div>

                                        <div class="col-md-3">
                                          <label for="cc-expiration" class="form-label">Expiration</label>
                                          <input type="date" class="form-control" id="cc-expiration" name="expire_date" required="">
                                        </div>

                                        <div class="col-md-3">
                                          <label for="cc-cvv" class="form-label">CVV</label>
                                          <input type="text" class="form-control" id="cc-cvv" name="CVV" required>
                                        </div>
                                      </div>
                                  </div>
                                    <hr class="my-4">

                                    <div class="form-group row">
                                        <button type="submit" name="create" class="w-50 btn btn-primary btn-lg">Create</button>
                                        <a href="home.php" class="w-50 btn btn-danger btn-lg">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        
                    </div>
                </div>
            </div>
        
    </div>

</div>






<?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->






<!--javascript to open view Events Page--> 
<script>
  function openViewEventsPage()
  {
    window.open('viewEvents.php');
  }
</script>


 

</body>

</html>