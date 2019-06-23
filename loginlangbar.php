<?php 
/**
 * Loginlangbar.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Loginlangbar
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
  <div class="contrainer text-center">
    <h2 id="title">HINDU TEMPLE OF KENTUCKY</h2>
    <h6>
      4213 Accomack Drive, Louisville, KY 40241<br>
      Ph: (502) 429-8888 | Fax: (502) 429-8829<br>
      www.htky.org
    </h6>
  </div>

  <div>
    <div class="row">
      <section>
      <div>
        <?php  
        if (!isset($_SESSION["username"])) {  
            ?> 
          <div class="naming"><img src="img/lock.png"  id="smlogo"> 
          <a href="Login.php?action=login" class="links">Login / Register</a></div>
            <?php       
        } else {  
            echo '<div class="naming"><img src="img/unlock.png"  id="smlogo"> 
            Welcome - '.$_SESSION["username"].' ('.$_SESSION["UserProfileDesc"].') | 
            <a href="Logout.php" class="links">Logout</a></div>'; 
        }
        ?> 
      </div>
      </section>
      <aside><div class="naming text-right"><img src="img/planner.png"  
        id="smlogo"> <a href="EventCalendar.php" class="links">Event</a> | 
        <a href="PriestCalendar.php" class="links">Priest</a> | 
        <a href="FacilityCalendar.php" class="links">Facility</a></div></aside>
      
    </div>
  </div>
  <div class="line"></div>  