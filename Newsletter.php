<?php  
/**
 * Newsletter.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Newsletter
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

if (isset($_POST["email"])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];


    $queryNL = "INSERT INTO Newsletter (username, email) VALUES('$name', '$email')";
    if (mysqli_query($connect, $queryNL)) {
        echo "<div class='successmessage'>Successfully Subscribed</div>";
    } else {
        if (mysqli_errno($connect) == 1062) {
            echo "<div class='errormessage'>Subscription Request Failed. 
                Email already registered.</div>";
        } else {
            echo "<div class='errormessage'>Subscription Request Failed. </div>";
        }
    }
}
?>