<?php 
/**
 * VirtualTour.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   VirtualTour
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

require '_Session.php';  

$title = 'VirtualTour';
$currentPage = 'virtualtour'; 
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
        <h3 class="pageheading text-center">VIRTUAL TOUR</h3>
        <iframe id="virtualtour" title="Virtual tour by tourmaker" width="100%" 
        height="350" src="https://makevt.com/media/tourmaker/rduexmpyzw/" 
        frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>

    <?php require 'Footer.php'; ?>
</body>
</html>