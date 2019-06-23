<?php 
/**
 * Nav.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Nav
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
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" 
            data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="img/htok.png"  id="logo"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li <?php if ($currentPage == 'index') { 
                ?> class="active" <?php 
              } ?> ><a href="index.php">Home</a></li>
          <li <?php if ($currentPage == 'reservations') { 
                ?> class="active" <?php 
              } ?> ><a href="Reservations.php">Reservations</a></li>
          
          <li <?php if ($currentPage == 'services') { 
                ?> class="active" <?php 
              } ?> ><a href="Services.php">Services</a></li>
          <li <?php if ($currentPage == 'fees') { 
                ?> class="active" <?php 
              } ?> ><a href="Fees.php">Fees</a></li>
        
          <li <?php if ($currentPage == 'about') { 
                ?> class="active" <?php 
              } ?> ><a href="About.php">About Us</a></li>
          <li <?php if ($currentPage == 'management') { 
                ?> class="active" <?php 
              } ?> ><a href="Management.php">Management</a></li>
            <?php  
            if ($_SESSION['userprofileid'] == 2  
                || $_SESSION['userprofileid'] == 3  
                || $_SESSION['userprofileid'] == 4
            ) {  
                
                if ($_SESSION['userprofileid'] == 2) {
                    $query = "select id from PriestServices 
                          WHERE statusid = 1";  
                    $result = mysqli_query($connect, $query);  
                    $notificationscount = mysqli_num_rows($result);
                } elseif ($_SESSION['userprofileid'] == 3) {
                    $query = "select id from FacilityReservation 
                          WHERE statusid = 1";  
                    $result = mysqli_query($connect, $query);  
                    $notificationscount = mysqli_num_rows($result);
                } elseif ($_SESSION['userprofileid'] == 4) {
                    $query = "select id from Messages 
                          WHERE statusid = 1";  
                    $result = mysqli_query($connect, $query);  
                    $notificationscount = mysqli_num_rows($result);
                }
                if ($notificationscount == 0) {
                  $notificationscount = "";
                }
                ?> 
          <li ><a href="Notifications.php"  class="notification">
              <span><img src="img/bell.png"  id="smlogo"></span>
                <?php echo '<div class="badge">'.$notificationscount.'</div>' ?>
          </a></li>
                <?php 
            } 
            if (isset($_SESSION["username"])) {  
                ?> 
          <li <?php if ($currentPage == 'user') { 
                ?> class="active" <?php 
              } ?> ><a href="User.php" title="Devotee Profile"><img src="img/user.png"  id="smlogo">
                  </a></li>
                <?php
              }  
            ?> 
        </ul>
      </div>
    </div>
  </nav>