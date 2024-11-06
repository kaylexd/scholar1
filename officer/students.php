<?php
include('../includes/db.php');

// Query to select student data including the image
$sql = "SELECT id, sfname, slname, scourse, syear, sfix, sdbirth, sgender, sctship, saddress, scontact, simg, s_account_status, s_scholarship_type FROM students WHERE is_scholar = 0 ";
$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>   

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Officer</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="../vendor/fontawesome/css/all.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


  
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon">
  <img src="../img/logo.png" alt="logo">
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
  <a class="nav-link" href="students.php">
  <i class="fa-solid fa-users"></i>
    <span>Students</span></a>
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
                  
               Officer
                  
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

          <form action="../home.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Students Management</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="select_all" id="select_all" /></th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Current Course</th>
                        <th>Current Year Level</th>
                        <th>Contact No.</th>
                        <th>Scholarship Type</th>
                        <th>Account Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='select_row' class='select_row' /></td>";
                        echo "<td>" . (!empty($row['slname']) ? htmlspecialchars($row['slname']) : "") . "</td>";
                        echo "<td>" . (!empty($row['sfname']) ? htmlspecialchars($row['sfname']) : "") . "</td>";
                        echo "<td>" . (!empty($row['scourse']) ? htmlspecialchars($row['scourse']) : "") . "</td>";
                        echo "<td>" . (!empty($row['syear']) ? htmlspecialchars($row['syear']) : "") . "</td>";
                        echo "<td>" . (!empty($row['scontact']) ? htmlspecialchars($row['scontact']) : "") . "</td>";
                        echo "<td>" . (!empty($row['s_scholarship_type']) ? htmlspecialchars($row['s_scholarship_type']) : "") . "</td>";

                       // Display account status 
                       $status = !empty($row["s_account_status"]) ? htmlspecialchars($row["s_account_status"]) : 'Pending';
                       echo "<td>" . $status . "</td>";

                     
                        // Image column
                      //  echo "<td>";
                       // if (!empty($row['simg'])) {
                        //    echo "<img src='../img/" . htmlspecialchars($row['simg']) . "' width='100' alt='Student Image'>";
                       // } else {
                       //     echo "No image";
                       // }
                       // echo "</td>";
                        
                        // Action column with Edit, Delete, and Add buttons
                        echo "<td>
                        <div class='d-flex'>
                        <!-- View Button with Icon -->
                        <button type='button' class='btn btn-info btn-sm view_button mr-1' data-id='" . $row['id'] . "'>
                            <i class='fa-regular fa-eye'></i>
                        </button>

                        <!-- Edit Button with Icon -->
                        <button type='button' class='btn btn-success btn-sm edit_status_button mr-1' data-id='" . $row['id'] . "' data-status='" . $row['s_account_status'] . "'>
                            <i class='fa-solid fa-pen-to-square'></i>
                        </button>

                        <!-- Delete Button with Icon -->
                        <button type='button' class='btn btn-danger btn-sm delete_button' data-id='" . $row['id'] . "'>
                            <i class='fa-regular fa-circle-xmark'></i>
                        </button>
                    </div>


                    </td>";
 
                    }
                } else {
                    echo "<tr><td colspan='12'>No data available</td></tr>";
                }
                ?>
                </tbody>
                <!-- Edit Status Modal -->
<div class="modal fade" id="editStatusModal" tabindex="-1" role="dialog" aria-labelledby="editStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStatusModalLabel">Edit Student Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editStatusForm">
                    <input type="hidden" id="student_id" name="student_id">
                    <div class="form-group">
                        <label for="status">Account Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="saveStatusButton" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

                <!-- View Acad Modal -->
<div id="viewacadModal" class="modal fade">
		<div class="modal-dialog modal-dialog-scrollable custom-modal">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modal_title">View Student Details</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" id="acad_details">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<!-- View Non-Acad Modal -->
	<div id="viewnonacadModal" class="modal fade">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modal_title">View Student Details</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" id="nonacad_details">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<!-- View UNIFAST Modal -->
	<div id="viewunifastModal" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">View Student Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="unifast_details">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- View CHED Modal -->
	<div id="viewchedModal" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">View Student Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="ched_details">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

            </table>
        </div>
    </div>
</div>
</div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                
  <!-- Core plugin JavaScript-->
  <script src="..//jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>     
 

  </div>
  <!-- End of Main Content -->

  <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    $(document).ready(function() {
        // Select all checkbox
        $('#select_all').click(function() {
            $('.select_row').prop('checked', this.checked);
        });

        $('.select_row').click(function() {
            if (!$(this).is(':checked')) {
                $('#select_all').prop('checked', false);
            }
        });

        $(document).ready(function() {
            // Open the modal when Edit button is clicked
            $(document).on('click', '.edit_status_button', function() {
                var studentId = $(this).data('id');
                var currentStatus = $(this).data('status');

                // Set the current status and student ID in the modal
                $('#student_id').val(studentId);
                $('#status').val(currentStatus);

                // Show the modal
                $('#editStatusModal').modal('show');
            });

            // Save the status when Save button is clicked
            $('#saveStatusButton').click(function() {
                var studentId = $('#student_id').val();
                var newStatus = $('#status').val();

                // Send the updated status via AJAX
                $.ajax({
                    url: 'students_action.php',
                    type: 'POST',
                    data: { id: studentId, status: newStatus, action: 'update_status' },
                    success: function(response) {
                        alert(response);
                        $('#editStatusModal').modal('hide');
                        location.reload(); // Reload the page to reflect the changes
                    },
                    error: function() {
                        alert('Failed to update status. Please try again.');
                    }
                });
            });
        });

         // Delete Action
    $(document).on('click', '.delete_button', function() {
        var id = $(this).data('id');
        if (confirm("Are you sure you want to delete this student?")) {
            $.ajax({
                url: 'students_action.php', // Same PHP file for delete
                type: 'POST',
                data: { id: id, delete: true }, // Pass a delete flag
                success: function(response) {
                    alert('Student deleted successfully.');
                    location.reload(); // Reload the page to see the updated table
                },
                error: function() {
                    alert('Failed to delete student. Please try again.');
                }
                });
            }
        });
    });

      // View Function
