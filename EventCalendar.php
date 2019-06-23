<?php 
/**
 * EventCalendar.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   EventCalendar
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

$title = 'EventCalendar';
$currentPage = 'eventcalendar'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>

<script src="js/events.js"></script>

<div class="container">
   <h3 class="pageheading text-center">EVENT CALENDAR</h3>
   <br>
   <div id="calendar"></div>
</div>

<?php 
if ($_SESSION['userprofileid'] == 4) {
    ?>
    <div id="add_model" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" 
                        aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Event</h4>
                </div>
                <form method="post" id="frm_add">
                <div class="modal-body">
                    <input type="hidden" value="add" name="action" id="action">
                    <div class="form-group">
                        <label class="control-label">Title *</label>
                        <input type="text" class="form-control" id="titletxt" 
                            name="titletxt" required/>
                    </div>
                    <div class="form-group">
                            <label>Start Event *</label> 
                            <div class='input-group date' id='start_event'>
                                <input type='text' id='startevent' name='startevent' 
                                    class="form-control" required />
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                    </div>      
                    <div class="form-group">
                            <label>Start Event *</label> 
                            <div class='input-group date' id='end_event'>
                                <input type='text' id='endevent' name='endevent' 
                                    class="form-control" required />
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                    </div>   
                    <br>
                    <div class="warningmessage">
                        Please check and update the date and time before saving **
                    </div>
                </div>
                <div class="modal-footer">
                    <?php 
                    if ($_SESSION['userprofileid'] == 4) {
                        ?>
                    <button type="button" id="btn_add" class="btn btn-primary">
                            Save</button>
                        <?php
                    }
                    ?>
                    <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Close</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <?php
}
?>

<div id="dataModal" class="modal fade">  
    <form method="post" id="frm_edit">
        <div class="modal-dialog">  
            <div class="modal-content">  
                    <div class="modal-header">  
                        <button type="button" class="close" data-dismiss="modal">
                                &times;</button>  
                        <h4 class="modal-title">Event Details</h4>  
                    </div>  
                    <div class="modal-body" id="service_detail">  
                    </div>  
                    <div class="modal-footer">  
                    <input type="hidden" value="" name="action" id="action" />
                        <?php 
                        if ($_SESSION['userprofileid'] == 4) {
                            ?>
                    <button id="btn_delete" class="btn btn-primary">Delete</button>
                            <?php
                        }
                        ?>
                    <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Close</button>  
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
        url: "EventAction.php",  
        data: {title:document.getElementById("titletxt").value,
            start:document.getElementById("startevent").value,
            end:document.getElementById("endevent").value,
            act:action},
            success: function() {
                $('#dataModal').modal('hide');
                calendar.fullCalendar('refetchEvents');

            }        
    });
}
        
$("#btn_delete").click(function() {
    document.getElementById("action").value = "delete";
    ajaxAction('delete');
});

$("#btn_add").click(function() {
    document.getElementById("action").value = "insert";
    alert(document.getElementById("action").value);
    ajaxAction('insert');
});

$(function () {
    $('#start_event').datetimepicker();
});

$(function () {
    $('#end_event').datetimepicker();
});
</script>