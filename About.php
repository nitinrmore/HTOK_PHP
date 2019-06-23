<?php 
/**
 * About.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   About
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

$title = 'About'; 
$currentPage = 'about'; 
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
        <h3 class="pageheading text-center">HISTORY</h3>
        <br>
        <h4>Founded in 1985</h4>
        <br>
        <p>
            A vibrant source of Sanatana Dharma for the Hindu community in Kentucky,
             The Hindu Temple of Kentucky was inaugurated in 1999 as one of the 
             first Shiva-Vishnu temples in North America. Designed by the legendary 
             temple architect V. Ganapathi Sthapathi, this innovative design 
             incorporates both North and South Indian temple architecture, and 
             represents the fusion of diverse worship styles from all over India.
        </p>
        <img src="img/namasteico.png" id="ico">
      </div>
    </div>
  </div>

    <?php require 'Footer.php'; ?>
</body>
</html>