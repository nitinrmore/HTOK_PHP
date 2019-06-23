<?php 
/**
 * FacilityCalendar.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   FacilityCalendar
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

$title = 'FacilityCalendar'; 
$currentPage = 'facilitycalendar'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>
<script src="js/facility.js"></script>
<div class="container">
  <h3 class="pageheading text-center">FACILITY CALENDAR</h3>
  <br>
  <div id="calendar"></div>
</div>
<div id="dataModal" class="modal fade">  
  <form method="post" id="frm_edit">
      <div class="modal-dialog">  
            <div class="modal-content">  
                <div class="modal-header">  
                      <button type="button" class="close" data-dismiss="modal">
                          &times;</button>  
                      <h4 class="modal-title">
                        Facility Reservation Request Details
                      </h4>  
                </div>  
                <div class="modal-body" id="service_detail">  
                </div>  
                <div class="modal-footer">  
                <input type="hidden" value="" name="action" id="action" />
                <?php 
                if ($_SESSION['userprofileid'] == 3  
                    || $_SESSION['userprofileid'] == 4
                ) {
                    ?>
                    <button id="btn_confirm" class="btn btn-primary">
                        Confirm</button>  
                    <button  id="btn_decline" class="btn btn-primary">
                        Decline</button>  
                    <?php
                }
                ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close</button>  
                </div>  
            </div>  
      </div>  
  </form>
</div>
<?php require 'Footer.php'; ?>
</body>
</html>
<script type="text/javascript">
function ajaxAction(action) {
  $.ajax({
      type: "POST",  
      url: "FacilityAction.php",  
      data: {edit_id:document.getElementById("edit_id").value,
            act:action},
            success: function() {
              $('#dataModal').modal('hide');
              calendar.fullCalendar('refetchEvents');
            }   
  });
}

$("#btn_confirm").click(function() {
  document.getElementById("action").value = "confirm";
  ajaxAction('confirm');
});


$( "#btn_decline" ).click(function() {
  document.getElementById("action").value = "decline";
  ajaxAction('decline');
});

</script>