$(document).on('click', '.view_button', function() {
    var s_id = $(this).data('id');
    $.ajax({
        url: "students_action.php",
        method: "POST",
        data: { s_id: s_id, action: 'acad_fetch_single' },
        dataType: 'JSON',
        success: function(data) {
            // Check if data is not null
            if (data) {
                var html = '<div class="table-responsive">';
                html += '<table class="table">';
                // Student ID Details
                html += '<tr><th width="40%" class="text-left" style="font-size:20px">Student ID Details</th><td width="60%"></td></tr>';
                html += '<tr><th width="40%" class="text-right">Student ID No.</th><td width="60%">' + data.sid + '</td></tr>';
                // Personal Details
                html += '<tr><th width="40%" class="text-left" style="font-size:20px">Personal Details</th><td width="60%"></td></tr>';
                html += '<tr><th width="40%" class="text-right">First Name</th><td width="60%">' + data.sfname + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Middle Name</th><td width="60%">' + data.smname + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Last Name</th><td width="60%">' + data.slname + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Suffix</th><td width="60%">' + data.snext + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Date of Birth</th><td width="60%">' + data.sdbirth + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Citizenship</th><td width="60%">' + data.sctship + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Address</th><td width="60%">' + data.saddress + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Email Address</th><td width="60%">' + data.semail + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Contact Number</th><td width="60%">' + data.scontact + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Gender</th><td width="60%">' + data.sgender + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Current Course</th><td width="60%">' + data.sccourse + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Current Year Level</th><td width="60%">' + data.scsyrlvl + '</td></tr>';
                // Family Details
                // Guardian Details
                html += '<tr><th width="40%" class="text-left" style="font-size:20px">Family Details</th><td width="60%"></td></tr>';
                html += '<tr><th width="40%" class="text-left" style="font-size:18px">Guardian Details</th><td width="60%"></td></tr>';
                html += '<tr><th width="40%" class="text-right">First Name</th><td width="60%">' + data.sgfname + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Address</th><td width="60%">' + data.sgaddress + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Contact Number</th><td width="60%">' + data.sgcontact + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Occupation/Position</th><td width="60%">' + data.sgoccu + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Company</th><td width="60%">' + data.sgcompany + '</td></tr>';
                // Father Details
                html += '<tr><th width="40%" class="text-left" style="font-size:18px">Father Details</th><td width="60%"></td></tr>';
                html += '<tr><th width="40%" class="text-right">First Name</th><td width="60%">' + data.sffname + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Address</th><td width="60%">' + data.sfaddress + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Contact Number</th><td width="60%">' + data.sfcontact + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Occupation/Position</th><td width="60%">' + data.sfoccu + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Company</th><td width="60%">' + data.sfcompany + '</td></tr>';
                // Mother Details
                html += '<tr><th width="40%" class="text-left" style="font-size:18px">Mother Details</th><td width="60%"></td></tr>';
                html += '<tr><th width="40%" class="text-right">First Name</th><td width="60%">' + data.smfname + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Address</th><td width="60%">' + data.smaddress + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Contact Number</th><td width="60%">' + data.smcontact + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Occupation/Position</th><td width="60%">' + data.smoccu + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Company</th><td width="60%">' + data.smcompany + '</td></tr>';
                
                // Scholarship Details
                html += '<tr><th width="40%" class="text-left" style="font-size:20px">Scholarship Details</th><td width="60%"></td></tr>';
                html += '<tr><th width="40%" class="text-right">Scholarship Type</th><td width="60%">' + data.s_scholarship_type + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Scholarship Status</th><td width="60%">' + data.s_scholar_stat + '</td></tr>';
                html += '<tr><th width="40%" class="text-right">Date Applied</th><td width="60%">' + data.applied_on + '</td></tr>';
                html += '<tr><th width="40%" class="text-left" style="font-size:20px">Study Load</th><td width="60%"></td></tr>';
                html += '</table></div>';

                // Populate the modal with the generated HTML
                $('#acad_details').html(html);
                // Show the modal
                $('#viewacadModal').modal('show');

            } else {
                alert("No data found for this student.");
            }
        },
        error: function(xhr, status, error) {
            alert("An error occurred: " + xhr.responseText);
        }
    });
});



</script>

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

</body>

</html>