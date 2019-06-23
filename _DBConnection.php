<?php
/**
 * DBConnection.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   DBConnection
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

$connect = mysqli_connect(
    "ec2-18-222-200-13.us-east-2.compute.amazonaws.com",
    //"localhost",
    "htok_user",
    "htok",
    "HTOK"
);
if (mysqli_errno($connect) > 0) {
    die('Unable to connect to database [' . mysqli_errno($connect) . ']');
}
?>