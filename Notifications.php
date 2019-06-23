<?php 
/**
 * Notifications.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Notifications
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
    if ($_SESSION['userprofileid'] == 2) {
        /*
        $query = "SELECT pt.pujadescription,pr.createdon Requestedon,
               pr.gotra,pr.nakshatra
               ,pr.names,s.StatusDescription,pr.completedon,pr.completedby 
               FROM PujaRequest pr 
               inner join  PujaType pt on pr.pujatypeid = pt.id 
               inner join Status s on s.id = pr.statusid 
               WHERE pr.statusid = 1";  
               $resultPujaRequest = mysqli_query($connect, $query);  
        */

        $query = "select p.Priestname,ps.createdon Requestedon,
               ps.Eventdate,ps.Hours,s.StatusDescription
               from PriestServices ps 
               inner join Priest p on p.id = ps.priestid
               inner join Status s on s.id = ps.statusid
               WHERE ps.statusid = 1";  
        $resultPS = mysqli_query($connect, $query);  
    } elseif ($_SESSION['userprofileid'] == 3) {
        $query = "select f.Facilityname,fr.createdon Requestedon,
               fr.Eventdate,fr.Hours,s.StatusDescription
               from FacilityReservation fr 
               inner join Facility f on f.id = fr.facilityid
               inner join Status s on s.id = fr.statusid
               WHERE fr    .statusid = 1";  
        $resultFR = mysqli_query($connect, $query);  
    } elseif ($_SESSION['userprofileid'] == 4) {
        $query = "select m.id,m.comments,m.name,m.email
        from Messages m
        inner join Status s on s.id = m.statusid
        WHERE m.statusid = 1";  
        $resultM = mysqli_query($connect, $query);  
    }
}  
 
$title = 'Notifications'; 
$currentPage = 'notifications'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>
<div class="container">
     <div ckass="row">
          <div>
               <h3 class="pageheading text-center">NOTIFICATIONS</h3>
          </div>  
            <?php if (!empty($errormessage)) {
                echo "<br /><div class='errormessage'>$errormessage</div>";
            } elseif (!empty($successmessage)) {
                 echo "<br /><div class='successmessage'>$successmessage</div>";
            }
          
            if ($_SESSION['userprofileid'] == 2) {
                ?>
          <!--div>      
               <br>
               <h4> Puja Requests</h4>         
               <table class="table">
               <tr><td>Puja Type</td><td>Requested On</td><td>Status</td>
                    <td>Completed On</td><td>Completed By</td></tr>
                 <?php 
                    /*
                    while($rowPR = mysqli_fetch_assoc($resultPujaRequest)){
                         $Pujadescription = $rowPR['pujadescription'];
                         $RequestedOn = $rowPR['Requestedon'];
                         $Status = $rowPR['StatusDescription'];
                         $CompletedOn = $rowPR['completedon'];
                         $Completedby = $rowPR['completedby'];
                         echo "<tr><td>$Pujadescription</td><td>$RequestedOn</td>
                         <td>$Status</td><td>$CompletedOn</td>
                         <td>$Completedby</td></tr>";
                    };
                    */
                    ?>
               </table>
          </div-->

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
                              <td>$Hours</td><td>$Requestedon</td>
                              <td>$Status</td></tr>";
                    };
                    ?>
               </table>
          </div>
                <?php
            } elseif ($_SESSION['userprofileid'] == 3) {
                ?>

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
                              <td>$Hours</td><td>$Requestedon</td>
                              <td>$Status</td></tr>";
                    };
                    ?>
               </table>
          </div>
                <?php
            } elseif ($_SESSION['userprofileid'] == 4) {
                ?>
  
            <div>      
                 <br>
                 <h4> Messages</h4>         
                 <table class="table">
                 <tr><td>Comments</td><td>Name</td><td>Email</td><td>Read</td></tr>
                 <?php 
                    while ($rowM = mysqli_fetch_assoc($resultM)) {
                         $comments = $rowM['comments'];
                         $name = $rowM['name'];
                         $email = $rowM['email'];
                           
                         echo "<tr><td>$comments</td><td>$name</td><td>$email</td>
                           <td><img src='img/email.png'  id='smlogo' 
                           name='select_btn' data-id3='".$rowM["id"]."' 
                           class='btn_select text-center'></td>
                           </tr>";
                    };
                    ?>
                 </table>
            </div>
                <?php
            }
            ?>
          
     </div>
     </div>
     <div id="message_model" class="modal fade">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <button type="button" class="close" 
                                   data-dismiss="modal">&times;</button> 
                              <h4 class="modal-title">Read Message</h4>
                         </div>
                         <form method="post" id="frm_message">
                         <div id="adminmsg"></div>
                         <div class="modal-body" id="message_detail">
                          </div>
                         <div class="modal-footer">
                              <button type="button" id="btn_message" 
                                   name="btn_message" 
                                   class="btn btn-primary btn_message">
                                   Read</button>
                              <button type="button" class="btn btn-default" 
                                   data-dismiss="modal">Close</button>
                         </div>
                              </form>
                    </div>
               </div>
          </div>
     <script>
          $(document).on('click','.btn_select',function(){
               var id=$(this).data("id3");
               $.ajax({
                    url:"Messages.php",
                    method:"POST",
                    data:{id:id,act:'selectmessage'},
                    dataType:"text",
                    success:function(data){
                        $('#message_detail').html(data);  
                        $('#message_model').modal("show"); 
                    }

               });
          });

          $(document).on('click','.btn_message',function(){
            var id=document.getElementById("messageid").value;
               $.ajax({
                    url:"Messages.php",
                    method:"POST",
                    data:{id:id,act:'readmessage'},
                    dataType:"text",
                    success:function(){
                        location.reload(); 
                    }

               });
          });
     </script> 
    <?php require 'Footer.php'; ?>
</body>
</html>