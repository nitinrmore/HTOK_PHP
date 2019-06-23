<?php 
/**
 * ImageAction.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   ImageAction
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
    $action = 'upload';
}


if ($action == 'load') {
    $query = "SELECT Id,ImageName,ImageTitle,ImageType 
            FROM ImageLibrary where IsActive = 1";
    $result = mysqli_query($connect, $query); 
    if (mysqli_num_rows($result) > 0) {  
        $output .= '  
            <div class="table-responsive">  
            <table class="table">
            <thead>
            <tr>  
                    <td>Delete?</td>
                    <td>ImageName</td>  
                    <td>ImageTitle</td> 
                    <td>ImageType</td> 
                </tr></thead><tbody>';  
        while ($row = mysqli_fetch_assoc($result)) {  
            $output .= '  
                        <tr>  
                            <td><img src="img/remove.png"  
                            id="smlogo" name="delete_btn" data-id3="'
                            .$row["Id"].'" class="btn_delete text-center"></td> 
                            <td>'.$row["ImageName"].'</td>  
                            <td>'.$row["ImageTitle"].'</td>  
                            <td>'.$row["ImageType"].'</td>  
                        </tr>  
                        
                        ';  
        }  
        $output .= "</tbody></table></div>";  
    }
    echo $output;
} elseif ($action == 'delete') {
    $id = $_POST["id"];

    $query = "UPDATE ImageLibrary set IsActive = 0 where id=".$id;

    $retcode = mysqli_query($connect, $query);
} else {

    $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
    
    if (!empty($_POST['imagename']) || !empty($_POST['imagetitle']) 
        || $_FILES['image']
    ) {
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $imagename = $_POST['imagename'];
        $imagetitle = $_POST['imagetitle'];
        $imagetype = $_POST['imagetype'];
        //$path = 'uploads/'; // upload directory
        $path = $imagetype.'/'; // upload directory

        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        //$final_image = rand(1000,1000000).$img;
        $final_image = $imagename.'.'.$ext;
        $imagename .= '.'.$ext;
        // check's valid format
        if (in_array($ext, $valid_extensions)) { 
            $path = $path.strtolower($final_image); 
            if (move_uploaded_file($tmp, $path)) {
                echo "<img src='$path' id='icon'/>";
                
                $query = "Select * from ImageLibrary 
                    where ImageName = '".$imagename."' 
                    and ImageType = '".$imagetype."'
                    and IsActive = 1";

                $result = mysqli_query($connect, $query);  
                if (mysqli_num_rows($result) == 0) {  
                    //insert form data in the database
                    $query = "INSERT ImageLibrary (ImageName,ImageTitle,ImageType) 
                        VALUES ('".$imagename."','".$imagetitle."'
                        ,'".$imagetype."')";
                    if (mysqli_query($connect, $query)) {  
                        //echo 'Image uploaded successfully.';
                    } else {
                        echo 'invalid';
                    }
                }
                //echo $insert?'ok':'err';
            }
        } else {
            echo 'invalid';
        }
    } else {
        echo 'invalid';
    }
}
?>