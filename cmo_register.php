<?php

if(isset($_POST['cmo_login'])){
    // $pwd=$_POST['pwd'];
    include('connect.php');
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $query1 = "SELECT * FROM `cmo_cred` WHERE `email`='$email'";
    // echo $query1;
    $res1 = mysqli_query($conn,$query1);
    $data = $res1->fetch_array(MYSQLI_ASSOC);
    if($data){
        $pass = $data['password'];
        $com_id = $data['com_id'];
    }
  
    
    if(mysqli_num_rows($res1) > 0)
    {
        if($pass == $pwd){
            session_start();
            $_SESSION['com_id'] = $com_id;
            // echo("welcome!");
            header('location: Overall-List.php');
        }
        else{
            echo'alert("wrong password")';
            header("location:committee_login.html");
        }
    }
    else{
        echo'alert("Invalid Email id")';
        header("location:committee_login.html");
    }
}

?>