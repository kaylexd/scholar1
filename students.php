<?php
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/db.php');

// Query to select student data including the image
$sql = "SELECT id, sfname, slname, scourse, syear, sfix, sdbirth, sgender, sctship, saddress, scontact, simg, s_account_status, s_scholarship_type  FROM students WHERE is_scholar = 0";
$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>                   

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Students Management</h6>
        </div>
        <div class="col" align="right">
        <button type="button" class="btn btn-info btn-sm add_button mr-1" data-id="<?php echo $row['id']; ?>">
    <i class="fas fa-plus"></i>
</button>

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
                        echo "<td><input type='checkbox' name='select_row' class='select_row' value='" . $row['id'] . "' /></td>";
                        echo "<td>" . (!empty($row['slname']) ? htmlspecialchars($row['slname']) : "") . "</td>";
                        echo "<td>" . (!empty($row['sfname']) ? htmlspecialchars($row['sfname']) : "") . "</td>";
                        echo "<td>" . (!empty($row['scourse']) ? htmlspecialchars($row['scourse']) : "") . "</td>";
                        echo "<td>" . (!empty($row['syear']) ? htmlspecialchars($row['syear']) : "") . "</td>";
                        echo "<td>" . (!empty($row['scontact']) ? htmlspecialchars($row['scontact']) : "") . "</td>";
                        echo "<td>" . (!empty($row['s_scholarship_type']) ? htmlspecialchars($row['s_scholarship_type']) : "") . "</td>";

                        // Display account status 
                        $status = !empty($row["s_account_status"]) ? htmlspecialchars($row["s_account_status"]) : 'Rejected';
                        echo "<td>" . $status . "</td>";
                        // Action column with Edit, Delete, and Add buttons
                        echo "<td>
                        <div class='d-flex'>
                        
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
                    echo "<tr><td colspan='11'>No data available</td></tr>";
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

            </table>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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

    // Add multiple selected students when any "Add" button is clicked
    $(document).on('click', '.add_button', function() {
        var selected = [];
        $('.select_row:checked').each(function() {
            selected.push($(this).val()); // Collect the value (student ID) of each checked checkbox
        });

        if (selected.length === 0) {
            alert('Please select at least one student.');
            return;
        }

        // Proceed with AJAX request to add selected students
        if (confirm("Are you sure you want to move the selected students to Scholars?")) {
            $.ajax({
                url: 'students_action.php',
                type: 'POST',
                data: { ids: selected, action: 'add_to_scholar' }, // Pass selected student IDs
                success: function(response) {
                    alert(response);  // Show success message
                    location.reload(); // Reload the page to reflect changes
                },
                error: function() {
                    alert('Failed to move the selected students. Please try again.');
                }
            });
        }
    });
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

       

</script>

<?php
include('includes/scripts.php');
?>
