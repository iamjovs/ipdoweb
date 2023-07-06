<?php
    $id = $_SESSION['user_id'];
    try{
        //users table inner join campus table query session ID
        $stmt = $conn->prepare('SELECT * FROM users INNER JOIN campus ON users.campus_id = campus.campus_id  WHERE user_id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $udata = $result->fetch_assoc();

        $cmp= $conn->prepare('SELECT * FROM campus');
        $cmp->execute();
        $cmpres = $cmp->get_result();
        $cmpfinal = $cmpres->fetch_assoc();
        /*
        //administration line graph query
        $astmt = $conn->prepare('SELECT * FROM administration INNER JOIN overall_report ON administration.admin_id = administration.admin_id');
        $astmt->execute();
        $aresult = $astmt->get_result();
        $tp_plantilla = array();
        $tp_jo = array();
        $ntp_plantilla = array();
        $jo_casual = array();
        $quarter = array();
        $year = array();

          while ($row = $aresult->fetch_assoc()) {
            $tp_plantilla[] = $row['tp_plantilla'];
            $tp_jo[] = $row['tp_jo'];
            $ntp_plantilla[] = $row['nontp_plantilla'];
            $jo_casual[] = $row['jo_casual'];
            $quarter[] = $row['quarter']."-".$row['year'];
          }

        //administration table
        $table = $conn->prepare('SELECT * FROM administration INNER JOIN overall_report ON administration.admin_id = overall_report.admin_id INNER JOIN users ON users.user_id = overall_report.user_id WHERE campus_id = 1');
        $table->execute();
        $tableres = $table->get_result();
        $borcol = $tableres->fetch_assoc();
        */
        //campus option
        $cam = $conn->prepare('SELECT * FROM campus');
        $cam->execute();
        $camres = $cam->get_result();
        /*
        //Year
        $year = $conn->prepare('SELECT DISTINCT year FROM overall_report ORDER BY year ASC;');
        $year->execute();
        $yearres = $year->get_result();
        */
        //users table inner join campus table query session ID
        $ustmt = $conn->prepare('SELECT * FROM users INNER JOIN campus ON users.campus_id = campus.campus_id  WHERE user_id = ?');
        $ustmt->bind_param('i', $id);
        $ustmt->execute();
        $uresult = $ustmt->get_result();
        $urow = $uresult->fetch_assoc();
        /*
        //administration_report datatable
        $adm = $conn->prepare('SELECT * FROM administration INNER JOIN users ON users.user_id = administration.user_id = 1');
        $table->execute();
        $tableres = $table->get_result();
        $borcol = $tableres->fetch_assoc();
            */
    }catch(e){
        console.log("An error occurred: " + e.message);
    }

?>