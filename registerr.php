<?php
session_start();
include('includes/header.php'); 

// Retrieve old form data from the session, if available
$old_data = isset($_SESSION['old_data']) ? $_SESSION['old_data'] : [];
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center h2 text-gray-900 mb-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="register_action.php">
                    
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter name..." value="<?php echo isset($old_data['name']) ? $old_data['name'] : ''; ?>" required>
                      <!-- Display error under the Name field -->
                      <?php if (isset($errors['name'])): ?>
                          <div class="text-danger"><?php echo $errors['name']; ?></div>
                      <?php endif; ?>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" value="<?php echo isset($old_data['email']) ? $old_data['email'] : ''; ?>" required>
                      <!-- Display error under the Email field -->
                      <?php if (isset($errors['email'])): ?>
                          <div class="text-danger"><?php echo $errors['email']; ?></div>
                      <?php endif; ?>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" id="yourUsername" value="<?php echo isset($old_data['username']) ? $old_data['username'] : ''; ?>" required>
                      <!-- Display error under the Username field -->
                      <?php if (isset($errors['username'])): ?>
                          <div class="text-danger"><?php echo $errors['username']; ?></div>
                      <?php endif; ?>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <!-- Display error under the Password field -->
                      <?php if (isset($errors['password'])): ?>
                          <div class="text-danger"><?php echo $errors['password']; ?></div>
                      <?php endif; ?>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
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
</div>

<?php
// Clear session errors and old data after they are displayed
unset($_SESSION['errors']);
unset($_SESSION['old_data']);
include('includes/scripts.php'); 
?>
