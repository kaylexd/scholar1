<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The College EduFund System of St. Cecilia’s College</title>
    <link rel="stylesheet" href="css/register.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />

  </head>
  <body>
    <header>
      
      <nav>
        
        <ul>
          <b></b>
          <li><h3><a href="home.php" class="about-link">College of Edufund St.Cecilia's College</a></h3></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li>09123456789</li>
          <li><a href="login.php" class="login-link">Login</a></li>

          
          </div>
        </ul>
      </nav>
    </header>
    <main>
 </section>
     
     
    </section>
    
    <section class="Title">
      <img src="img/caputre1.PNG" alt="caputre1" />
          <div class="main-item">
            
           <div class="login-container">
              
             <h2>Create Account <h2>
              <p>Unlock Your Future—Create Your Scholarship Account Today!</p>
              <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo "<div class='error'>" . $_SESSION['error'] . "</div>";
                    unset($_SESSION['error']); // Clear the error after displaying it
                }
                ?>


          <form action="register_action.php" method="POST" enctype="multipart/form-data">
              <label for="studentid">Student ID</label> 
              <div class="input-container">
                  <input type="text" name="studentid" placeholder="example: SCC-0001" class="input-field" required>
              </div>
              <label for="lastname">Last Name</label> 
              <div class="input-container">
                  <input type="text" name="lastname" placeholder="example: Dela Cruz" class="input-field" required>
              </div>
              <label for="firstname">First Name</label> 
              <div class="input-container">
                  <input type="text" name="firstname" placeholder="example: Juan" class="input-field" required>
              </div>
              <label for="email">Email Address</label> 
              <div class="input-container">
                  <input type="text" name="email" placeholder="example: juandelacruz@gmail.com" class="input-field" required>
              </div>
              <label for="password">Password</label> 
              <div class="input-container">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Enter Password" class="input-field" required>
              </div>
              <div class="upload-container">
    <label for="file-upload" class="file-label">Study Load</label> 
    <label for="file-upload" class="custom-file-upload">
        <b>Upload</b>
    </label>
    <input id="file-upload" name="studyload" type="file" accept="image/*" required onchange="showFileName()">
    <span id="file-name" class="file-name-display"></span> <!-- Display the uploaded file name here -->
</div>
              <div class="button">
                  <button type="submit">Submit</button>
                  <button type="button" onclick="window.location.href='login.php';">Cancel</button>
              </div>
          </form>

            </div>
         </div>
      </div>

      <style>
.upload-container {
    display: flex;
    align-items: center;
}
.file-label {
    margin-right: 15px; /* Adjust this value to increase or decrease space */
}

.custom-file-upload {
    margin-right: 10px;
    cursor: pointer;
}

.file-name-display {
    font-size: 12px; 
    max-width: 100px;      /* Limit the width to prevent overflow */
    white-space: nowrap;   /* Prevent line breaks */
    overflow: hidden;      /* Hide overflow content */
    text-overflow: ellipsis; /* Add ellipsis for overflowed text */
    font-style: italic;
    color: #555;           /* Optional: style for readability */
    margin-left: 2px;     /* Add space between the button and filename */
}
</style>
      
<script>
function showFileName() {
    const fileInput = document.getElementById('file-upload');
    const fileNameDisplay = document.getElementById('file-name');
    
    if (fileInput.files.length > 0) {
        // Get the full file name
        const fullFileName = fileInput.files[0].name;
        
        // Split to get the base name and extension
        const baseName = fullFileName.split('.')[0];
        const extension = fullFileName.split('.').pop();
        
        // Limit base name to 10 characters and append the extension
        const displayFileName = baseName.slice(0, 10) + '...' + '.' + extension;
        
        fileNameDisplay.textContent = displayFileName;
    } else {
        fileNameDisplay.textContent = ''; // Clear the display if no file is selected
    }
}
</script>
  </section>
    </main>
    <footer>
     
        <div class="footer-content">
          <img src="img/OIP.png" alt="Logo" class="logo">
          <div class="text-content">
              <h3>St.Cecilia's College</h3>
             <p>Supervised by the Lasallian School Supervision office (LASSO).</p>
          </div>
          <img src="img/R.png" alt="R" class="logo1">
          <div class="text-content">
              <h3>Commission on Higher Education</h3>
             <p> To promote equitable access and  ensure 
              quality and <br>relevance of higher education institution and  their programs..</p>
          </div>
        </div>  
        <div class="h1" style="padding-top: 30px ;"> <h3>Contact Us </h3></div>
        <div class="footer-content">
          <img src="img/loc.png" alt="Logo" class="logo3">
          <div class="text-content1">
             <p>Cebu South National Highway, <br>Pablaction Ward II , Minglanilla ,Cebu</p>
          </div>
          <img src="img/telephone.png" alt="Logo" class="logo4">
          <div class="text-content1">
             <p> Tel. No. (032) 236 3677 /<br> (032) 497 0767
              (032) 268 4746</p>
          </div>
        </div>  

        <div class="footer-content">
          <img src="img/email2.png" alt="Logo" class="logo3">
          <div class="text-content1">
             <p>sccreg@gmail.com</p>
        </div>
          <img src="img/web.png" alt="Logo" class="logo3">
          <div class="text-content1"> 
             <p> CollegeEdufund.scc.edu.ph</p>
          </div>
        </div>  
       
        <div class="space"></div>
        
      <div class="footer-bottom">
          <p>&copy; 2024 CollegeEdufund. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

