<?php

include_once 'conn.php';


if(isset($_POST['email']) && isset($_POST['pass']) ) {

        // Get input values and sanitize them
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['pass']);
    try{
        // Prepare SQL statement with placeholders
        $stmt = $conn->prepare('SELECT user_id, email, password FROM users WHERE email = ?');

        // Bind input parameters to placeholders
        $stmt->bind_param('s', $email);

        // Execute statement
        $stmt->execute();

        // Bind result variables to output columns
        $stmt->bind_result($id, $db_email, $db_password);
    }catch(e){
        console.log("An error occurred: " + e.message);
    }
        // Fetch result and check if login is valid
        if ($stmt->fetch() && password_verify($password, $db_password)) {
            // Login is valid, set session variable and redirect to dashboard
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['password'] = $db_password;
            $response = array('success' => true); 

        } else {
            // Login is invalid, show error message
            $response = array('status' => 'error', 'message' => 'Invalid username or password');
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();


        // Send response to jQuery
        header('Content-Type: json');
        echo json_encode($response);
    
}

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lname'])&& isset($_POST['fname']) && isset($_POST['suf']) && isset($_POST['campus']) && isset($_POST['account']) && isset($_POST['confirm_password'])) {
            // Get form data
           
            $email = $conn->real_escape_string($_POST['email']);
            $lname = $conn->real_escape_string($_POST['lname']);
            $fname = $conn->real_escape_string($_POST['fname']);
            $suf = $conn->real_escape_string($_POST['suf']);
            $campus = $conn->real_escape_string($_POST['campus']);
            $acc = $conn->real_escape_string($_POST['account']);
            $password =$conn->real_escape_string($_POST['password']);
            $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

                
                $dupem = $conn->prepare("SELECT * FROM users WHERE email = ?");
                $dupem->bind_param("s", $email);
                $dupem->execute();
                $result = $dupem->get_result();
         

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

