
<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $results = $crud->getSpecialities();
?>
    <!--
        -First Name
        -Last Name
        -Date of Birth (Use DatePicker)
        -Speciality (Database Admin, Software Developer, Web Administrator, Other)
        -Email Address
        -Contact Number
    -->

    <h1 class="text-center">Registration for IT Conference  </h1>

    <form method="post" enctype="multipart/form-data" action="success.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>
       
        <div class="form-group">
            <label for="lastname" >Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
       
        <div class="form-group">
            <label for="dob" >Date of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob">
        </div>
            <div class="form-group">
            <label for="speciality">Area of Expertise</label>
            <select class="form-control" id="speciality" name="speciality">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?php echo $r['speciality_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input required type="text" class="form-control" id="email"  name="email"aria-describedby="emailHelp" >
            <small id="emailHelp" class="form-text text-muted">Email 
            will never be shared with anyone else</small>
        </div>
       
        <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="text" class="form-control" id="contact"  name="contact"aria-describedby="contactHelp" >
            <small id="contactHelp" class="form-text text-muted">Contact 
            will never be shared with anyone else</small>
        </div>
        <br/>
        
        <div class="container-fluid">
        <input type="file"accept="image/*" class="form-control me-2"  id="avatar"  name="avatar" >
      <small id="avatar" class="form-text text-success">Form upload is optional.</small>
      </div>

        
        <div class="d-grid gap-2">
              <button type="submit" name="submit"  class="btn btn-primary ">Submit</button>
        
  
</div>
    </form>
<br/>
<br/>
    <?php require_once 'includes/footer.php';
 ?>