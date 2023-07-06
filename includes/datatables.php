<?php
	include_once 'conn.php';
	if ($_GET['action'] == 'get_admdata'){
        $admstmt = $conn->prepare('SELECT * FROM administration INNER JOIN period ON administration.period = period.period INNER JOIN logs ON logs.act_id = administration.admin_id INNER JOIN users ON logs.user_id = users.user_id INNER JOIN reports ON reports.reports_id = logs.reports_id INNER JOIN campus ON campus.campus_id = users.campus_id GROUP BY administration.admin_id');
        $admstmt->execute();
        $admresult = $admstmt->get_result();

        // convert the data to a JSON-encoded response
        $admdata = array();
        while ($row = $admresult->fetch_assoc()) {
            $admdata[] = $row;
        }
    
        // Format the data as a JSON object
        $fadmdata = array("tableData" => $admdata);


        header('Content-Type: application/json');
        echo json_encode($fadmdata);  
    }

    if ($_GET['action'] == 'get_extdata'){
        $extstmt = $conn->prepare('SELECT * FROM extension INNER JOIN period ON extension.period = period.period INNER JOIN logs ON logs.act_id = extension.extension_id INNER JOIN users ON logs.user_id = users.user_id INNER JOIN reports ON reports.reports_id = logs.reports_id INNER JOIN campus ON campus.campus_id = users.campus_id GROUP BY extension.extension_id');
        $extstmt->execute();
        $extresult = $extstmt->get_result();

        // convert the data to a JSON-encoded response
        $extdata = array();
        while ($row = $extresult->fetch_assoc()) {
            $extdata[] = $row;
        }
    
        // Format the data as a JSON object
        $fextdata = array("tableData" => $extdata);


        header('Content-Type: application/json');
        echo json_encode($fextdata);  
    }
	
?>