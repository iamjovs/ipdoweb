<?php 
    include_once 'conn.php';


    if(isset($_POST['email']) && isset($_POST['password'])) {
            // Get form data
           
            $email = $conn->real_escape_string($_POST['email']);
            $lname = $conn->real_escape_string($_POST['lname']);
            $fname = $conn->real_escape_string($_POST['fname']);
            $suf = $conn->real_escape_string($_POST['suf']);
            $campus = $conn->real_escape_string($_POST['campus']);
            $acc = $conn->real_escape_string($_POST['account']);
            $password =$conn->real_escape_string($_POST['password']);
            $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

            try {
                $dupem = $conn->prepare("SELECT * FROM users WHERE email = ?");
                $dupem->bind_param("s", $email);
                $dupem->execute();
                $result = $dupem->get_result();
            } catch (e) {
                console.log("An error occurred: " + e.message);
            }
                

           if (mysqli_num_rows($result) == 0) {
                // Validate form data
                if ($password == $confirm_password) {
                    if($hashedPassword = password_hash($password, PASSWORD_DEFAULT)){
                    // Prepare and execute SQL statement to insert user data into the database
                    $stmt = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, suffix, account, campus_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssi", $email, $hashedPassword, $fname, $lname, $suf, $acc, $campus);
                    $stmt->execute();
                    $response = array('status' => 'success', 'message' => 'Your account has been created successfully.');
                    }
                    
                } else {
                    // Hash password
                     
                        // Handle password confirmation error
                    $response = array('status' => 'error', 'message' => 'Password confirmation does not match.');
                }
            } else {
                // Handle email already exists error
                $response = array('status' => 'error', 'message' => $email . ' is already taken.');
            }

            
                // Close statement and database connection
       


            // Send response to jQuery
            header('Content-Type: json');
            echo json_encode($response);
    }

    if (isset($_POST['tp_pl']) && isset($_POST['tp_jo']) && isset($_POST['ntp_pl']) && isset($_POST['cjo']) && isset($_POST['admyear']) && isset($_POST['admquarter'])) {
          
            $tp_pl = $_POST['tp_pl'];
            $tp_jo = $_POST['tp_jo'];
            $ntp_pl = $_POST['ntp_pl'];
            $cjo = $_POST['cjo'];
            $year = $_POST['admyear'];
            $period = $_POST['admquarter'];
            $r_type = "Insert Data";
            $table = "Administration";
            
            $check = $conn->prepare("SELECT name,year FROM administration INNER JOIN period ON administration.period = period.period WHERE period.period = ? AND year = ?");
            $check->bind_param('is', $period, $year);
            $check->execute();
            $check->store_result();

            if ($check->num_rows > 0) {
                $check->bind_result($name, $year);
                $check->fetch();
                $response = array('success' => false, 'message' => 'Data for ' . $name . ' of year ' . $year .' already existed!');
            } else {

                try {
                $stmt = $conn->prepare("INSERT INTO `administration`(`admin_id`, `tp_plantilla`, `tp_jo`, `nontp_plantilla`, `jo_casual`, `period`, `year`) VALUES (CONCAT('ADM-',UUID()),?,?,?,?,?,?)");
                $stmt->bind_param('ssssss', $tp_pl, $tp_jo, $ntp_pl, $cjo, $period, $year);
                $stmt->execute();

                 //get last id created from admin table
                $aid = $conn->lastInsertId();

                //insert data to reports table
                $reports = $conn->prepare("INSERT INTO `reports` (`reports_id`, `report_type`, `table_name`) VALUES (?, ?, ?)");
                $reports->bind_param('sss',CONCAT('RID-',UUID),$r_type, $table);
                $reports->execute();
                $conn->commit();

                } catch (mysqli_sql_exception $e) {
                    $response = array('success' => false, 'message' => 'An error occurred: ' . $e->getMessage());
                }
                $response = array('success' => true);
            }



        header('Content-Type: application/json');
        echo json_encode($response);
    }



?>