<?php  
/**
 * Reservations.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Reservations
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
require '_Session.php';  

$successmessage = "";
$errormessage = "";

if (isset($_SESSION["username"])) {  
    
    $username = $_SESSION["username"];
    $userid = $_SESSION["userid"];
    
    $queryPT = "SELECT pt.Id,pt.Pujadescription FROM PujaType pt";  
    $resultPujaType = mysqli_query($connect, $queryPT);  
    
    $queryPr = "SELECT pr.Id,pr.Priestname FROM Priest pr";  
    $resultPriest = mysqli_query($connect, $queryPr);  
    
    $queryFa = "SELECT fa.Id,fa.Facilityname FROM Facility fa";  
    $resultFacility = mysqli_query($connect, $queryFa);  


    if (isset($_POST["requestservicePR"])) {  
        if (empty($_POST["pujatypePR"]) && empty($_POST["namesPR"])) {  
            $errormessage = "Fields marked with * are required";  
        } else {  
            $pujatype 
                = mysqli_real_escape_string($connect, $_POST["pujatypePR"]);  
            $gotra = mysqli_real_escape_string($connect, $_POST["gotraPR"]);  
            $nakshatra 
                = mysqli_real_escape_string($connect, $_POST["nakshatraPR"]);
            $specificdate 
                = mysqli_real_escape_string($connect, $_POST["datetimePR"]);
            
            $names = mysqli_real_escape_string($connect, $_POST["namesPR"]);  
            $comments = mysqli_real_escape_string($connect, $_POST["commentsPR"]);   
            $queryP1 = "INSERT INTO PujaRequest (userid, pujatypeid, gotra, 
                         nakshatra, specificdate, names, comments,statusid,
                         createdon,createdby) 
                         VALUES('$userid', '$pujatype','$gotra','$nakshatra',";
            $queryP2 = ",'$names','$comments',1,DATE_SUB(now(), INTERVAL 4 HOUR),
                         '$username')";
            $query = !empty($specificdate) ? $queryP1."'".$specificdate."'"
                    .$queryP2 : $queryP1."NULL".$queryP2;
            
            if (mysqli_query($connect, $query)) {  
                $successmessage = "Puja Request Successfully Submitted"; 
            } else {
                $errormessage = "Puja Request Failed";  
            }
        }  
    }  

    if (isset($_POST["requestservicePS"])) {  
        if (empty($_POST["priestPS"]) && empty($_POST["datetimePS"]) 
            && empty($_POST["hoursPS"])
        ) {  
            $errormessage = "Fields marked with * are required";  
        } else {  
              
            $priest = mysqli_real_escape_string($connect, $_POST["priestPS"]);  
            $service = mysqli_real_escape_string($connect, $_POST["servicePS"]); 
            $datetime = mysqli_real_escape_string($connect, $_POST["datetimePS"]);  
            $newDate = date("Y-m-d H:0:0", strtotime($datetime));
            $hours = mysqli_real_escape_string($connect, $_POST["hoursPS"]);
            $comments = mysqli_real_escape_string($connect, $_POST["commentsPS"]);   
            $query = "INSERT INTO PriestServices (userid, priestid, servicedescription, eventdate, 
                    hours, comments,statusid,createdon,createdby) 
                    VALUES('$userid', '$priest','$service','$newDate','$hours','$comments',1,
                    DATE_SUB(now(), INTERVAL 4 HOUR),'$username')";
              
            //echo $query;  
            if (mysqli_query($connect, $query)) {  
                $successmessage = "Priest Services Request Successfully Submitted"; 
            } else {
                $errormessage = "Priest Services Request Failed";  
            }
        }  
    }  

    if (isset($_POST["requestserviceFR"])) {  
        if (empty($_POST["facilityFR"]) && empty($_POST["datetimeFR"]) 
            && empty($_POST["hoursFR"])
        ) {  
            $errormessage = "Fields marked with * are required";  
        } else {  
              
            $facility = mysqli_real_escape_string($connect, $_POST["facilityFR"]);  
            $datetime = mysqli_real_escape_string($connect, $_POST["datetimeFR"]);  
            $newDate = date("Y-m-d H:0:0", strtotime($datetime));
            $hours = mysqli_real_escape_string($connect, $_POST["hoursFR"]);
            $comments = mysqli_real_escape_string($connect, $_POST["commentsFR"]);   
            $query = "INSERT INTO FacilityReservation (userid, facilityid, 
                    eventdate, hours, comments,statusid,createdon,createdby) 
                    VALUES('$userid', '$facility','$newDate','$hours','$comments',
                    1,DATE_SUB(now(), INTERVAL 4 HOUR),'$username')";
              
            //echo $query;  
            if (mysqli_query($connect, $query)) {  
                $successmessage = "Priest Services Request Successfully Submitted"; 
            } else {
                $errormessage = "Priest Services Request Failed";  
            }
        }  
    }  

    $query = "SELECT pt.pujadescription,pr.createdon Requestedon,pr.gotra
          ,pr.nakshatra,pr.names,s.StatusDescription,pr.completedon,pr.completedby 
          FROM PujaRequest pr 
          inner join  PujaType pt on pr.pujatypeid = pt.id 
          inner join Status s on s.id = pr.statusid 
          WHERE pr.userid = $userid";  
          $resultPujaRequest = mysqli_query($connect, $query);  
    
    $query = "select p.Priestname,ps.createdon Requestedon,ps.Eventdate,ps.Hours
          ,s.StatusDescription
          from PriestServices ps 
          inner join Priest p on p.id = ps.priestid
          inner join Status s on s.id = ps.statusid
          WHERE ps.userid = $userid";  
    $resultPS = mysqli_query($connect, $query);  

    $query = "select f.Facilityname,fr.createdon Requestedon,fr.Eventdate,
          fr.Hours,s.StatusDescription
          from FacilityReservation fr 
          inner join Facility f on f.id = fr.facilityid
          inner join Status s on s.id = fr.statusid
          WHERE fr.userid = $userid";  
    $resultFR = mysqli_query($connect, $query);  
}  

$title = 'Reservations'; 
$currentPage = 'reservations'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>
<?php
if (!isset($_SESSION["username"])) {  
    ?>
  <div class="container">
    <div ckass="row">
      <div>
        <h3 class="pageheading text-center">RESERVATIONS</h3>
        <br>
        <h4>Service and Reservation Requests</h4>
        <br>
        <p>
            Please <a href="Login.php?action=login" class="links">
                 Login / Register</a> to make Priest Services and Temple Hall 
                 reservation requests.  
        </p>
        <br>
        <p>
            If your program is Temple sponsored, you must get it cleared for fee 
            exemption by the Chair of Buildings and Grounds Committee before 
            sending it to Temple Administrator. Otherwise, you are liable for 
            the assessments and since reservation is not effective unless fully 
            paid in advance IN MOST CASES YOUR RESERVATION MAY NOT BE HONORED. 
        </p>
        <br>
        <p>
            Help in keeping YOUR TEMPLE CLEAN will be appreciated very much. At 
            the conclusion of the program leave the place clean and orderly. Turn 
            off the lights as well as fans. Particular attention shall be given 
            to the bathroom and kitchen mechanicals. Turn the exhaust fans off 
            before leaving the premises.
        </p>
        <br>
        <img src="img/namasteico.png" id="ico">
      </div>
    </div>
  </div>
    <?php
} else {  
    ?>
<div class="container">
     <div ckass="row">
          <div>
               <h3 class="pageheading text-center">RESERVATIONS</h3>
          </div>  
          <?php if (!empty($errormessage)) {
                echo "<br /><div class='errormessage'>$errormessage</div>";
          } elseif (!empty($successmessage)) {
               echo "<br /><div class='successmessage'>$successmessage</div>";
          }
            ?>
          
          <div>
          <br>
          <div>
               <H4><a href="#hidden" data-toggle="collapse"  class="links">
                    Puja Request Form. Click here <img src="img/requestform.png"  
                    id="smlogo"></a></H4>  
          </div>
          <div id="hidden" class="panel-group collapse">
          
               <div class="panel panel-primary">
                    <div class="panel-body"><h4> Puja Request Form</h4></div>
               </div>
               <div class="panel panel-default">
               <form action="#" method="post">
                    <div class="panel-body">
                    <div class="row">
                         <div class="col-sm-3">
                              <label>Puja Type *</label>  
                              <select name="pujatypePR" class="form-control" 
                                   required > 
                              <option value=''>Please select puja type</option> 
                              <?php 
                                while ($row 
                                    = mysqli_fetch_assoc($resultPujaType)
                                   ) {
                                        $pujatypedesc = $row['Pujadescription'];
                                        $pujatypeid = $row['Id'];
                                        echo "<option value='$pujatypeid'>
                                             $pujatypedesc</option>";
                                };
                                ?>
                              </select>
                         </div>
                         <div class="col-sm-3">
                              <label>Gotra</label>  
                              <input type="text" name="gotraPR" 
                                   class="form-control"  />  
                         </div>
                         <div class="col-sm-3">
                              <label>Nakshatra</label>  
                              <input type="text" name="nakshatraPR" 
                                   class="form-control"  />  
                         </div>
                         <div class="col-sm-3">
                              <div class="form-group">
                                   <label>Specific Date?</label>  
                                   <div class='input-group date' id='datetimePR'>
                                        <input type='text' name='datetimePR' 
                                             class="form-control" />
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"> 
                                        </span>
                                        </span>
                                   </div>
                              </div>  
                         </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-6">
                              <label>Names *</label>  
                              <textarea name="namesPR" rows="3"  
                                   class="form-control" 
                                   required></textarea>
                         </div>
                         <div class="col-sm-6">
                              <label>Comments</label>  
                              <textarea name="commentsPR" rows="3"  
                                   class="form-control" ></textarea>  
                         </div>
                         
                    </div>
                    <div>
                         <br>
                         <input type="submit" name="requestservicePR" 
                              value="Request" class="btn btn-info" />
                    </div>
                    </div>
               </form>
               </div>
          </div>
          
          <div>
               <h4><a href="#hiddenPS" data-toggle="collapse"  class="links">
                         Priest Services Form. Click here 
                         <img src="img/requestform.png"  id="smlogo"></a></h4>
          </div>
               <div id="hiddenPS" class="panel-group collapse">
                    <div class="panel panel-primary">
                         <div class="panel-body"><h4> 
                              Priest Services Request Form</h4></div>
                    </div>
                    <div class="panel panel-default">
                    <form action="#" method="post">
                         <div class="panel-body">
                         <div class="row">
                              <div class="col-sm-3">
                                   <label>Priest *</label>  
                                   <select name="priestPS" class="form-control" 
                                        required >  
                                   <option value=''>Please select priest</option>
                                   <?php 
                                    while ($row 
                                        = mysqli_fetch_assoc($resultPriest)
                                    ) {
                                         $priestname = $row['Priestname'];
                                         $priestid = $row['Id'];
                                         echo "<option value='$priestid'>
                                             $priestname</option>";
                                    };
                                    ?>
                                   </select>
                              </div>
                              <div class="col-sm-3">
                                   <label>Service *</label>  
                                   <input type="text" name="servicePS" 
                                        class="form-control" required />  
                              </div>
                              <div class="col-sm-3">
                                   <div class="form-group">
                                        <label>Date / Time *</label> 
                                        <div class='input-group date' 
                                             id='datetimePS'>
                                             <input type='text' name='datetimePS' 
                                                  class="form-control" />
                                             <span class="input-group-addon">
                                             <span 
                                             class="glyphicon glyphicon-calendar">
                                             </span>
                                             </span>
                                        </div>
                                   </div>  
                              </div>
                              <div class="col-sm-3">
                                   <label>Hours *</label>  
                                   <input type="text" name="hoursPS" 
                                        class="form-control" required />  
                              </div>
                             
                              
                         </div>
                         <div class="row">
                              <div class="col-sm-12">
                                   <label>Comments *</label>  
                                   <textarea name="commentsPS" rows="2"  
                                        class="form-control" ></textarea>
                              </div>
                         </div>
                         <div>
                              <br>
                              <input type="submit" name="requestservicePS" 
                                   value="Request" class="btn btn-info" required />  
                         </div>
                         </div>
                    </form>
                    </div>
               </div>
          <div>
               <h4><a href="#hiddenFR" data-toggle="collapse"  class="links">
                         Facility Reservation Form. Click here 
                              <img src="img/requestform.png"  id="smlogo"></a></H4>
          </div>
          
               <div id="hiddenFR" class="panel-group collapse">
                    <div class="panel panel-primary">
                         <div class="panel-body"><h4> 
                              Facility Reservation Form</h4></div>
                    </div>
                    <div class="panel panel-default">
                    <form action="#" method="post">
                         <div class="panel-body">
                              <div class="row">
                                   <div class="col-sm-4">
                                        <label>Facility *</label>  
                                        <select name="facilityFR" 
                                             class="form-control" required >  
                                             <option value=''>
                                                  Please select facility</option>
                                        <?php 
                                        while ($row 
                                            = mysqli_fetch_assoc($resultFacility)
                                        ) {
                                             $facilityname = $row['Facilityname'];
                                             $facilityid = $row['Id'];
                                             echo "<option value='$facilityid'>
                                                  $facilityname</option>";
                                        };
                                        ?>
                                        </select>
                                   </div>
                                   <div class="col-sm-4">
                                        <div class="form-group">
                                             <label>Date / Time *</label> 
                                             <div class='input-group date' 
                                                  id='datetimeFR'>
                                                  <input type='text' 
                                                       name='datetimeFR' 
                                                       class="form-control" />
                                                  <span class="input-group-addon">
                                                  <span 
                                             class="glyphicon glyphicon-calendar">
                                                  </span>
                                                  </span>
                                             </div>
                                        </div>         
                                        
                                   </div>
                                   <div class="col-sm-4">
                                        <label>Hours *</label>  
                                        <input type="text" name="hoursFR" 
                                             class="form-control" required />  
                                   </div>
                                   
                              </div>
                              <div class="row">
                                   <div class="col-sm-12">
                                        <label>Comments *</label>  
                                        <textarea name="commentsFR" rows="2"  
                                             class="form-control" required >
                                        </textarea>
                                   </div>
                              </div>
                              <br>
                              <div class="row">
                                   <div class="col-sm-12 warningmessage">
                                        Please read below instructions **
                                   </div>
                              </div>
                              
                              <div>
                                   <br>
                                   <input type="submit" name="requestserviceFR" 
                                   value="Request" class="btn btn-info" />  
                              </div>
                              <div class="padClass">
                              <p>
                                   If your program is Temple sponsored, you must 
                                   get it cleared for fee exemption by the Chair 
                                   of Buildings and Grounds Committee before 
                                   sending it to Temple Administrator. Otherwise, 
                                   you are liable for the assessments and since 
                                   reservation is not effective unless fully 
                                   paid in advance IN MOST CASES YOUR RESERVATION 
                                   MAY NOT BE HONORED. 
                              </p>
                              <br>
                              <p>
                                   Help in keeping YOUR TEMPLE CLEAN will be 
                                   appreciated very much. At the conclusion of the 
                                   program leave the place clean and orderly. Turn 
                                   off the lights as well as fans. Particular 
                                   attention shall be given to the bathroom and 
                                   kitchen mechanicals. Turn the exhaust fans off 
                                   before leaving the premises.
                              </p>
                              <br>
                              <img src="img/namasteico.png" id="ico">
                         </div>
                    </form>
                    </div>
               </div>
          </div>

          <div>      
               <br>
               <h4> Puja Requests</h4>         
               <table class="table">
               <tr><td>Puja Type</td><td>Requested On</td><td>Status</td>
               <td>Completed On</td><td>Completed By</td></tr>
               <?php 
                while ($rowPR = mysqli_fetch_assoc($resultPujaRequest)) {
                     $Pujadescription = $rowPR['pujadescription'];
                     $RequestedOn = $rowPR['Requestedon'];
                     $Status = $rowPR['StatusDescription'];
                     $CompletedOn = $rowPR['completedon'];
                     $Completedby = $rowPR['completedby'];
                     echo "<tr><td>$Pujadescription</td><td>$RequestedOn</td>
                     <td>$Status</td><td>$CompletedOn</td><td>$Completedby</td>
                     </tr>";
                };
                ?>
               </table>
          </div>

          <div>      
               <br>
               <h4> Priest Services Requests</h4>         
               <table class="table">
               <tr><td>Priest</td><td>Date</td><td>Hours</td>
               <td>Requested On</td><td>Status</td></tr>
               <?php 
                while ($rowPS = mysqli_fetch_assoc($resultPS)) {
                     $priestname = $rowPS['Priestname'];
                     $Eventdate = $rowPS['Eventdate'];
                     $Hours = $rowPS['Hours'];
                     $Requestedon = $rowPS['Requestedon'];
                     $Status = $rowPS['StatusDescription'];
                     echo "<tr><td>$priestname</td><td>$Eventdate</td>
                     <td>$Hours</td><td>$Requestedon</td><td>$Status</td></tr>";
                };
                ?>
               </table>
          </div>

          <div>      
               <br>
               <h4> Facility Reservations Requests</h4>         
               <table class="table">
               <tr><td>Facility</td><td>Date</td><td>Hours</td>
               <td>Requested On</td><td>Status</td></tr>
               <?php 
                while ($rowFR = mysqli_fetch_assoc($resultFR)) {
                     $facilityname = $rowFR['Facilityname'];
                     $Eventdate = $rowFR['Eventdate'];
                     $Hours = $rowFR['Hours'];
                     $Requestedon = $rowFR['Requestedon'];
                     $Status = $rowFR['StatusDescription'];
                     echo "<tr><td>$facilityname</td><td>$Eventdate</td>
                     <td>$Hours</td><td>$Requestedon</td><td>$Status</td></tr>";
                };
                ?>
               </table>
          </div>

          
     </div>
     </div>

     <script>
          $(function () {
               $('#datetimePR').datetimepicker();
          });
          $(function () {
               $('#datetimePS').datetimepicker();
          });
          $(function () {
               $('#datetimeFR').datetimepicker();
          });
     </script> 
    
    <?php
} 
?>

    <?php require 'Footer.php'; ?>

</body>
</html>