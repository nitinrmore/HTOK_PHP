<?php 
/**
 * Fees.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Fees
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

$title = 'Fees';
$currentPage = 'fees'; 
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
      <h3 class="pageheading text-center">POOJA OFFERING FEES</h3>
      <br>
      <h4> BOARD APPROVED ON DECEMBER 1, 2006</h4>
      <br>
      <h4>Fee Schedule for Pooja Offerings and Priest Services</h4>
      <br>
      <p>
        <img src="img/outsidepoojafees.png" class="img-responsive">
      </p>
      <p>
        All prices include Hall Rental at $15.00 an Hour per Member and 
        $45.00 an Hour per Non Member 
      </p>
      <p>
      Other Priestly Services outside the temple are $241.00 for the first day 
      and $151.00 for each subsequent day (Mem) 
    </p>
    <p>
      Other Priestly Services outside the temple are $341.00 for the first day 
      and $251.00 for each subsequent day (NonMem) 
    </p>
    <p>
      Payments: Reservations are made on a "FIRST PAID BASIS". Hence, prompt 
      payment is suggested. 
    </p>
    <p>
      For Temple SERVICE Fees: Please make checks payable to the Hindu Temple of 
      Kentucky, Inc. 
    </p>
    <p>
      Dakshinas are not proceeds to Hindu Temple of Kentucky, Inc. and hence, it may 
      not be eligible for tax deduction under IRS rules. 
    </p>
    <p>
      * Temple provides all supplies for performing these rituals. No obligation on 
      the co-sponsors to provide any supplies. 
    </p>
    <p>
      ** Sponsors shall supply all items requested by the priests. 
    </p>
    <p>
      Temple supplies shall not be used for private functions. 
    </p>
    <p>
      For services performed outside Temple premises, the Devotee shall provide 
      two way transportation to the priests. Due to insurance regulations, priests 
      are not allowed to drive their or rental cars to the devotees home.
    </p>
    <br>
      <h4>Pooja Services at Temple</h4>
      <br>
      <p>
        <img src="img/templepoojafees.png" class="img-responsive">
      </p>
      <br>
      <img src="img/namasteico.png" id="ico">
    </div>
  </div>
</div>

<?php require 'Footer.php'; ?>
</body>
</html>