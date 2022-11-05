
<?php 
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialities();

    if(!isset($_GET['id']))
    {
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
    
?>
    
    <h1 class="text-center">Edit Record  </h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name = 'id' value="<?php echo $attendee['attendee_id']?>" />
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>"id="firstname" name="firstname">
    </div>
               <div class="form-group">
            <label for="lastname" >Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>"id="lastname" name="lastname">
        </div>
               <div class="form-group">
            <label for="dob" >Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>"id="dob" name="dob">
        </div>
            <div class="form-group">
            <label for="speciality">Area of Expertise</label>
            <select class="form-control" id="speciality" name="speciality">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['speciality_id'] ?>" <?php if($r['speciality_id']
                    == $attendee['speciality_id']) echo 'selected '?>>
                    <?php echo $r['name']; ?>
                </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" value="<?php echo $attendee['emailaddress'] ?>"id="email"  name="email"aria-describedby="emailHelp" >
            <small id="emailHelp" class="form-text text-muted">Email 
            will never be shared with anyone else</small>
        </div>
               <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>"id="contact"  name="contact"aria-describedby="contactHelp" >
            <small id="contactHelp" class="form-text text-muted">Contact 
            will never be shared with anyone else</small>
        </div>
        <div class="d-grid gap-2">
              <button type="submit" name="submit"  class="btn btn-success btn-block ">Save Changes</button>
        
  
</div>
    </form>
    <?php } ?>
<br/>
<br/>
    <?php require_once 'includes/footer.php';
 ?>