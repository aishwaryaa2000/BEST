<?php
include('../connect.php');
session_start();
  if(!isset($_SESSION['com_id'])){
    header('location: ../committee_login.html');
  }

  $cheque_no=$_POST['checkno'];
  $query_check="SELECT * FROM `staff_details` WHERE `cheque_no`='$cheque_no'";
  $result_check = mysqli_query($conn,$query_check);
    if(mysqli_num_rows( $result_check ))
          {
            echo"<script>alert('Patient already exists! Cannot register again')</script>";
            header('refresh:0,url=staff.php');
          }
   else{
             echo"<script>alert('Patient doesn't exists! Please enter his details in the form')</script>";
             header('refresh:0,url=staff_details.php');
        }


?>
