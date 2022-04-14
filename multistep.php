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
  $name= $_POST['name'];
  $mobile= $_POST['mobile'];
  $email= $_POST['email'];
  $city= $_POST['city'];
  $income= $_POST['income'];
  $age= $_POST['age'];
  $gender= $_POST['gender'];
  $Marital= $_POST['Marital'];

  $dup=mysqli_query($conn,"SELECT * FROM multistep_form2 where mobile='$mobile'");
  if(mysqli_num_rows($dup)>0)
  {
      
    $message = "duplicate value not allow";
   echo "<script type='text/javascript'>alert('$message');
   window.location = 'index.html';
   </script>";
    
  return false;

  } 

  
  else{

  
  $sql="INSERT INTO multistep_form2 (name,mobile,email,city,income,age,gender,Marital) VALUE ('$name','$mobile','$email','$city','$income','$age','$gender','$Marital')";
  if ($conn->query($sql)==true) {

  	header("Location:index.html");

  }
  else{
  	echo "Error in this code";
  }

  $conn->close();


}

?>