<?php
include('includes/db.php');

if (isset($_POST['delete'])) {
    // Handle delete request
    $id = $_POST['id'];

    // Delete the student from the database
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Student deleted successfully"; // Response to AJAX call
    } else {
        echo "Error deleting student: " . $conn->error; // Return error message
    }

    // Close the statement
    $stmt->close();
}


if (isset($_POST["action"])) {
    switch ($_POST["action"]) {
        case 'acad_fetch_single':
            // Single Acad Fetch Query
            // Prepare the SQL statement
            $stmt = $conn->prepare("
                SELECT students.*,
                       students.applied_on, 
                       family.sgfname, family.sgaddress, family.sgcontact, family.sgoccu, family.sgcompany,
                       family.sffname, family.sfaddress, family.sfcontact, family.sfoccu, family.sfcompany,
                       family.smfname, family.smaddress, family.smcontact, family.smoccu, family.smcompany
                FROM students 
                LEFT JOIN family ON students.id = family.student_id 
                WHERE students.id = ? 
            ");

            // Bind the parameters
            $stmt->bind_param("i", $_POST["s_id"]);

            // Execute the statement
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            $data = array();

            // Fetch the data
            if ($row = $result->fetch_assoc()) {
                // Populate data array with fetched row data
                $data['sid'] = $row['sid'];
                $data['sfname'] = $row['sfname'];
                $data['smname'] = $row['smname'];
                $data['slname'] = $row['slname'];
                $data['sfix'] = $row['sfix'];
                $data['sdbirth'] = $row['sdbirth'];
                $data['sgender'] = $row['sgender'];
                $data['sctship'] = $row['sctship'];
                $data['saddress'] = $row['saddress'];
                $data['semail'] = $row['semail'];
                $data['scontact'] = $row['scontact'];
                $data['scourse'] = $row['scourse'];
                $data['syear'] = $row['syear'];
                // Family Details
                $data['sgfname'] = $row['sgfname'];
                $data['sgaddress'] = $row['sgaddress'];
                $data['sgcontact'] = $row['sgcontact'];
                $data['sgoccu'] = $row['sgoccu'];
                $data['sgcompany'] = $row['sgcompany'];
                $data['sffname'] = $row['sffname'];
                $data['sfaddress'] = $row['sfaddress'];
                $data['sfcontact'] = $row['sfcontact'];
                $data['sfoccu'] = $row['sfoccu'];
                $data['sfcompany'] = $row['sfcompany'];
                $data['smfname'] = $row['smfname'];
                $data['smaddress'] = $row['smaddress'];
                $data['smcontact'] = $row['smcontact'];
                $data['smoccu'] = $row['smoccu'];
                $data['smcompany'] = $row['smcompany'];

                // Scholar Type
                $data['s_scholarship_type'] = $row['s_scholarship_type'];
                $data['applied_on'] = $row['applied_on'];
            }

            // Return the data as JSON
            echo json_encode($data);
            break;

        // Add more cases for other actions here

        default:
            echo "Invalid action"; // Handle invalid action
            break;
    }
} else {
    echo "Invalid request"; // Handle invalid request
}

// Edit Acad Query
if($_POST["action"] == 'edit_acad')
{
    $error = '';

    $success = '';

    $data = array(
        ':semail'	 				=>	$_POST["semail"],
        ':s_id'						=>	$_POST['acad_hidden_id']
    );

    $object->query = "
    SELECT * FROM students
    WHERE semail = :semail
    AND s_id != :s_id
    ";

    $object->execute($data);

    if($object->row_count() > 0)
    {
        $error = '<div class="alert alert-danger">Email Address Already Exists</div>';
    }
    else
    {
        $object->query = "
        UPDATE tbl_student
        SET sfname = :sfname,
        smname = :smname,
        slname = :slname,
        snext = :snext,
        sdbirth = :sdbirth,
        sctship = :sctship,
        saddress = :saddress,
        semail = :semail,
        scontact = :scontact,
        sccourse = :sccourse,
        scsyrlvl = :scsyrlvl,
        sgender = :sgender,
        sgfname = :sgfname, 
        sgaddress = :sgaddress,
        sgcontact = :sgcontact,
        sgoccu = :sgoccu,
        sgcompany = :sgcompany,
        sffname = :sffname,
        sfaddress = :sfaddress,
        sfcontact = :sfcontact,
        sfoccu = :sfoccu,
        sfcompany = :sfcompany,
        smfname = :smfname,
        smaddress = :smaddress,
        smcontact = :smcontact,
        smoccu = :smoccu,
        smcompany = :smcompany,
        spcyincome = :spcyincome,
        spsgwa = :spsgwa,
        spsraward = :spsraward,
        spsdawardrceive = :spsdawardrceive,
        sdsprc = :sdsprc,
        sdsprcstat = :sdsprcstat,
        sdspgm = :sdspgm,
        sdspgmstat = :sdspgmstat,
        sdsprc = :sdsprc,
        sdsprcstat = :sdsprcstat,
        s_scholarship_note = :s_scholarship_note,
        s_scholar_stat = :s_scholar_stat
        WHERE s_id = '".$_POST['acad_hidden_id']."'
        ";

        if($error == '')
        {

            $data = array(
                // Personal Details
                ':sfname'					    =>	$object->clean_input($_POST["sfname"]),
                ':smname'					    =>	$object->clean_input($_POST["smname"]),
                ':slname'					    =>	$object->clean_input($_POST["slname"]),
                ':snext'					    =>	$object->clean_input($_POST["snext"]),
                ':sdbirth'					  	=>	$object->clean_input($_POST["sdbirth"]),
                ':sgender'					  	=>	$object->clean_input($_POST["sgender"]),
                ':sctship'				    	=>	$object->clean_input($_POST["sctship"]),
                ':saddress'						=>	$object->clean_input($_POST["saddress"]),
                ':semail'						=>	$object->clean_input($_POST["semail"]),
                ':scontact'						=>	$object->clean_input($_POST["scontact"]),
                ':sccourse'						=>	$object->clean_input($_POST["sccourse"]),
                ':scsyrlvl'						=>	$object->clean_input($_POST["scsyrlvl"]),
                // Family Details
                // Guardian Details
                ':sgfname'				      	=>	$object->clean_input($_POST["sgfname"]),
                ':sgaddress'					=>	$object->clean_input($_POST["sgaddress"]),
                ':sgcontact'					=>	$object->clean_input($_POST["sgcontact"]),
                ':sgoccu'					    =>	$object->clean_input($_POST["sgoccu"]),
                ':sgcompany'					=>	$object->clean_input($_POST["sgcompany"]),
                // Father Details
                ':sffname'				      	=>	$object->clean_input($_POST["sffname"]),
                ':sfaddress'					=>	$object->clean_input($_POST["sfaddress"]),
                ':sfcontact'					=>	$object->clean_input($_POST["sfcontact"]),
                ':sfoccu'				      	=>	$object->clean_input($_POST["sfoccu"]),
                ':sfcompany'				   	=>	$object->clean_input($_POST["sfcompany"]),
                // Mother Details
                ':smfname'				      	=>	$object->clean_input($_POST["smfname"]),
                ':smaddress'					=>	$object->clean_input($_POST["smaddress"]),
                ':smcontact'					=>	$object->clean_input($_POST["smcontact"]),
                ':smoccu'				      	=>	$object->clean_input($_POST["smoccu"]),
                ':smcompany'				    =>	$object->clean_input($_POST["smcompany"]),
                ':spcyincome'				  	=>	$object->clean_input($_POST["spcyincome"]),
                // Achievement Details
                ':spsgwa'				      	=>	$object->clean_input($_POST["spsgwa"]),
                ':spsraward'					=>	$object->clean_input($_POST["spsraward"]),
                ':spsdawardrceive'		  		=>	$object->clean_input($_POST["spsdawardrceive"]),
                // Requirement Details
                ':sdsprc'					  	=>	$object->clean_input($_POST["sdsprc"]),
                ':sdsprcstat'					=>	$object->clean_input($_POST["sdsprcstat"]),
                ':sdspgm'				    	=>	$object->clean_input($_POST["sdspgm"]),
                ':sdspgmstat'					=>	$object->clean_input($_POST["sdspgmstat"]),
                ':sdsprc'					  	=>	$object->clean_input($_POST["sdsprc"]),
                ':sdsprcstat'				    =>	$object->clean_input($_POST["sdsprcstat"]),
                // Scholarship Note
                ':s_scholarship_note'			=>	$object->clean_input($_POST["s_scholarship_note"]),
                // Scholarship Details
                ':s_scholar_stat'				=>	$object->clean_input($_POST["s_scholar_stat"])
            );

            $object->execute($data);

            $success = '<div class="alert alert-success">Student Data Updated</div>';
        }
    }
    $output = array(
        'error'		=>	$error,
        'success'	=>	$success
    );

    echo json_encode($output);

}

$conn->close();
?>
