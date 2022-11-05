<?php
 require_once 'db/conn.php';

//Get values from post operation
if(isset($_POST['submit'])){
    //extract values from the _POST array
    $id = $_POST['id'];
    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];
    $dob= $_POST['dob'];
    $speciality = $_POST['speciality'];
    $email = $_POST['email'];
    $contact= $_POST['contact'];


//Call crud function
$result = $crud->editAttendee($id, $fname, $lname, $dob, $speciality, $email, $contact);
//Redirect to index.php
if($result){
    header("Location: viewrecords.php");
}
else{
    include 'includes/errormessage.php';
}
}

?>