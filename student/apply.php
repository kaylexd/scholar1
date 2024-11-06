<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student</title>

  <script src="../vendor/jquery/jquery.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="../vendor/fontawesome/css/all.min.css" rel="stylesheet">

  <!-- Include jQuery (make sure to include this in the <head> or before your script) -->
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


  
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon">
  <img src="../img/logo.png" alt>
  </div>
  <div class="sidebar-brand-text mx-3">SCC</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="index.php">
  <i class="fa-solid fa-house"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="apply.php">
  <i class="fa-solid fa-magnifying-glass"></i>
    <span>Apply</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading 
<div class="sidebar-heading">
  Interface
</div>
  -->

</ul>
<!-- End of Sidebar -->
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            
            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
               Student
                  
                </span>
                <img class="img-profile rounded-circle" src="../img/undraw_profile_1.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

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

          <form action="../login.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>
         
          
            
<!-- Form -->
<form method="post" name="apply_form" id="apply_form">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="h3 mb-4 text-gray-800">Student Application Management</h1>
            <div class="card">
                <div class="card-header" style="font-weight: bold; font-size: 18px;">Scholarships</div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <select name="select_sch" id="select_sch" class="form-control">
                                    <option value="" selected>Choose Scholarship</option>
                                    <optgroup label="School">
                                        <option value="1" title="Applicant Must Be...">Academic</option>
                                        <option value="2" title="Applicant Must Be...">Non-Academic</option>
                                    </optgroup>
                                    <optgroup label="Government">
                                        <option value="3" title="Applicant Must Be...">UNIFAST</option>
                                        <option value="4" title="Applicant Must Be...">CHED</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" name="btn_choose" id="btn_choose" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<script>
    $('#btn_choose').click(function() {
      var sel = document.getElementById('select_sch').value;
      
      if (sel === "1") {
        window.location.href = "application.php";
      } else if (sel === "2") {
        window.location.href = "application.php";
      } else if (sel === "3") {
        window.location.href = "application.php";
      } else if (sel === "4") {
        window.location.href = "application.php";
      } else {
        alert("Please select a scholarship");
      }
    });

    var title = [];
    $('#select_sch option').each(function() {
      title.push($(this).attr('title'));
    });

    $("ul.selectpicker li").each(function(i) {
      $(this).attr('title', title[i]).tooltip({ container: "#tooltipBox" });
    });
</script>


          <!-- /.container-fluid -->
        </div>
      

   
       <!-- Bootstrap core JavaScript-->
  
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  


  </div>
  <!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy;2024</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

</body>

</html>