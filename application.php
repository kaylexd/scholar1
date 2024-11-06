
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student</title>

  <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet">

  <!-- Include jQuery (make sure to include this in the <head> or before your script) -->
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


  
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



<a class="sidebar-brand d-flex align-items-center justify-content-center" href="student.php">
  <div class="sidebar-brand-icon">
  <img src="img/logo.png" alt>
  </div>
  <div class="sidebar-brand-text mx-3">SCC</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="apply.php">
  <i class="fa-solid fa-house"></i>
    <span>Apply</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading 
<div class="sidebar-heading">
  Interface
</div>
  -->
<li class="nav-item">
  <a class="nav-link" href="application.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Form</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">  


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
                <img class="img-profile rounded-circle" src="img/undraw_profile_1.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
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

          <form action="login.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>

       <!-- Header -->
       <form method="POST">

        <div class="row justify-content-center"><div class="col-md-10">
          <h1 class="h3 mb-4 text-gray-800">Application Form</h1>
          <span id="message"></span>
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active_tab1" id="list_personal_details" style="border:1px solid #ccc">Personal Details</a>
            </li>
          </ul>
    <!-- Personal Details -->
      <div class="tab-content" style="margin-top:16px;">
        <div class="tab-pane show active" id="personal_details">
          <div class="card">
            <div class="card-header" style="font-weight: bold; font-size: 16px;">Fill Personal Details</div>
              <div class="card-body">
                <div class="form-group">
                  <h4 class="sub-title">Personal Details</h4>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                      <label>First Name<span class="text-danger">*</span></label>
                      <input type="text" name="sfname" id="sfname" class="form-control" />
                      <span id="error_sfname" class="text-danger"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                      <label>Middle Name<span class="text-danger">*</span></label>
                      <input type="text" name="smname" id="smname" class="form-control" />
                      <span id="error_smname" class="text-danger"></span>
                      </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                      <label>Last Name<span class="text-danger">*</span></label>
                      <input type="text" name="slname" id="slname" class="form-control" />
                      <span id="error_slname" class="text-danger"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                      <label>Select Suffix</label>
                      <select name="sfix" id="sfix" class="form-control" required>
                      <option value="">-Select-</option>
                      <option value="N/A">N/A</option>
                        <option value="Jr.">Jr.</option>
                        <option value="Sr.">Sr.</option>
                      </select>
                      <span id="error_sfix" class="text-danger"></span>
                    </div>
                    <div class="col-xs-10 col-sm-12 col-md-4">
                      <label>Date of Birth<span class="text-danger">*</span></label>
                      <input type="date" name="sdbirth" id="sdbirth" autocomplete="off" class="form-control" />
                      <span id="error_sdbirth" class="text-danger"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <label>Select Gender<span class="text-danger">*</span></label>
                      <select name="sgender" id="sgender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      <span id="error_sgender" class="text-danger"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <label>Citizenship<span class="text-danger">*</span></label>
                      <input type="text" name="sctship" id="sctship" class="form-control" />
                      <span id="error_sctship" class="text-danger"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>Address<span class="text-danger">*</span></label>
                      <textarea type="text" name="saddress" id="saddress" class="form-control" required data-parsley-trigger="keyup"></textarea>
                      <span id="error_saddress" class="text-danger"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <label>Contact Number<span class="text-danger">*</span></label>
                      <input type="text" name="scontact" id="scontact" class="form-control" />
                      <span id="error_scontact" class="text-danger"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 offset-md-4">
                      <label>Email Address<span class="text-danger">*</span></label>
                      <input type="text" name="semail" id="semail" class="form-control" />
                      <span id="error_semail" class="text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group text-center">
                  <a class="btn btn-primary" href="apply.php" role="button">Back</a>
                  <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-success btn-md">Submit</button>
                </div>
              </div>
          </div>
        </div>
  
      </form>

      <script>
   $(document).ready(function() {
    // When the Next button is clicked
    $('#btn_personal_details').click(function() {
        var error_sfname = '';
        var error_smname = '';
        var error_slname = '';
        var error_sfix = '';
        var error_sdbirth = '';
        var error_sgender = '';
        var error_sctship = '';
        var error_saddress = '';
        var error_scontact = '';
        var pcnumval = /^[0-9]{10,15}$/; // Adjust pattern for contact number validation

        // Validate first name
        if ($.trim($('#sfname').val()).length == 0) {
            error_sfname = 'First Name is required';
            $('#error_sfname').text(error_sfname);
            $('#sfname').addClass('has-error');
        } else {
            error_sfname = '';
            $('#error_sfname').text(error_sfname);
            $('#sfname').removeClass('has-error');
        }

        // Validate middle name
        if ($.trim($('#smname').val()).length == 0) {
            error_smname = 'Put N/A if None';
            $('#error_smname').text(error_smname);
            $('#smname').addClass('has-error');
        } else {
            error_smname = '';
            $('#error_smname').text(error_smname);
            $('#smname').removeClass('has-error');
        }

        // Validate last name
        if ($.trim($('#slname').val()).length == 0) {
            error_slname = 'Last Name is required';
            $('#error_slname').text(error_slname);
            $('#slname').addClass('has-error');
        } else {
            error_slname = '';
            $('#error_slname').text(error_slname);
            $('#slname').removeClass('has-error');
        }

        // Validate suffix
        if ($('#sfix').val() == '') {
            error_sfix = 'Select N/A if None';
            $('#error_sfix').text(error_sfix);
            $('#sfix').addClass('has-error');
        } else {
            error_sfix = '';
            $('#error_sfix').text(error_sfix);
            $('#sfix').removeClass('has-error');
        }

        // Validate date of birth
        if ($.trim($('#sdbirth').val()).length == 0) {
            error_sdbirth = 'Date of Birth is required';
            $('#error_sdbirth').text(error_sdbirth);
            $('#sdbirth').addClass('has-error');
        } else {
            error_sdbirth = '';
            $('#error_sdbirth').text(error_sdbirth);
            $('#sdbirth').removeClass('has-error');
        }

        // Validate gender
        if ($('#sgender').val() == '') {
            error_sgender = 'Gender is required';
            $('#error_sgender').text(error_sgender);
            $('#sgender').addClass('has-error');
        } else {
            error_sgender = '';
            $('#error_sgender').text(error_sgender);
            $('#sgender').removeClass('has-error');
        }

        // Validate citizenship
        if ($.trim($('#sctship').val()).length == 0) {
            error_sctship = 'Citizenship is required';
            $('#error_sctship').text(error_sctship);
            $('#sctship').addClass('has-error');
        } else {
            error_sctship = '';
            $('#error_sctship').text(error_sctship);
            $('#sctship').removeClass('has-error');
        }

        // Validate address
        if ($.trim($('#saddress').val()).length == 0) {
            error_saddress = 'Address is required';
            $('#error_saddress').text(error_saddress);
            $('#saddress').addClass('has-error');
        } else {
            error_saddress = '';
            $('#error_saddress').text(error_saddress);
            $('#saddress').removeClass('has-error');
        }

        // Validate contact number
        if ($.trim($('#scontact').val()).length == 0) {
            error_scontact = 'Contact Number is required';
            $('#error_scontact').text(error_scontact);
            $('#scontact').addClass('has-error');
        } else if (!pcnumval.test($('#scontact').val())) {
            error_scontact = 'Invalid Contact Number';
            $('#error_scontact').text(error_scontact);
            $('#scontact').addClass('has-error');
        } else {
            error_scontact = '';
            $('#error_scontact').text(error_scontact);
            $('#scontact').removeClass('has-error');
        }

        // Check if there are any errors
        if (error_sfname != '' || error_smname != '' || error_slname != '' || error_sfix != '' ||
            error_sdbirth != '' || error_sgender != '' || error_sctship != '' || error_saddress != '' ||
            error_scontact != '') {
            return false; // Prevent moving to the next tab if there are errors
        } else {
            // Proceed to the next tab
            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#personal_details').removeClass('active');
            $('#list_personal_details').addClass('inactive_tab1');
            $('#list_family_details').removeClass('inactive_tab1');
            $('#list_family_details').addClass('active_tab1 active');
            $('#list_family_details').attr('href', '#family_details');
            $('#list_family_details').attr('data-toggle', 'tab');
            $('#family_details').addClass('active in');
        }

        $('#previous_btn_family_details').click(function(){
        $('#list_family_details').removeClass('active active_tab1');
        $('#list_family_details').removeAttr('href data-toggle');
        $('#family_details').removeClass('active in');
        $('#list_family_details').addClass('inactive_tab1');
        $('#list_personal_details').removeClass('inactive_tab1');
        $('#list_personal_details').addClass('active_tab1 active');
        $('#list_personal_details').attr('href', '#personal_details');
        $('#list_personal_details').attr('data-toggle', 'tab');
        $('#personal_details').addClass('active in');
      });
    });
});


      </script>

<!-- /.container-fluid -->
</div>
      

   
      <!-- Bootstrap core JavaScript-->
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="js/sb-admin-2.min.js"></script>
 





 </div>
 <!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

</body>

</html>