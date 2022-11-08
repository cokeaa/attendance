<?php
    class crud{
        // private database object\
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db= $conn;
        }
            //function to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $speciality,$email, $contact){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,speciality_id,emailaddress,contactnumber)VALUES(:fname,:lname,:dob,:speciality,:email,:contact)";
                //prepare the sql statement to be excecution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':speciality',$speciality);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e){
                echo $e->getMessage();  
                return false;
             }             
        }

        public function editAttendee($id, $fname, $lname, $dob, $speciality, $email, $contact){
           try{
                  
           $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,
            `speciality_id`=:speciality,`emailaddress`=:email,`contactnumber`=:contact WHERE attendee_id = :id";
                        
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':id',$id);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':speciality',$speciality);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            //execute statement
            $stmt->execute();
            return true;

           }catch (PDOException $e){
            echo $e->getMessage();  
            return false;
           }
        }

        public function getAttendees(){
            try{
            $sql = "SELECT * FROM `attendee` a inner join specialities s on a.speciality_id =s.speciality_id;";
            $result = $this->db->query($sql);
            return $result; 
        }catch (PDOException $e){
            echo $e->getMessage();  
            return false;
           }

        }
        public function getAttendeeDetails($id){
            try{
            $sql = "select * from attendee a inner join specialities s on a.speciality_id =s.speciality_id where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result =$stmt->fetch();
            return $result;
        }catch (PDOException $e){
            echo $e->getMessage();  
            return false;
           }
        }
        public function deleteAttendee($id){
            try{
                $sql = "delete from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }
        public function getSpecialities(){
            try{
            $sql = "SELECT * FROM `specialities`;";
            $result = $this->db->query($sql);
            return $result; 

        }catch (PDOException $e){
            echo $e->getMessage();  
            return false;
           }
        }
        public function getSpecialityById($id){
            try{
            $sql = "SELECT * FROM `specialities` where speciality_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result =$stmt->fetch();
            return $result;

        }catch (PDOException $e){
            echo $e->getMessage();  
            return false;
           }
        }
    }

?>