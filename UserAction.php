<?php
/**
 * UserAction.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   UserAction
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
    $action = 'search';
}


if ($action == "select") {
    $id = $_POST["id"];

    $queryUP = "SELECT id userprofileid ,UserProfileDescription 
            FROM UserProfile";


    $query = "SELECT u.id devoteeid, username devoteeusername,
            u.userprofileid devoteeuserprofileid,
            up.UserProfileDescription devoteeuserprofiledesc
            FROM Users u inner join UserProfile up on up.id = u.userprofileid
            WHERE u.id = ".$id;

    $result = mysqli_query($connect, $query); 
    if (mysqli_num_rows($result) > 0) {  
        while ($row = mysqli_fetch_assoc($result)) {  
            $devoteeuserid = $id;
            $devoteeusername = $row['devoteeusername'];
            $devoteeuserprofileid = $row['devoteeuserprofileid'];
            $devoteeuserprofiledesc = $row['devoteeuserprofiledesc'];
            $output .= '<div class="form-group">
                                <label class="control-label">
                                Devotee Username *</label>
                                <br>'.$devoteeusername.'
                        </div>
                        <div class="form-group">
                                <label class="control-label">
                                Devotee Profile</label>
                                <select name="devoteeuserprofile" 
                                id="devoteeuserprofile" class="form-control" 
                                required >';
            
            $resultUP = mysqli_query($connect, $queryUP); 
            while ($rowUP = mysqli_fetch_assoc($resultUP)) {
                    $UserProfileDescription = $rowUP['UserProfileDescription'];
                    $userprofileid = $rowUP['userprofileid'];
                if ($devoteeuserprofileid == $userprofileid) {
                        $output .= '<option value="'.$userprofileid.'" selected>'
                            .$UserProfileDescription.'</option>';
                } else {
                        $output .= '<option value="'.$userprofileid.'">'
                            .$UserProfileDescription.'</option>';
                }
            };
                                    
            $output .= '</select>
                        <input type="hidden" id="devoteeuserid" 
                        name="devoteeuserid" value="'.$_POST["id"].'" />
                        </div>
                    
                    ';  
        }  
        
        echo $output;  
    }
} elseif ($action == 'update') {
    $userprofileid = $_POST["userprofileid"];
    $id = $_POST["id"];

    $query = "UPDATE Users set userprofileid = ".$userprofileid." where id=".$id;

    $retcode = mysqli_query($connect, $query);
} else {
    $searchname = $_GET['searchname'];
    $startFrom = $_GET['startFrom'];

    $searchname = trim(htmlspecialchars($searchname));
    $startFrom = filter_var($startFrom, FILTER_VALIDATE_INT);

    // make username search friendly
    $like = '%' . strtolower($searchname) . '%';

    $query = "SELECT u.id, username, firstname, lastname, 
            userprofiledescription userprofile 
            FROM Users u 
            inner join UserProfile up on up.id = u.userprofileid
            WHERE (lower(username) LIKE '$like') 
            OR (lower(firstname) LIKE '$like')
            OR (lower(lastname) LIKE '$like')
            OR (lower(email) LIKE '$like')
            ORDER BY username
            LIMIT 10 OFFSET $startFrom";
    $result = mysqli_query($connect, $query); 
    if (mysqli_num_rows($result) > 0) {  
        $output .= '  
            <div class="table-responsive">  
            <table class="table">
            <thead>
            <tr>  
                    <td>Select</td>  
                    <td>Username</td> 
                    <td>Firstname</td> 
                    <td>Lastname</td>  
                    <td>Profile</td>  
                </tr></thead><tbody>';  
        while ($row = mysqli_fetch_assoc($result)) {  
            $output .= '  
                        <tr>  
                            <td><img src="img/requestform.png"  
                            id="smlogo" name="select_btn" data-id3="'
                            .$row["id"].'" class="btn_select text-center"></td> 
                            <td>'.$row["username"].'</td>  
                            <td>'.$row["firstname"].'</td>  
                            <td>'.$row["lastname"].'</td>  
                            <td>'.$row["userprofile"].'</td> 
                            
                        </tr>  
                        
                        ';  
        }  
        $output .= "</tbody></table></div>";  
    }
    echo json_encode($output);
}
?>