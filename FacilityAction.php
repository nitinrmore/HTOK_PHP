<?php
/**
 * FacilityAction.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   FacilityAction
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
          
         $query = "SELECT fr.id,concat(s.StatusDescription,' - ',
                   f.facilityname) title,
                   DATE_FORMAT(fr.eventdate,'%m/%d/%Y %h:%i %p') as start_event,
                   DATE_FORMAT(DATE_ADD(fr.eventdate, INTERVAL fr.hours HOUR)
                   ,'%m/%d/%Y %h:%i %p') as end_event,fr.hours,
                   u.username Devotee,fr.comments
                   FROM HTOK.FacilityReservation fr 
                   inner join Status s on s.id = fr.statusid
                   inner join Users u on u.id = fr.userid
                   inner join Facility f on f.id = fr.facilityid 
                   WHERE fr.statusid in (1,2) and fr.id = ".$_POST["id"];  
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
                         <td width="70%">
                         <div class="form-group">
                            <div class="input-group date" 
                                    id="starteventFR">
                                    <input type="text" name="starteventFR" 
                                        value = "'.$row["start_event"].'"
                                        class="form-control" />
                                    <span class="input-group-addon">
                                    <span 
                                    class="glyphicon glyphicon-calendar">
                                    </span>
                                    </span>
                                    <script>
                                    $(function () {
                                        $("#starteventFR").datetimepicker();
                                    });
                                    </script>
                            </div>
                         </div>  
                         </td>  
                    </tr>  
                    <tr>  
                         <td width="30%"><label>Hours</label></td>  
                         <td width="70%">
                         <input type="text" name="hours" 
                                        value = "'.$row["hours"].'"
                                        class="form-control" />
                         </td>  
                    </tr>  
                    <tr>  
                         <td width="30%"><label>Requested by</label></td>  
                         <td width="70%">'.$row["Devotee"].'</td>  
                    </tr>  
                    <tr>  
                         <td width="30%"><label>Comments</label></td>  
                         <td width="70%">'.$row["comments"].'</td>  
                    </tr>  
                    ';  
        }  
         $output .= "</table></div><input type='hidden' id='edit_id' name='edit_id' 
                   value='".$_POST["id"]."' />";  
         echo $output;  
    }  
} elseif ($action == 'confirm') {
    $query = "UPDATE FacilityReservation Set statusid = 2 
            Where id=".$_POST["edit_id"]; 
    $retcode = mysqli_query($connect, $query);
} elseif ($action == 'decline') {
    $query = "UPDATE FacilityReservation Set statusid = 7 
            Where id=".$_POST["edit_id"]; 
    $retcode = mysqli_query($connect, $query);
} else {
    $data = array();

    $query = "SELECT fr.id,concat(s.StatusDescription,' - ',f.Facilityname) title,
            fr.eventdate as start_event,DATE_ADD(fr.eventdate, 
            INTERVAL fr.hours HOUR) as end_event
            FROM HTOK.FacilityReservation fr
            inner join Status s on s.id = fr.statusid
            inner join Users u on u.id = fr.userid
            inner join Facility f on f.id = fr.facilityid
            where fr.statusid in (1,2)";

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