<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        //extract values from the _POST array
        $fname= $_POST['firstname'];
        $lname= $_POST['lastname'];
        $dob= $_POST['dob'];
        $speciality = $_POST['speciality'];
        $email = $_POST['email'];
        $contact= $_POST['contact'];
        //Call function to insert and track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $speciality,$email, $contact);
        $specialityName = $crud->getSpecialityById($speciality);
    if($isSuccess){
        SendEmail::SendMail($email, 'Welcome to IT Conference 2022', 'You have registered successfully for Coference 2022');
        include 'includes/successmessage.php';
         }
         else{
            include 'includes/errormessage.php';
         }
    }
?>
    <!-- This prints out values that were passed to the action page using method="get"-->

    <!--<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstname'] .' ' .$_GET['lastname']; ?>
            </h5>
            <h6 class="card-title">
                <?php //echo $_GET['speciality']; ?>
            </h6>
            <p class="card-text">   
                Date of Birth: <?php //echo $_GET['dob']; ?>
            </p>
            <p class="card-text">   
                Email Address: <?php //echo $_GET['email']; ?>
            </p>
            <p class="card-text">   
                Contact Number: <?php //echo $_GET['contact']; ?>
            </p>
        </div>
     </div> -->

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
            <?php echo $_POST['firstname'] .' ' .$_POST['lastname']; ?>
            </h5>
             <h6 class="card-title mb-2 text muted">
                    <?php echo $specialityName['name']; ?>
            </h6>
            <p class="card-text">   
                Date of Birth: <?php echo $_POST['dob']; ?>
            </p>
                <p class="card-text">   
                    Email Address: <?php  echo $_POST['email']; ?>
            </p>
                <p class="card-text">   
                    Contact Number: <?php echo $_POST['contact']; ?>
            </p>
    </div>
</div>
    <?php
        
?>
<br/>
<br/>
<br/>
    <?php require_once 'includes/footer.php';
 ?>