<?php 
/**
 * Management.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Management
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

$title = 'Management';
$currentPage = 'management'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>
  <div class="container">
    <div ckass="row">
      <div>
        <h3 class="pageheading text-center">TEMPLE MANAGEMENT</h3>
        <br>
        <h4>Board</h4>
        <div class="row">
            <div class="col-md-3">
              <p>
                <B>Chandrika Srinivasan <br>(Chairman) </B> <br>
                lsvasan@twc.com <br>
                502-558-6542
              </p>
            </div>
            <div class="col-md-3">
              <p>
                <b>Purna Veer <br>(Vice Chairman) </b><br>
                purna@vsoftconsulting.com  <br>
                502-314-7535
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Amar Singla</b>  <br>
                amarcsingla@gmail.com <br>
                502-245-7608
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Bakula Sheth</b><br>
                bakulasheth@yahoo.com
              </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
              <p>
                  <b>Bhavna Gupta</b> <br>
                  bhavnaben@gmail.com
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Kirthivasan Subramanian</b> <br>
                  subkir70@gmail.com <br>
                  502-727-4825
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Mahendra Patel</b><br>
                  smitap80@gmail.com
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Jayaraman Ravishankar</b><br>
                  rjayaram_0724@yahoo.com <br>
                  502-420-8152
              </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
              <p>
                  <b>Jyothi Mahesh</b><br>
                  jyothi_mahesh@hotmail.com <br>
                  502-432-6771
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Kavita Jyotsula</b> <br>
                  kjyotsula@yahoo.com <br>
                  502-475-1391
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Praveen Katta</b> <br>
                  kattap@gmail.com <br>
                  502-345-3604
              </p>
            </div>
            <div class="col-md-3">
              <p>
              </p>
            </div>
        </div>
        <h4>Management</h4>
        <div class="row">
            <div class="col-md-3">
              <p>
                  <b>Rajesh Patel <br>(Managing Director)</b> <br>
                  hie365@yahoo.com  <br>
                  502-439-7665
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Sankaran Sundar <br>(Treasurer)</b> <br>
                  Sankaran.sundar@live.com  <br>
                  502-974-7176
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Janardhanan Alse <br>(Pooja / Communication)</b><br>
                  jalse@ius.edu<br>
                  812-987-5151
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Vidya Iyer <br>(Hospitality / Food)</b><br>
                  vidyavenkats@gmail.com<br>
                  502-836-8131
              </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
              <p>
                  <b>Sreenivas Pamidi <br>(Treasurer)</b> <br>
                  srsai26@gmail.com <br>
                  614-625-9754
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Vijay Kannan <br>(Facility Management)</b>    <br>
                  vijay10is@yahoo.com <br>
                  502-608-5943
              </p>
            </div>
            <div class="col-md-3">
              <p>
              </p>
            </div>
            <div class="col-md-3">
              <p>
              </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
              <p>
                  <b>Sheeba Jolly <br>(Temple Administration)</b>
              </p>
            </div>
            <div class="col-md-3">
              <p>
              </p>
            </div>
            <div class="col-md-3">
              <p>
              </p>
            </div>
            <div class="col-md-3">
              <p>
              </p>
            </div>
        </div>
        <h4>Priests</h4>
        <div class="row">
            <div class="col-md-3">
              <p>
                  <b>Shri Rajendra Kumar Joshi</b> <br>
                  502-420-9977
              </p>
            </div>
            <div class="col-md-3">
              <p>
                  <b>Shri Srinivasan Kannan</b> <br>
                  502-424-5158
              </p>
            </div>
            <div class="col-md-3">
              <p>
              </p>
            </div>
            <div class="col-md-3">
              <p>
              </p>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php require 'Footer.php'; ?>

</body>
</html>