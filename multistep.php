<?php
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="multistep2";

   $conn=new mysqli($servername,$username,$password,$dbname);
  if ($conn->connect_error)
   {
    die("connection fail");
  }
 
  if (isset($_POST['mobile'])) {
      
      $query = "SELECT * FROM multistep_form2 WHERE mobile='" . $_POST["mobile"]. "'";
      $result = mysqli_query($conn,$query);
      $count = mysqli_num_rows($result);
      if($count>0){
        echo "<span style='color:red'><b> User Already Exists</b> .</span>";
        echo "<script>$('#next').prop('disabled',true);</script>";
      }
      else{
        echo "<span style='color:green'><b>User Avalavel</b> .</span>";
        echo "<script>$('#next').prop('disabled',false);</script>";

         }
     if (isset($_POST['email'])) {   
  $name= $_POST['name'];
  $mobile= $_POST['mobile'];
  $email= $_POST['email'];
  $city= $_POST['city'];
  $income= $_POST['income'];
  $age= $_POST['age'];
  $gender= $_POST['gender'];
  $Marital= $_POST['Marital'];
       
  $sql="INSERT INTO multistep_form2 (name,mobile,email,age,gender,Marital) VALUE ('$name','$mobile','$email','$age','$gender','$Marital')";
  $sn="INSERT INTO city_name(city) VALUE ('$city')";
  $income= "INSERT INTO monthly_income (income) VALUE ('$income')";
  if ($conn->query($sn)==true) {
    
  }
  if ($conn->query($income)==true) {
  
  }
      if ($conn->query($sql)==true) {

    header("Location:index.html");

  } 
  else{

    echo "Error in this code";

  } 
  $conn->close();
}
         
    } 

?>
