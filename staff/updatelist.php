<?php

session_start();
include('../connect.php');
if(!isset($_SESSION['com_id'])){
  header('location: ../committee_login.html');
}



// echo $_SESSION['com_id'];
$com_id = $_SESSION['com_id'];
$query = "SELECT * FROM `staff_details` WHERE `com_id`= '$com_id' AND `oxygen`='No'";
$result = mysqli_query($conn,$query);


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Update List</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
      button.mybtn {
      display: block;
      width: 80%;
      height: 40px;
      border-radius: 25px;
      outline: none;
      border: none;
      text-align: center;
      background-image: linear-gradient(to right, #4e54c8, #8f94fb);
      background-size: 200%;
      font-size: 0.8rem;
      font-weight:400;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      text-transform: uppercase;      
      cursor: pointer;
      transition: .5s;
      -webkit-box-shadow: 7px 10px 18px -15px rgba(0,0,0,0.75);
-moz-box-shadow: 7px 10px 18px -15px rgba(0,0,0,0.75);
box-shadow: 7px 10px 18px -15px rgba(0,0,0,0.75);
    }
    button.mybtn:hover {
      background-position: right;
      -webkit-box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
      box-shadow: 10px 10px 18px -4px rgba(0, 0, 0, 0.75);
    }
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="staff.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HOME </div>
      </a>
      <br>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

   <br>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="staff_details.php">
          <i class="fas fa-fw fa-pen-alt"></i>
          <span>Create New Entry</span></a>
      </li>
           

      <!-- Divider -->
      <hr class="sidebar-divider">
     

   
<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="editlist.php">
    <i class="fas fa-fw fa-pen-alt"></i>
    <span>Edit form</span></a>
</li>
     

 
 <!-- Divider -->
 <hr class="sidebar-divider">
 
  
 
 
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
  <a class="nav-link" href="changepass.php">
       <i class="fas fa-fw fa-pen-alt"></i>
       <span>Change password</span></a>
   </li>
        
 
  <hr class="sidebar-divider">
 
  
 
 
 <!-- Nav Item - Dashboard -->
 <li class="nav-item">
   <a class="nav-link"  data-toggle="modal" data-target="#logoutModal">
     <i class="fas fa-fw fa-pen-alt"></i>
     <span>Logout</span></a>
 </li>
     



      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Lists:
      </div>
      <li class="nav-item">
        <a class="nav-link" href="Overall-List.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Overall List</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Oxygen-List.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Oxygen List</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Discharged-List.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Discharged List</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Expired-List.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Expired List</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="auth_members.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Authorise Members</span></a>
      </li> -->


    

     
    
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
<br>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->
          <h3>BRIHANMUMBAI ELECTRICITY SUPPLY AND TRANSPORT</h3>
     
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown no-arrow">
            <a href="staff.php"> <button type="submit" id="submit" name="submit" class="mybtn" style="background:#FA0204;color:#fff; border-radius:10px; width:5rem;" ><b>BACK</b> </button></a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Overall List</h1> -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color:#88C4EC;">  
                   
                    <tr>
                      <th>Reg.no.</th>
                      <th>Check No.</th>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Age</th>
                      <th>Hospital</th>
                      <th>Update</th>
                    </tr>
                  </thead>


                  <tbody>
                   
                     
<!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($result)){?>
                  <tr>
                      <td><?php echo $row['regis_no'];?></td>
                      <td><?php echo $row['cheque_no'];?></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['mobile_no'];?></td>
                      <td><?php echo $row['age'];?></td>
                      <td><?php echo $row['hospital'];?></td>
                      
                      <form action="update.php" method="POST">
                    <?php
                    $regis_no=$row['regis_no'];
                    echo "<td><div class='d-flex justify-content-around'>
                    <button type='submit' class='mybtn' name='submit' value='$regis_no' >UPDATE
                    </div></td>";
                    
                    ?>
                      </form>
                  </tr>
                <?php }?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      

    

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


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
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
