<?php  
/**
 * EventAction.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   EventAction
 * @package    HTOK
 * @author     HTOK <HTOK@HTOK.org>
 * @copyright  2011-2019 HTOK
 * @license    HTOK_License www.htky.org
 * @version    GIT: $id$
 * @link       www.htky.org
 * @see        www.htky.org
 * @since      NA
 * @deprecated NA
 */

require '_DBConnection.php';  

if (isset($_POST["act"])) {
    $action = $_POST["act"];
} else {
    $action = 'load';
}


if ($action == 'select') {
    /*
    if (isset($_POST["edit_id"])) {
        if ($_POST["act"] == "confirm") {
            $query = "UPDATE Events Set statusid = 2 Where id=".$_POST["edit_id"]; 
            $retcode = mysqli_query($connect, $query);
        }
        if ($_POST["act"] == "decline") {
            $query = "UPDATE Events Set statusid = 7 Where id=".$_POST["edit_id"]; 
            $retcode = mysqli_query($connect, $query);
        }
    }*/
    if (isset($_POST["id"])) {  
        $output = '';  
        
        $query = "SELECT * FROM Events 
            where id = ".$_POST["id"];  
        $result = mysqli_query($connect, $query);  
        $output .= '<div class="table-responsive">  
            <table class="table table-bordered">';  
        while ($row = mysqli_fetch_array($result)) {  
            $output .= '  
                    <tr>  
                        <td width="30%"><label>Request</label></td>  
                        <td width="70%">'.$row["title"].'</td>  
                    </tr>  
                    <tr>  
                        <td width="30%"><label>Start Time</label></td>  
                        <td width="70%">'.$row["start_event"].'</td>  
                    </tr>  
                    <tr>  
                        <td width="30%"><label>End Time</label></td>  
                        <td width="70%">'.$row["end_event"].'</td>  
                    </tr>  
                    ';  
        }  
        $output .= "</table></div><input type='hidden' id='edit_id' 
                name='edit_id' value='".$_POST["id"]."' />";  
        echo $output;  
    }  
} elseif ($action == 'insert') {
    if (isset($_POST["title"])) {
        $title = $_POST['title'];
        $start_event = $_POST['start'];
        $end_event = $_POST['end'];
        $query = "INSERT INTO Events 
                (title, start_event, end_event,createdon,createdby) 
                VALUES ('$title', '$start_event', '$end_event',now(),'System')";
        
        $statement = mysqli_query($connect, $query);
    }
} elseif ($action == 'update') {
    if (isset($_POST["id"])) {
        $title  = $_POST['title'];
        $start_event = $_POST['start'];
        $end_event = $_POST['end'];
        $id   = $_POST['id'];
    
        $query = "
            UPDATE Events 
            SET title='$title', start_event='$start_event', end_event='$end_event' 
            WHERE id=$id
            ";
    
        $statement = mysqli_query($connect, $query);
    }
} elseif ($action == 'delete') {
    if (isset($_POST["id"])) {
        $id = $_POST['id'];
        $query = "
            DELETE from Events WHERE id=$id
            ";
    
        $statement = mysqli_query($connect, $query);
    }
} else {
    $data = array();

    $query = "SELECT * FROM Events ORDER BY id";

    $result = mysqli_query($connect, $query);

    foreach ($result as $row) {
        $data[] = array(
        'id'   => $row["id"],
        'title'   => $row["title"],
        'start'   => $row["start_event"],
        'end'   => $row["end_event"]
        );
    }
    echo json_encode($data);
}
?>