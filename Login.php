<?php  
/**
 * Login.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Login
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

$title = 'Login';
$currentPage = 'login';


if (isset($_POST["register"])) {  
    if (empty($_POST["username"]) && empty($_POST["password"])) {  
         $errormessage = "Fields marked with * are required";  
    } else {  
          $username = mysqli_real_escape_string($connect, $_POST["username"]);  
          $password = mysqli_real_escape_string($connect, $_POST["password"]);
          $firstname = mysqli_real_escape_string($connect, $_POST["firstname"]);
          $lastname = mysqli_real_escape_string($connect, $_POST["lastname"]);
          $email = mysqli_real_escape_string($connect, $_POST["email"]);
          $newsletter = $_POST["newsletter"];
          $phone = mysqli_real_escape_string($connect, $_POST["phone"]);
          $password = md5($password);  
               
          $query = "INSERT INTO Users 
                    (Username, Password, UserProfileid, 
                    Firstname, Lastname, Email, Phone) 
                    VALUES('$username', '$password',1
                    ,'$firstname','$lastname','$email','$phone')";  
               
        if (mysqli_query($connect, $query)) {  
             $query = "SELECT u.id,u.userprofileid
                         ,up.UserProfileDescription,u.email 
                         FROM Users u  
                         inner join UserProfile up on up.id = u.userprofileid
                         WHERE username = '$username' AND password = '$password' 
                         limit 1";  
             $result = mysqli_query($connect, $query);  
            if (mysqli_num_rows($result) > 0) {  
                while ($row = mysqli_fetch_assoc($result)) {
                    $userid = $row['id'];
                    $userprofileid = $row['userprofileid'];
                    $UserProfileDesc = $row['UserProfileDescription'];
                    $email = $row['email'];
                };
                  $_SESSION['userid'] = $userid;  
                  $_SESSION['userprofileid'] = $userprofileid;  
                  $_SESSION['UserProfileDesc'] = $UserProfileDesc;  
                  $_SESSION['email'] = $email; 
                              
            }  
             $_SESSION['username'] = $username;  

            if ($newsletter == "on") {
                   $usernameNL = $firstname." ".$lastname;
                   $queryNL = "INSERT INTO Newsletter (username, email) 
                              VALUES('$usernameNL', '$email')";
                   $retcode = mysqli_query($connect, $queryNL);
                    
            }
                header("location:Reservations.php"); 
        } else {
            if (mysqli_errno($connect) == 1062) {
                  $errormessage = "Registration Failed. Username already exists.";
            } else {
                 $errormessage = "Registration Failed";
            }
               
        }
          
    }  
}  
if (isset($_POST["login"])) {  
    if (empty($_POST["username"]) && empty($_POST["password"])) {  
         $errormessage = "Fields marked with * are required";
    } else {  
          $username = mysqli_real_escape_string($connect, $_POST["username"]);  
          $password = mysqli_real_escape_string($connect, $_POST["password"]);  
          $password = md5($password);  
          $query = "SELECT * FROM Users 
                    WHERE username = '$username' AND password = '$password'";  
          $result = mysqli_query($connect, $query);  
        if (mysqli_num_rows($result) > 0) {  
             $query = "SELECT u.id,u.userprofileid
                    ,up.UserProfileDescription,u.email
                    FROM Users u  
                    inner join UserProfile up on up.id = u.userprofileid
                    WHERE username = '$username' AND password = '$password' 
                    limit 1";  
             $result = mysqli_query($connect, $query);  
            if (mysqli_num_rows($result) > 0) {  
                while ($row = mysqli_fetch_assoc($result)) {
                    $userid = $row['id'];
                    $userprofileid = $row['userprofileid'];
                    $UserProfileDesc = $row['UserProfileDescription'];
                    $email = $row['email'];
                };
                  $_SESSION['userid'] = $userid;  
                  $_SESSION['userprofileid'] = $userprofileid;  
                  $_SESSION['UserProfileDesc'] = $UserProfileDesc;  
                  $_SESSION['email'] = $email; 
                         
            }  
             $_SESSION['username'] = $username;  
            if ($userprofileid == 1) {
                   header("location:Reservations.php"); 
            } else {
                header("location:Notifications.php"); 
            }
                    
        } else {  
             $errormessage = "Wrong User Details";
        }  
    }  
}  

if (isset($_POST["changepassword"])) {  
    if (empty($_POST["username"]) 
        && empty($_POST["email"]) 
        && empty($_POST["password"])
    ) {  
         $errormessage = "Fields marked with * are required";
    } else {  
         $username = mysqli_real_escape_string($connect, $_POST["username"]);  
         $password = mysqli_real_escape_string($connect, $_POST["password"]);
         $email = mysqli_real_escape_string($connect, $_POST["email"]);
         $password = md5($password);  

         $query = "SELECT * FROM Users 
               WHERE username = '$username' AND Email = '$email'";  
         $result = mysqli_query($connect, $query);  
        if (mysqli_num_rows($result) > 0) {  
             $query = "UPDATE Users Set Password = '$password' 
                    Where Username = '$username' and Email = '$email'"; 
             $retcode = mysqli_query($connect, $query);

             $query = "SELECT u.id,u.userprofileid
               ,up.UserProfileDescription,u.email 
               FROM Users u  
               inner join UserProfile up on up.id = u.userprofileid
               WHERE username = '$username' AND password = '$password' 
               limit 1";  
             $result = mysqli_query($connect, $query);  
            if (mysqli_num_rows($result) > 0) {  
                while ($row = mysqli_fetch_assoc($result)) {
                    $userid = $row['id'];
                    $userprofileid = $row['userprofileid'];
                    $UserProfileDesc = $row['UserProfileDescription'];
                    $email = $row['email'];
                };
                $_SESSION['userid'] = $userid;  
                $_SESSION['userprofileid'] = $userprofileid;  
                $_SESSION['UserProfileDesc'] = $UserProfileDesc;  
                $_SESSION['email'] = $email;
                         
            }  
             $_SESSION['username'] = $username;  
             header("location:Reservations.php");  
        } else {  
             $errormessage = "Password Change Failed. 
                         Please provide valid Username 
                         and Email to Change Password"; 
             unset($_SESSION['username']);  
             $username = "";
             unset($_SESSION['email']);  
             $email = "";
        }
          
    }  
}  
?>  
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>
     <div class="container">  
            <?php  
          
            if ($_GET["action"] == "login") {  
                ?>  
          <h3 class="pageheading text-center">Login Form</h3>  
          
                <?php 
                if (!empty($errormessage)) {
                    echo "<br /><div class='errormessage text-center'>
                         $errormessage
                         </div>";
                } elseif (!empty($successmessage)) {
                     echo "<br /><div class='successmessage text-center'>
                         $successmessage
                         </div>";
                }
                ?>
          
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-body">
                    <form method="post">  
                    <div class="row">
                         <div class="col-sm-12">
                              <label>Enter Username *</label>  
                              <input type="text" name="username" 
                                   size="10" class="form-control" required />  
                              <br />
                         </div>
                         <div class="col-sm-12">
                              <label>Enter Password *</label>  
                              <input type="password" name="password" 
                                   class="form-control" required />  
                              <br />
                         </div>
                         <div class="col-sm-12 text-center">
                              <input type="submit" name="login" value="Login" 
                                   class="btn btn-info" />  
                              <br />
                         </div>
                         <div class="col-sm-12 text-center">
                              <a href="Login.php?action=register" 
                                   class="mainlinks">Register</a> | 
                                   <a href="Login.php?action=changepassword" 
                                        class="mainlinks">Forgot Password?</a>
                              
                         </div>
                    </div>
                    </form>  
                    </div>
               </div>
          </div>
                <?php       
            } elseif ($_GET["action"] == "register") {  
                ?>  
          <h3 class="pageheading text-center">Registration Form</h3>  
          
                <?php if (!empty($errormessage)) {
                    echo "<br /><div class='errormessage text-center'>
                         $errormessage
                         </div>";
                } elseif (!empty($successmessage)) {
                     echo "<br /><div class='successmessage text-center'>
                         $successmessage
                         </div>";
                }
                ?>
          
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-body">
                    <form method="post">  
                    <div class="row">
                         <div class="col-sm-12">
                              <label>Enter Username *</label>  
                              <input type="text" name="username" 
                                   class="form-control" required />  
                              <br />  
                         </div>
                         <div class="col-sm-12">
                              <label>Enter First Name *</label>  
                              <input type="text" name="firstname" 
                                   class="form-control" required />  
                              <br />  
                         </div>
                         <div class="col-sm-12">
                              <label>Enter Last Name</label>  
                              <input type="text" name="lastname" 
                                   class="form-control" />  
                              <br /> 
                         </div>
                         <div class="col-sm-12"> 
                              <label>Enter Email *</label>  
                              <input type="email" name="email" 
                                   class="form-control" required />  
                              <br />  
                         </div>
                         <div class="col-sm-12"> 
                              <label>Subscribe to Newsletter?</label>  
                              <input type="checkbox" name="newsletter" 
                                   class="form-control"  />  
                              <br />  
                         </div>
                         <div class="col-sm-12">
                              <label>Enter Phone</label>  
                              <input type="text" name="phone" 
                                   class="form-control" />  
                              <br />  
                         </div>
                         <div class="col-sm-12">
                              <label>Enter Password *</label>  
                              <input type="password" name="password" 
                                   class="form-control" required />  
                              <br />  
                         </div>
                         <div class="col-sm-12 text-center">
                              <input type="submit" name="register" 
                                   value="Register" class="btn btn-info" />  
                              <br />  
                         </div>
                         <div class="col-sm-12 text-center">
                              <a href="Login.php?action=login" class="mainlinks">
                                   Login</a> | 
                                   <a href="Login.php?action=changepassword" 
                                        class="mainlinks">Forgot Password?</a>
                         </div>
                    </div>
                    </form>  
                    </div>
               </div>
          </div>
                <?php  
            } else {  
                ?>  
          <h3 class="pageheading text-center">Change Password Form</h3>  
                <?php if (!empty($errormessage)) {
                    echo "<br /><div class='errormessage text-center'>
                         $errormessage
                         </div>";
                } elseif (!empty($successmessage)) {
                     echo "<br /><div class='successmessage text-center'>
                         $successmessage
                         </div>";
                }
                ?>
          
          
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-body">
                    <form method="post">  
                    <div class="row">
                         <div class="col-sm-12">
                              <label>Enter Username *</label>  
                              <?php 
                                if (empty($username)) {
                                     echo '<input type="text" name="username" 
                                        class="form-control" required />'; 
                                } else {
                                     echo "<input type='hidden' 
                                        class='form-control' id='username' 
                                        name='username' value='$username' />
                                        <br>$username";
                                }  
                                ?>
                              
                              <br />  
                         </div>
                         <div class="col-sm-12">
                              <label>Enter Email *</label>  
                                <?php 
                                if (empty($username)) {
                                     echo '<input type="email" name="email" 
                                        class="form-control" required />'; 
                                } else {
                                     echo "<input type='hidden' 
                                        class='form-control' id='email' name='email' 
                                        value='$email' /><br>$email";
                                }  
                                ?>
                              <br />  
                         </div>
                         <div class="col-sm-12">
                              <label>Enter Password *</label>  
                              <input type="password" name="password" 
                                   class="form-control" />  
                              <br />  
                         </div>
                         <div class="col-sm-12 text-center">
                              <input type="submit" name="changepassword" 
                                   value="Change Password" class="btn btn-info" />  
                              <br />  
                         </div>
                         <div class="col-sm-12 text-center">
                              <a href="Login.php?action=login" 
                                   class="mainlinks">Login</a>
                         </div>
                    </div>
                    </form>  
                    </div>
               </div>
          </div>
          
                <?php  
            } 
            ?>  
     </div>  
        <?php require 'Footer.php'; ?>
     </body>  
 </html>  