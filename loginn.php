<?php
session_start();
include('includes/header.php'); 
?>

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

   <!-- Check for message in session -->
   <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success" role="alert">
            <?php 
            echo $_SESSION['message']; 
            // Clear the message from session
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>

    <div class="col-xl-6 col-lg-6 col-md-6">

    

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                  <?php
                  if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
                      echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                      unset($_SESSION['status']);
                  }
                  ?>
                </div>

                <form class="user" action="logincode.php" method="POST">
    <div class="form-group">
        <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username..." required>
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
    </div>
    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
    <hr>
    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>             

</form>


              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>