if(isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])){
        session_start();
        $id = $_SESSION['user_id'];
        $pass = $_SESSION['password'];
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if (!password_verify($currentPassword,$pass)) {
          echo 'Current password Incorrect!';
        } else if ($newPassword != $confirmPassword) {
          echo 'New password and confirm password do not match';
        } else {
          
                $pass = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE users SET password = ? where user_id = ?");
                $stmt->bind_param('si', $pass, $id);
                $stmt->execute();
          
                echo 'success';   
            
        }
}
if(isset($_POST['resnewPassword']) && isset($_POST['resconfirmPassword'])){
        session_start();
        $id = $_SESSION['user_id'];
        $newPassword = $_POST['resnewPassword'];
        $confirmPassword = $_POST['resconfirmPassword'];

        if ($newPassword != $confirmPassword) {
          echo 'New password and confirm password do not match';
        } else {
          
              $pass = password_hash($newPassword, PASSWORD_DEFAULT);
              $stmt = $conn->prepare("UPDATE users SET password = ? where user_id = ?");
              $stmt->bind_param('si', $pass, $id);
              $stmt->execute();
          

          echo 'success';   
        }
}
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['suf'])){
        session_start();
        $id = $_SESSION['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $suf = $_POST['suf'];

  
            $stmt = $conn->prepare("UPDATE users SET first_name = ?,last_name = ?, suffix = ? where user_id = ?");
            $stmt->bind_param('sssi', $fname, $lname,$suf,$id);
            $stmt->execute();
     
        echo 'success';
}

//START add and update administrator
if (isset($_POST['tp_pl']) && isset($_POST['tp_jo']) && isset($_POST['ntp_pl']) && isset($_POST['cjo']) && isset($_POST['admyear']) && isset($_POST['admquarter'])) {
          session_start();
            $uid = $_SESSION['user_id'];
            $r_type = "Insert Data";
            $table = "Administration";
            $tp_pl = $_POST['tp_pl'];
            $tp_jo = $_POST['tp_jo'];
            $ntp_pl = $_POST['ntp_pl'];
            $cjo = $_POST['cjo'];
            $year = $_POST['admyear'];
            $period = $_POST['admquarter'];
        

  
               
            
                $check = $conn->prepare("SELECT name,year FROM administration INNER JOIN period ON administration.period = period.period WHERE period.period = ? AND year = ?");
                $check->bind_param('is', $period, $year);
                $check->execute();
                $check->store_result();

                if ($check->num_rows > 0) {
                    $check->bind_result($name, $year);
                    $check->fetch();
                    $response = array('success' => false, 'message' => 'Data for ' . $name . ' of year ' . $year .' already existed!', 'title' => 'Data Insertion Failed');
                } else{
                        

                        mysqli_begin_transaction($conn);
                    try {
                        
                        // insert into administration table
                        $adm = $conn->prepare("INSERT INTO `administration`(`tp_plantilla`, `tp_jo`, `nontp_plantilla`, `jo_casual`, `period`, `year`) VALUES (?,?,?,?,?,?)");
                        $adm->bind_param('iiiiss', $tp_pl, $tp_jo, $ntp_pl, $cjo, $period, $year);
                        $adm->execute();
                        
                        // get last administration table inserted
                        $admuid = $conn->insert_id;

                        // insert into reports table
                        $reports = $conn->prepare("INSERT INTO `reports`( `report_type`, `table_name`) VALUES (?,?)");
                        $reports->bind_param('ss',$r_type, $table);
                        $reports->execute();
                                         
                        //get last reports table inserted
                        $ruid = $conn->insert_id;

                        //commit the transaction
                        $conn->commit();
              
                        // insert into reports table
                        $logs = $conn->prepare("INSERT INTO `logs`( `user_id`,`reports_id`, `date_time`, `act_id`) VALUES (?,?,NOW(),?)");
                        $logs->bind_param('iii',$uid, $ruid, $admuid);
                        $logs->execute();
                   

                        //close all executed statements
                        mysqli_stmt_close($adm);
                        mysqli_stmt_close($reports);
                        mysqli_stmt_close($logs);

                        // Close the connection
                        mysqli_close($conn);
                        $response = array('success' => true, 'title' => 'Data Insertion Success');
                
                    } catch (mysqli_sql_exception $e) {
                        // Rollback the transaction if an error occurs
                        mysqli_rollback($conn);
                        throw $e;
                    }
                  
                }

                

    
         


        header('Content-Type: application/json');
        echo json_encode($response);
}


if(isset($_POST['uadminId'])){
        $uadminId = $_POST['uadminId'];
        $upadmstmt = $conn->prepare('SELECT * FROM administration INNER JOIN period ON administration.period = period.period WHERE administration.admin_id = ?');
        $upadmstmt->bind_param('i', $uadminId);
        $upadmstmt->execute();
        $upadmresult = $upadmstmt->get_result();
        $response = array();
        while ($row = $upadmresult->fetch_assoc()) {
                $response[] = $row;
        }
         header('Content-Type: application/json');
        echo json_encode($response);
}


if (isset($_POST['buttonValue']) && isset($_POST['uptp_pl']) && isset($_POST['uptp_jo']) && isset($_POST['upntp_pl']) && isset($_POST['upcjo']) && isset($_POST['upadmyear']) && isset($_POST['upadmquarter'])) {
          session_start();
            $upuid = $_SESSION['user_id'];
            $r_type = "Update Data";
            $table = "Administration";
            $tp_pl = $_POST['uptp_pl'];
            $tp_jo = $_POST['uptp_jo'];
            $ntp_pl = $_POST['upntp_pl'];
            $cjo = $_POST['upcjo'];
            $year = $_POST['upadmyear'];
            $period = $_POST['upadmquarter'];
            $adm_id = $_POST['buttonValue'];
             
            mysqli_begin_transaction($conn);
            try {
                
                // update administration table
                $upadm = $conn->prepare("UPDATE administration SET tp_plantilla = ?, tp_jo = ?, nontp_plantilla = ?, jo_casual = ? WHERE admin_id = ?");
                $upadm->bind_param('iiiii', $tp_pl, $tp_jo, $ntp_pl, $cjo, $adm_id);
                $upadm->execute();
                
                $upreports = $conn->prepare("INSERT INTO `reports`( `report_type`, `table_name`) VALUES (?,?)");
                $upreports->bind_param('ss',$r_type, $table);
                $upreports->execute();

                //get last reports table inserted
                $upruid = $conn->insert_id;

                //commit the transaction
                $conn->commit();

                // insert into reports table
                $uplogs = $conn->prepare("INSERT INTO `logs`( `user_id`,`reports_id`, `date_time`, `act_id`) VALUES (?,?,NOW(),?)");
                $uplogs->bind_param('iii',$upuid, $upruid, $adm_id);
                $uplogs->execute();


                //close all executed statements
                mysqli_stmt_close($upadm);
                mysqli_stmt_close($upreports);
                mysqli_stmt_close($uplogs);

                // Close the connection
                mysqli_close($conn);
                $response = array('success' => true, 'title' => 'Data Insertion Success');
            
        
            } catch (mysqli_sql_exception $e) {
                // Rollback the transaction if an error occurs
                mysqli_rollback($conn);
                throw $e;
            }
                  
                

        header('Content-Type: application/json');
        echo json_encode($response);
    }

//END add and update administrator

//START add and update extension
//ext insert
if (isset($_POST['ext_proj']) && isset($_POST['ext_client']) && isset($_POST['ext_faculty']) && isset($_POST['act_gad']) && isset($_POST['extyear']) && isset($_POST['extquarter'])) {
          session_start();
            $uid = $_SESSION['user_id'];
            $r_type = "Insert Data";
            $table = "Extension";
            $ext_proj = $_POST['ext_proj'];
            $ext_client = $_POST['ext_client'];
            $ext_faculty = $_POST['ext_faculty'];
            $act_gad = $_POST['act_gad'];
            $year = $_POST['extyear'];
            $period = $_POST['extquarter'];
      
            
                $check = $conn->prepare("SELECT name,year FROM extension INNER JOIN period ON extension.period = period.period WHERE period.period = ? AND year = ?");
                $check->bind_param('is', $period, $year);
                $check->execute();
                $check->store_result();

                if ($check->num_rows > 0) {
                    $check->bind_result($name, $year);
                    $check->fetch();
                    $response = array('success' => false, 'message' => 'Data for ' . $name . ' of year ' . $year .' already existed!', 'title' => 'Data Insertion Failed');
                } else{
                        

                        mysqli_begin_transaction($conn);
                    try {
                        
                        // insert into administration table
                        $ext = $conn->prepare("INSERT INTO `extension`(`ext_proj`, `ext_client`, `ext_faculty`, `act_gad`, `period`, `year`) VALUES (?,?,?,?,?,?)");
                        $ext->bind_param('iiiiss', $ext_proj, $ext_client, $ext_faculty, $act_gad, $period, $year);
                        $ext->execute();
                        
                        // get last administration table inserted
                        $extuid = $conn->insert_id;

                        // insert into reports table
                        $reports = $conn->prepare("INSERT INTO `reports`( `report_type`, `table_name`) VALUES (?,?)");
                        $reports->bind_param('ss',$r_type, $table);
                        $reports->execute();
                                         
                        //get last reports table inserted
                        $ruid = $conn->insert_id;

                        //commit the transaction
                        $conn->commit();
              
                        // insert into reports table
                        $logs = $conn->prepare("INSERT INTO `logs`( `user_id`,`reports_id`, `date_time`, `act_id`) VALUES (?,?,NOW(),?)");
                        $logs->bind_param('iii',$uid, $ruid, $extuid);
                        $logs->execute();
                   

                        //close all executed statements
                        mysqli_stmt_close($ext);
                        mysqli_stmt_close($reports);
                        mysqli_stmt_close($logs);

                        // Close the connection
                        mysqli_close($conn);
                        $response = array('success' => true, 'title' => 'Data Insertion Success');
                
                    } catch (mysqli_sql_exception $e) {
                        // Rollback the transaction if an error occurs
                        mysqli_rollback($conn);
                        throw $e;
                    }
                  
                }

                

    
         


        header('Content-Type: application/json');
        echo json_encode($response);
}


if(isset($_POST['uextId'])){
        $uextId = $_POST['uextId'];
        $upextstmt = $conn->prepare('SELECT * FROM extension INNER JOIN period ON extension.period = period.period WHERE extension.extension_id = ?');
        $upextstmt->bind_param('i', $uextId);
        $upextstmt->execute();
        $upextresult = $upextstmt->get_result();
        $response = array();
        while ($row = $upextresult->fetch_assoc()) {
                $response[] = $row;
        }
         header('Content-Type: application/json');
        echo json_encode($response);
}

//ext update
if (isset($_POST['buttonValue']) && isset($_POST['upext_proj']) && isset($_POST['upext_client']) && isset($_POST['upext_faculty']) && isset($_POST['upact_gad']) && isset($_POST['upextyear']) && isset($_POST['upextquarter'])) {
          session_start();
            $uid = $_SESSION['user_id'];
            $r_type = "Update Data";
            $table = "Extension";
            $upext_proj = $_POST['upext_proj'];
            $upext_client = $_POST['upext_client'];
            $upext_faculty = $_POST['upext_faculty'];
            $upact_gad = $_POST['upact_gad'];
            $year = $_POST['upextyear'];
            $period = $_POST['upextquarter'];
            $ext_id = $_POST['buttonValue'];
             
            mysqli_begin_transaction($conn);
            try {
                
                // update administration table
                $upext = $conn->prepare("UPDATE extension SET ext_proj = ?, ext_client = ?, ext_faculty = ?, act_gad = ? WHERE extension_id = ?");
                $upext->bind_param('iiiii', $upext_proj, $upext_client, $upext_faculty, $upact_gad, $ext_id);
                $upext->execute();
                
                $upreports = $conn->prepare("INSERT INTO `reports`( `report_type`, `table_name`) VALUES (?,?)");
                $upreports->bind_param('ss',$r_type, $table);
                $upreports->execute();

                //get last reports table inserted
                $upruid = $conn->insert_id;

                //commit the transaction
                $conn->commit();

                // insert into reports table
                $uplogs = $conn->prepare("INSERT INTO `logs`( `user_id`,`reports_id`, `date_time`, `act_id`) VALUES (?,?,NOW(),?)");
                $uplogs->bind_param('iii',$upuid, $upruid, $ext_id);
                $uplogs->execute();


                //close all executed statements
                mysqli_stmt_close($upext);
                mysqli_stmt_close($upreports);
                mysqli_stmt_close($uplogs);

                // Close the connection
                mysqli_close($conn);
                $response = array('success' => true, 'title' => 'Data Insertion Success');
            
        
            } catch (mysqli_sql_exception $e) {
                // Rollback the transaction if an error occurs
                mysqli_rollback($conn);
                throw $e;
            }
                  
                

        header('Content-Type: application/json');
        echo json_encode($response);
    }

?>