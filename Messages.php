<?php  
/**
 * Messages.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Messages
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

if ($_POST["act"]=="send") {
    if (isset($_POST["comments"])) {
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $comments = $_POST['comments'];


        $queryAM = "INSERT INTO Messages (comments,name, email,statusid) 
                    VALUES('$comments','$name', '$email',1)";
        if (mysqli_query($connect, $queryAM)) {
            echo "<div class='successmessage'>Message sent successfully.</div>";
        } else {
            echo "<div class='errormessage'>Message delivery failed.</div>";
        }
    }
} elseif ($_POST["act"]=="selectmessage") {
    $id  = $_POST['id'];
    $queryM = "select id,comments,name, email from Messages where id = ".$id;
    $resultM = mysqli_query($connect, $queryM); 
    if (mysqli_num_rows($resultM) > 0) {  
        while ($row = mysqli_fetch_assoc($resultM)) {  
            $comments = $row['comments'];
            $name = $row['name'];
            $email = $row['email'];
            $output .= ' <div class="form-group">
                                    <label class="control-label">Comment</label>
                                    <br>'.$comments.'
                            </div>
                            <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <br>'.$name.'
                            </div>
                            <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <br>'.$email.'
                            </div>
                            <input type="hidden" id="messageid" name="messageid" 
                            value="'.$id.'" />
                        ';  
        }
    
    }
    echo $output;
} elseif ($_POST["act"]=="readmessage") {
    $id  = $_POST['id'];
    $queryM = "UPDATE Messages set statusid = 8 where id = ".$id;
    if (!mysqli_query($connect, $queryM)) {
        echo "<div class='errormessage'>Message update failed.</div>";
    
    }
}
?>