<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/db.php');
// Query to count students with is_scholar = 1 (approved)
$sql = "SELECT COUNT(*) AS approved_count FROM students WHERE is_scholar = 1";
$result = $conn->query($sql);

// Fetch the count from the result
$approved_count = 0;
if ($result && $row = $result->fetch_assoc()) {
    $approved_count = $row['approved_count'];
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example 
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">0
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    -->

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Students Approved</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?php echo htmlspecialchars($approved_count); ?> <!-- Display the approved count -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Applicants</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
                </div>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example 
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Renewal</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  -->

  


  <?php
include('includes/scripts.php');
?>