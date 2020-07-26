<?php
include('../connect.php');
session_start();
  if(!isset($_SESSION['com_id'])){
    header('location: ../committee_login.html');
  }

$com_id=$_SESSION['com_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Staff Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="body.css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <style>


input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  
  /* Set a style for all buttons */
  
  
  
  /* Extra styles for the cancel button */
  .cancelbtn {
    width: 6rem;
    padding: 10px 18px;
    background-image: linear-gradient(to right, #4e54c8, #8f94fb);
border:0px;
    border-radius: 20px;
  }

  .loginbtn{
    width: 6rem;
    padding: 10px 18px;
    background-image: linear-gradient(to right, #4e54c8, #8f94fb);
    border:0px;
    border-radius: 20px;
  }
  
  .loginbtn:hover,.cancelbtn:hover{
    background-position: right;
      -webkit-box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
      box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
  }

  .container1 {
    padding: 16px;
    border-radius: 20px;
  }
  
  span.psw {
    float: right;
    padding-top: 16px;
  }
  
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }
  
  /* Modal Content/Box */
  .modal-content {
    background: linear-gradient(to right, #56ccf2, #2f80ed);
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 33%; /* Could be more or less, depending on screen size */
    border-radius: 20px;
  }
  
  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
    border-radius: 30%;
  }
  
  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }
  
  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  input{
    border-radius: 20px;
        border-style:double;
        border-width:4px;
  }

  input:hover{
        animation: mymove 1s infinite;
        position: relative;
    }
    @keyframes mymove {
        50% {box-shadow: 2px 4px 6px lightskyblue;}
    }
  
  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
  }
    
  @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
  }
  
  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
  }
  
  </style>
  <style type="text/css">
  .container-fluid{
    display: flex;
    justify-content: center;
  }
  .con{
    justify-content: center;
  }
  .newbody{
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: sans-serif;
  background: #f8f9fc00;
}
.cont {
  display: flex;
  flex-wrap: wrap;
}

.cont .card {
  position: relative;
  box-sizing: border-box;
  text-align: center;
  width: 300px;
  padding: 2rem;
  background: #fff;
  box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
  border-radius: 10px;
  margin: 2rem;
  overflow: hidden;
}
.cont .card:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;
  width: 50%;
  height: 100%;
  background: rgba(255, 255, 255, .1);
  pointer-events: none;
}

.cont .circle {
  position: relative;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  color: #fff;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  font-size: 2rem;
  font-weight: 700;
  transition: .5s; 
} 

.cont .card .c-1{
  background: #e84393;
  box-shadow: 0 0 0 0 #e84393;
}

.cont .card .c-2{
  background: #6c5ce7;
  box-shadow: 0 0 0 0 #6c5ce7;
}

.cont .card .c-3{
  background: #f9ca24;
  box-shadow: 0 0 0 0 #f9ca24;
}

.cont .card:hover .c-1{
  box-shadow: 0 0 0 300px #e84393;
}

.cont .card:hover .c-2{
  box-shadow: 0 0 0 300px #6c5ce7;
}

.cont .card:hover .c-3{
  box-shadow: 0 0 0 300px #f9ca24;
}

.cont .card .info {
  position: relative;
  z-index: 1;
  transition: .5s;
  color:#4E73DF;
}

.cont .card:hover .info {
  color: #fff;
  font-family: 'Montserrat', sans-serif;
}

.cont .card .info h3 {
  margin: 20px 0;
  font-size: 1.2rem;
  font-family: 'Montserrat', sans-serif;

}

.cont .card .info p {
  margin: 0;
  padding: 0;
  font-family: 'Montserrat', sans-serif;
}

.cont .card .info a {
  margin-top: 20px;
  padding: 10px 15px;
  display: inline-block;
  background: #fff;
  text-decoration: none;
  font-size: .8rem;
  font-weight: 500;
  border-radius: 2px;
  color: #000;
  cursor: pointer;
   box-shadow: 0 5px 15px rgba(0, 0, 0, .2);
}
.cont .card .info:hover{
  color:white;
}

#wrapper #content-wrapper {
    background-color: #f8f9fc00;
    width: 100%;
    overflow-x: hidden;
}
body {
  background-image: url("bus2.jpeg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  font-family: 'Montserrat', sans-serif;
}
.dname {
  font-weight: 600;
}
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group" style="display: none;">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

          
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="
    background: white;
    border: 1px solid #b7b9cc;
    border-radius: 20px;
    margin-top: 15px;
    height: 3rem;
">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $com_id; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="changepass.php">
                  <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <div class="container">
          
  <div class="row" style="justify-content: center;">  

    <div class="cont newbody">
     <div class="card" style="width: 150%;">
      <img src="./report_analysis_.png" style="width: 180px;height: 130px;margin: 10px auto;">
      <h1 style="text-align: center; font-family: 'Montserrat', sans-serif;"> <span class="dname">Hello <?php echo $com_id; ?></span></h1>
    <h4 style="text-align: center; font-family: 'Montserrat', sans-serif;">Here is a concise dashboard with all the options you need to use. </h4>
     </div>
     
      <div class="card"  onclick="document.getElementById('id01').style.display='block'">

        <div class="circle c-1"><i class="fas fa-plus"></i></div>
        <div class="info">
          <h3><b>Add New Entry</b></h3>
          <p>Register a new COVID-19 infected patient</p>
          
        </div>
      
      </div>


  
    
  <div id="id01" class="modal">
    <form class="modal-content animate" action="search.php" method="post">
        <div class="container1" >
        <div class="container1" style="color:black;">
            <label for="uname" ><b>CHECK WHETHER THE PATIENT ALREADY EXISTS</b></label>
        </div>
        
            <!-- <label for="psw"><b>Enter check no</b></label> -->
            <input type="text" placeholder="Enter check number" name="checkno" required>
          <br>
          <br>
         <center><button type="submit" name="login" class="loginbtn">SUBMIT</button></center>   
            <!-- <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label> -->
        </div>
  
        <div class="container1" style="background-color:lightblue;">
        <center>       <button type="button" onclick="document.getElementById('id01').style.display='none'"class="cancelbtn">CANCEL</button></center>   
        </div>
    </form>
</div>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>



    <a href="editlist.php" style="text-decoration: none;">
      <div class="card">
        <div class="circle c-2"><i class="fas fa-list"></i></div>
        <div class="info">
          <h3><b>Edit form </b></h3>
          <p>Edit the form of an existing patient</p>
          
        </div>
      </div>
      </a>
      <a href="updatelist.php" style="text-decoration: none;">
      <div class="card">
        <div class="circle c-3"><i class="fas fa-pen"></i></div>
        <div class="info">
          <h3><b>Add Daily Updates</b></h3>
          <p>Add daily updates to keep a track of the health</p>
          
        </div>
      </div>
    </div>
</div>
</a>
<!-- partial -->
</div>
      

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
      

     

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
