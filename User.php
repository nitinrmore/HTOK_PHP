<?php  
/**
 * User.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   User
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

$userid = $_SESSION['userid']; 

if (isset($_POST["btn_save_user"])) {  
    if (empty($_POST["email"])) {  
         $errormessage = "Fields marked with * are required";
    } else {  
         $firstname = mysqli_real_escape_string($connect, $_POST["firstname"]);  
         $lastname = mysqli_real_escape_string($connect, $_POST["lastname"]);
         $email = mysqli_real_escape_string($connect, $_POST["email"]);
         $phone = mysqli_real_escape_string($connect, $_POST["phone"]);
           

        $query = "UPDATE Users 
          Set firstname = '$firstname' ,
          lastname = '$lastname' ,
          email = '$email' ,
          phone = '$phone' 
          Where id = $userid"; 
        echo $query;
        if (mysqli_query($connect, $query)) {  
             $successmessage = "Profile Successfully Updated"; 
                    
        } else {
            if (mysqli_errno($connect) == 1062) {
                  $errormessage = "Updated Failed. Email ($email) 
                         already used by another devotee.";
            } else {
                   $errormessage = "Updated Failed";
            }    
        }
    }  
}  

$query = "SELECT u.id,u.username,u.firstname,u.lastname,u.email,u.phone
     ,u.userprofileid,up.UserProfileDescription 
     FROM Users u  inner join UserProfile up on up.id = u.userprofileid
     WHERE u.id = $userid";  
$result = mysqli_query($connect, $query);  
if (mysqli_num_rows($result) > 0) {  
    while ($row = mysqli_fetch_assoc($result)) {
         $userid = $row['id'];
         $username = $row['username'];
         $firstname = $row['firstname'];
         $lastname = $row['lastname'];
         $email = $row['email'];
         $phone = $row['phone'];
         $UserProfileDesc = $row['UserProfileDescription'];
    };
}  

$title = 'User'; 
$currentPage = 'user'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>
     <div class="container">
          <h3 class="pageheading text-center">DEVOTEE PROFILE</h3>  
          
            <?php 
            if (!empty($errormessage)) {
                 echo "<br /><div class='errormessage text-center'>
                    $errormessage</div>";
            } elseif (!empty($successmessage)) {
                 echo "<br /><div class='successmessage text-center'>
                    $successmessage</div>";
            }
          
            if ($_SESSION['userprofileid'] == 4) {
                ?>
          <div id="search_model">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h4 class="modal-title">Search Devotee</h4>
                         </div>
                         <form method="post" id="frm_search">
                         <div class="modal-body">
                              <input type="hidden" value="search" 
                                   name="action" id="action">
                              <div class="form-group">
                                   <label class="control-label">Search</label>
                                   <input type="text" name="searchname" 
                                        id="searchtextbox" placeholder="Type text"  
                                        class="form-control" />
                                   <br>
                                   <div id="searchresult"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div id="devotee_model" class="modal fade">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <button type="button" class="close" 
                                   data-dismiss="modal">&times;</button> 
                              <h4 class="modal-title">Update Devotee Profile</h4>
                         </div>
                         <form method="post" id="frm_devoteeupdate">
                         <div class="modal-body" id="devotee_detail">
                          </div>
                         <div class="modal-footer">
                              <button type="button" id="btn_save_devotee" 
                                   name="btn_save_devotee" 
                                   class="btn btn-primary btn_save_devotee">
                                   Update Devotee</button>
                              <button type="button" class="btn btn-default" 
                                   data-dismiss="modal">Close</button>
                         </div>
                              </form>
                    </div>
               </div>
          </div>
          <div class="text-center">
               <h4><a href="ImageUpload.php" class="mainlinks text-center">
              Upload Image. Click here <img src="img/picture.png" id="smlogo"></a></h4>
          </div>
                <?php
            }
            ?>
          <div id="add_model">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title">Update My Profile</h4>
                    </div>
                    <form method="post" id="frm_add">
                    <div class="modal-body">
                         <input type="hidden" value="add" name="action" id="action">
                            <?php 
                              echo "<input type='hidden' class='form-control' 
                                   id='userid' name='userid' value='$userid' />";  
                            ?>
                         <div class="form-group">
                              <label class="control-label">Username *</label>
                              <br><?php echo "$username" ?>
                         </div>
                         <div class="form-group">
                              <label class="control-label">User Profile</label>
                              <br><?php echo "$UserProfileDesc" ?>
                         </div>
                         <div class="form-group">
                              <label class="control-label">Firstname *</label>
                                <?php 
                                  echo "<input type='text' class='form-control' 
                                   id='firstname' name='firstname' 
                                        value='$firstname' required/>";  
                                ?>
                              
                         </div>      
                         <div class="form-group">
                              <label class="control-label">Lastname</label>
                                <?php 
                                  echo "<input type='text' class='form-control' 
                                        id='lastname' name='lastname' 
                                        value='$lastname' required/>";  
                                ?>
                         </div>   
                         <div class="form-group">
                              <label class="control-label">Email *</label>
                                <?php 
                                  echo "<input type='text' class='form-control' 
                                        id='email' name='email' 
                                        value='$email' required/>";  
                                ?>
                         </div>   
                         <div class="form-group">
                              <label class="control-label">Phone</label>
                                <?php 
                                  echo "<input type='text' class='form-control' 
                                        id='phone' name='phone' 
                                        value='$phone' required/>";  
                                ?>
                         </div>   
                         <br>
                         <div class="form-group text-center">
                              <a href="Login.php?action=changepassword" 
                                   class="mainlinks">Change Password?</a>
                         </div>
                         
                    </div>
                    <div class="modal-footer">
                         <input type="submit" id="btn_save_user" 
                              name="btn_save_user" value="Update" 
                              class="btn btn-primary"/>
                         
                    </div>
                         </form>
               </div>
          </div>
          </div>
     </div>
        <?php require 'Footer.php'; ?>

     <script>
         var searchtextBox = document.getElementById('searchtextbox'),
               searchresultContainer = document.getElementById('searchresult')

        
        var ajax = null;
        var loadedUsers = 1; // number of users shown in the results

        searchtextBox.onkeyup = function() {
            // "this" refers to the textbox
            var val = this.value;

            // trim - remove spaces in the begining and the end
            val = val.replace(/^\s|\s+$/, "");

            // check if the value is not empty
            if (val !== "") {
                // search for data    
                searchForData(val);
            } else {
                // clear the result content
                clearResult();
            }
        }
        
        function searchForData(value, isLoadMoreMode) {
            // abort if ajax request is already there
            if (ajax && typeof ajax.abort === 'function') {
                ajax.abort();
            }

            // nocleaning result is set to true on load more mode
            if (isLoadMoreMode !== true) {
                clearResult();
            }

            // create the ajax object
            ajax = new XMLHttpRequest();
            // the function to execute on ready state is changed
            ajax.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    try {
                        var json = JSON.parse(this.responseText)
                    } catch (e) {
                        noUsers();
                        return;
                    }

                    if (json.length === 0) {
                        if (isLoadMoreMode) {
                            alert('No more to load');
                        } else {
                            noUsers();
                        }
                    } else {
                        showUsers(json);
                    }


                }
            }
            // open the connection
            ajax.open('GET', 
               'UserAction.php?searchname=' + value + '&startFrom=' + loadedUsers ,
               true);
            // send
            ajax.send();
        }

        function showUsers(data) {
            // the function to create a row
            function createRow(rowData) {
                searchresultContainer.appendChild(wrap);
            }
            
            $('#searchresult').html(data);

            //  create load more button
            var loadMoreButton = document.createElement("span");
            loadMoreButton.innerHTML = "Load More";
            // add onclick event to it. 
            loadMoreButton.onclick = function() {
                // searchForData() function is called in loadMoreMode
                searchForData(textBox.value, true);
                // remove loadmorebutton
                this.parentElement.removeChild(this);
            }
            // append loadMoreButton to result container
            searchresultContainer.appendChild(loadMoreButton);

            // increase the user count
            loadedUsers += len;
        }

        function clearResult() {
            // clean the result <div>
            searchresultContainer.innerHTML = "";
            // make loaded users to 0
               loadedUsers = 0;
               
        }

        function noUsers() {
            searchresultContainer.innerHTML = "No Users";
          }
          
          $(document).on('click','.btn_select',function() {
               var id=$(this).data("id3");
               $.ajax({
                    url:"UserAction.php",
                    method:"POST",
                    data:{id:id,act:'select'},
                    dataType:"text",
                    success:function(data){
                         $('#devotee_detail').html(data);  
                         $('#devotee_model').modal("show"); 
                    }

               });
          });

          $(document).on('click','.btn_save_devotee',function() {
               var id=document.getElementById("devoteeuserid").value;
               var upselect = document.getElementById("devoteeuserprofile");
               var userprofileid = upselect.options[upselect.selectedIndex].value;
               
               $.ajax({
                    url:"UserAction.php",
                    method:"POST",
                    data:{id:id,userprofileid:userprofileid,act:'update'},
                    dataType:"text",
                    success:function(data){
                         clearResult();
                         searchtextBox.value = "";
                         $('#devotee_model').modal("hide"); 
                    }

               });
          });
    </script>
    
     </body>  
</html>