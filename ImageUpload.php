<?php 
/**
 * ImageUpload.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   ImageUpload
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

$title = 'ImageUpload';
$currentPage = 'imageupload'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>
<div class="container">
    <h3 class="pageheading text-center">IMAGE UPLOAD</h3>  
    <br />
    <div id="err" class="warningmessage text-center"></div>
    <div id="upload_model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Image</h4>
                </div>
                <form id="form" action="ImageAction.php" method="post" 
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="imagetype">Image Type</label>
                            <select id="imagetype" name="imagetype" 
                                class="form-control" 
                                   required > 
                            <option value='uploads'>Uploads</option> 
                              <option value='banner'>Banner</option> 
                              <option value='deities'>Deities</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Image Name</label>
                            <input type="text" class="form-control" id="imagename"
                                name="imagename" placeholder="Enter name" 
                                    required />
                            <div class="h6">For replacing any image, please 
                                provide same Image Name 
                                (from list below) without file extension. 
                                Please make sure to select same Image Type. 
                                New Image should be of same extension.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Image Title</label>
                            <input type="type" class="form-control" id="imagetitle"
                                name="imagetitle" placeholder="Enter title" 
                                    required />
                        </div>
                        <div class="h6">Only images with "jpeg, jpg, png" 
                            extensions are supported.
                            </div>
                        <input id="uploadImage" type="file" accept="image/*" 
                            name="image" />
                        <div id="preview" class="text-left"><img src=""  
                            id="icon" /></div><br>
                        <input class="btn btn-success" type="submit" 
                            value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="imagelist_model">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Image List</h4>
                </div>
                <form method="post" id="frm_imagelist">
                <div class="modal-body">
                    <input type="hidden" value="selectimage" 
                        name="action" id="action">
                    <div class="form-group">
                        <div id="imagelist"></div>
                    </div>
                </div>
        </div>
    </div>
</div>

    <?php require 'Footer.php'; ?>

<script>
    $(document).ready(function () {
        
        $.ajax({
            url:"ImageAction.php",
            method:"POST",
            data:{act:'load'},
            dataType:"text",
            success:function(data){
                $('#imagelist').html(data);  
            }

        });
    });

    $(document).ready(function (e) {
        $("#form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
                url: "ImageAction.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
                cache: false,
        processData:false,
        beforeSend : function()
        {
            //$("#preview").fadeOut();
            $("#err").fadeOut();
        },
        success: function(data)
            {
                if(data=='invalid') {
                    // invalid file format.
                    $("#err").html("Operation Failed.").fadeIn();
                } else {
                // view uploaded file.
                    $("#preview").html(data).fadeIn();
                    $("#err").html("Image uploaded successfully.").fadeIn();
                    $("#form")[0].reset(); 
                    $.ajax({
                        url:"ImageAction.php",
                        method:"POST",
                        data:{act:'load'},
                        dataType:"text",
                        success:function(data){
                            $('#imagelist').html(data);  
                        }

                    });
                }
            },
            error: function(e) 
            {
            $("#err").html(e).fadeIn();
            }          
            });
        }));
        });

        $(document).on('click','.btn_delete',function() {
            if(confirm("Are you sure you want to remove it?")) {
               var id=$(this).data("id3");
               $.ajax({
                    url:"ImageAction.php",
                    method:"POST",
                    data:{id:id,act:'delete'},
                    dataType:"text",
                    success:function(){
                        $.ajax({
                            url:"ImageAction.php",
                            method:"POST",
                            data:{act:'load'},
                            dataType:"text",
                            success:function(data){
                                $('#imagelist').html(data);  
                            }

                        });
                    }

               });
            }
          });
    </script>
</body>
</html>