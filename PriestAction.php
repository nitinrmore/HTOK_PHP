<?php
/**
 * PriestAction.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   PriestAction
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
    if (isset($_POST["id"])) {  
        $output = '';  
         
        $query = "SELECT ps.id,concat(s.StatusDescription,' - ',
                  ps.servicedescription) title,ps.eventdate as start_event 
                  ,DATE_ADD(ps.eventdate, INTERVAL ps.hours HOUR) as end_event,
                  u.username Devotee,p.priestname ,ps.comments
                  FROM HTOK.PriestServices ps 
                  inner join Status s on s.id = ps.statusid
                  inner join Users u on u.id = ps.userid
                  inner join Priest p on p.id = ps.priestid 
                  WHERE ps.statusid in (1,6) and
                  ps.id = ".$_POST["id"];  
        $result = mysqli_query($connect, $query);  
        $output .= '  
             <div class="table-responsive">  
              <table class="table table-bordered">';  
       while ($row = mysqli_fetch_array($result)) {  
            $output .= '  
                   <tr>  
                        <td width="30%"><label>Service</label></td>  
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
                   <tr>  
                        <td width="30%"><label>Requested by</label></td>  
                        <td width="70%">'.$row["Devotee"].'</td>  
                   </tr>  
                   <tr>  
                        <td width="30%"><label>Comments</label></td>  
                        <td width="70%">'.$row["comments"].'</td>  
                   </tr>  
                   <tr>  
                        <td width="30%"><label>Priest</label></td>  
                        <td width="70%">'.$row["priestname"].'</td>  
                   </tr>  
                   
                   ';  
       }  
        $output .= "</table></div><input type='hidden' id='edit_id' 
                  name='edit_id' value='".$_POST["id"]."' />";  
        echo $output;  
   }  
} elseif ($action == 'confirm') {
    $query = "UPDATE PriestServices Set statusid = 6 
            Where id=".$_POST["edit_id"]; 
    $retcode = mysqli_query($connect, $query);
} elseif ($action == 'decline') {
    $query = "UPDATE PriestServices Set statusid = 7 
            Where id=".$_POST["edit_id"]; 
    $retcode = mysqli_query($connect, $query);
} else {
    $data = array();

    //$query = "SELECT * FROM priestcalendar pc ORDER BY id";
    $query = "SELECT ps.id,concat(s.StatusDescription,' - ',
            ps.servicedescription) title,ps.eventdate as start_event,
            DATE_ADD(ps.eventdate,INTERVAL ps.hours HOUR) as end_event
            FROM HTOK.PriestServices ps 
            inner join Status s on s.id = ps.statusid
            inner join Users u on u.id = ps.userid
            inner join Priest p on p.id = ps.priestid
            where ps.statusid in (1,6)";

    $result = mysqli_query($connect, $query);

    foreach ($result as $row) {
        $data[] = array (
        'id'   => $row["id"],
        'title'   => $row["title"],
        'start'   => $row["start_event"],
        'end'   => $row["end_event"]
        );
    }
    echo json_encode($data);
}

?>