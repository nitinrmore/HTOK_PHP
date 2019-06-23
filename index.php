<?php 
/**
 * Index.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Index
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

/**
 * BannerQuery
 * Provide banner query
 *
 * @param string $connect   description
 * @param string $ImageType description
 * 
 * @return $result
 */
function bannerQuery($connect,$ImageType)
{
    $query = 'SELECT * from ImageLibrary where ImageType ="'
        .$ImageType.'" AND IsActive = 1 Order by id asc';
    $resultBQ = mysqli_query($connect, $query);
    return $resultBQ;
}

/**
 * BannerSlideIndicators
 * Returns banner indicators
 *
 * @param string $connect   description
 * @param string $ImageType description
 * 
 * @return $output
 */
function bannerSlideIndicators($connect,$ImageType) 
{
    $output = '';
    $count = 0;
    $resultBSI = bannerQuery($connect, $ImageType);
    while ($row = mysqli_fetch_array($resultBSI)) {
        if ($count == 0) {
            $output .= '
        <li data-target="#bannerCarousel" data-slide-to="'
            .$count.'" class="active"></li>
        ';
        } else {
            $output .= '
        <li data-target="#bannerCarousel" data-slide-to="'
            .$count.'"></li>
        ';
        }
        $count = $count + 1;
    }
    return $output; 
}

/**
 * BannerSlides
 * Returns banner slides
 *
 * @param string $connect   description
 * @param string $ImageType description
 * 
 * @return $output
 */
function bannerSlides($connect,$ImageType)
{
    $output = '';
    $count = 0;
    $result = bannerQuery($connect, $ImageType);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '
        <div class="item active">
        ';
        } else {
            $output .= '
        <div class="item">
        ';
        }
        $output .= '
      <img src="img/'.$ImageType.'/'.$row["ImageName"].'" alt="'
        .$row["ImageTitle"].'" id="'.$ImageType.'icon" />
      <div class="carousel-caption">
        <h3>'.$row["ImageTitle"].'</h3>
      </div> 
      </div>
      ';
        $count = $count + 1;
    }
    return $output;
}

$query = "SELECT concat(DATE_FORMAT(start_event, '%l%p'),'-',
        DATE_FORMAT(end_event, '%l%p'),' ',title) curevent
        FROM Events 
        where DATE_FORMAT(start_event, '%Y-%m-%d') = 
              DATE_FORMAT(DATE_SUB(now(), INTERVAL 4 HOUR), '%Y-%m-%d')  
        ORDER BY id;
        ";
$result = mysqli_query($connect, $query);

$query = "SELECT concat(DATE_FORMAT(start_event, '%l%p'),'-',
        DATE_FORMAT(end_event, '%l%p'),' ',title) curevent
        FROM Events 
        where DATE_FORMAT(start_event, '%Y-%m-%d') = 
        DATE_FORMAT(DATE_ADD(DATE_SUB(now(), INTERVAL 4 HOUR), INTERVAL 1 DAY), 
        '%Y-%m-%d')  
        ORDER BY id;";
$resultTom = mysqli_query($connect, $query);

$title = 'Home'; 
$currentPage = 'index'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<?php require 'Head.php'; ?>
<body>
<?php require 'nav.php'; ?>
<?php require 'loginlangbar.php'; ?>
  <div class="contrainer text-center">
     <div class="row">
        <div class="col-sm-4 mainbar">
            <br>
            <h4>TEMPLE TIMINGS</h4>
            <h5>
              Weekdays <br>
              Monday to Friday <br>
              09:00 A.M - 11:00 A.M <br>
              05:30 P.M - 08:30 P.M <br>
              <br>
              Weekend <br>
              Saturday & Sunday<br>
              09:00 A.M - 02:00 P.M<br> 
              03:00 P.M - 08:30 P.M <br>
            </h5>
          
        </div>
        <div class="col-sm-4">
          <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <!--li data-target="#bannerCarousel" 
                data-slide-to="0" class="active"></li>
              <li data-target="#bannerCarousel" data-slide-to="1"></li>
              <li data-target="#bannerCarousel" data-slide-to="2"></li-->
                <?php echo bannerSlideIndicators($connect, "banner") ?>
            </ol>
            <div class="carousel-inner" role="listbox">
              <!--div class="item active">
                <img src="img/temple.jpg" id="cicon">
                <div class="carousel-caption">
                </div> 
              </div> 
              <div class="item">
                <img src="img/priest.jpg" id="cicon">
              </div>
              <div class="item">
                  <img src="img/annual2019.jpg" id="cicon">
                </div-->
                <?php echo bannerSlides($connect, "banner") ?>
            </div>
            <!--- start slider controls-->
            <a class="left carousel-control" href="#myCarousel" role="button" 
              data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" 
                aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" 
              data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" 
                  aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div> <!-- End Slider-->
        </div>
        <div class="col-sm-4 mainbar">
        <br>
          <h4>TODAY'S SCHEDULE</h4>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                  $curevent = $row['curevent'];
                  echo "<h5>$curevent</h5>";
            };
            ?>
          <br>
          <h4>TOMORROW'S SCHEDULE</h4>
            <?php
            while ($row = mysqli_fetch_assoc($resultTom)) {
                  $curevent = $row['curevent'];
                  echo "<h5>$curevent</h5>";
            };
            ?>
        </div>
      </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Welcome to the Temple Experience !!!</h4>
        <p>Hindu Temple of Kentucky is a place where hundreds of people come 
          together for collective prayers. The Temple’s culture is one of 
          inclusiveness and celebrates festivals from all corners of India. 
          Weekly schedule includes: Rudra Abhishekam, Hanuman Chalisa, Lakshmi 
          ma puja, Ma Saraswati puja, monthly havan. </p>
        <p>Volunteers, the soul of the temple, run the temple from Prasad 
          committee to Finance committee and devotees are encouraged to get 
          involved and share their talents and time. </p>
        <p>As much as volunteers are needed, the temple is growing. Your 
          donations, small or large, are very much appreciated and put to good 
          use. So come to Hindu Temple of Kentucky and reacquaint yourself and 
          family with all things Hindu. The environment will make you feel like 
          home.</p>
      </div>
      <div class="col-md-6">
        <!--img src="img/om.png" class="img-responsive" id="cicon"-->
        <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <!--li data-target="#bannerCarousel" 
                data-slide-to="0" class="active"></li>
              <li data-target="#bannerCarousel" data-slide-to="1"></li>
              <li data-target="#bannerCarousel" data-slide-to="2"></li-->
                <?php echo bannerSlideIndicators($connect, "deities") ?>
            </ol>
            <div class="carousel-inner" role="listbox">
              <!--div class="item active">
                <img src="img/temple.jpg" id="cicon">
                <div class="carousel-caption">
                </div> 
              </div> 
              <div class="item">
                <img src="img/priest.jpg" id="cicon">
              </div>
              <div class="item">
                  <img src="img/annual2019.jpg" id="cicon">
                </div-->
                <?php echo bannerSlides($connect, "deities") ?>
            </div>
            <!--- start slider controls-->
            <a class="left carousel-control" href="#myCarousel" role="button" 
              data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" 
                aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" 
              data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" 
                  aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div> <!-- End Slider-->
      </div>
    </div>
  </div>
  <!--ICONS and Links-->
  <div class="contrainer text-center">
      <!--<h2>What We're Using</h2>-->
      <div class="row">
          <div class="col-sm-3 padClass">
            <img src="img/events.png" id="icon">
            <h5><a href="EventCalendar.php" class="mainlinks">
              Events Calendar</a></h5>
          </div>
          <div class="col-sm-3 padClass">
            <img src="img/priesticon.png" id="icon">
            <h5><a href="PriestCalendar.php" class="mainlinks">
              Priest Calendar</a></h5>
          </div>
          <div class="col-sm-3 padClass">
            <img src="img/facilityicon.png" id="icon">
            <h5><a href="FacilityCalendar.php" class="mainlinks">
              Facility Calendar</a></h5>
          </div>
          <div class="col-sm-3 padClass">
              <img src="img/360deg.png" id="icon">
              <h5><a href="VirtualTour.php" class="mainlinks">
                360 Virtual Tour</a></h5>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-3 padClass">
            <img src="img/sanatanamrit.png" id="icon">
            <h5><a href="TempleRituals.php" class="mainlinks">
              Temple Rituals</a></h5>
          </div>
          <div class="col-sm-3 padClass">
            <img src="img/gallary.png" id="icon">
            <h5><a href="#" class="inactivelinks">Cultural Galleria</a></h5>
          </div>
          <div class="col-sm-3 padClass">
              <img src="img/forms.png" id="icon">
              <h5><a href="#" class="inactivelinks">Forms</a></h5>
            </div>
          <div class="col-sm-3 padClass">
            <img src="img/articles.png" id="icon">
            <h5><a href="#" class="inactivelinks">Articles</a></h5>
          </div>
           
      </div>
      <div class="row">
          <div class="col-sm-3 padClass">
            <img src="img/donate.png" id="icon">
            <h5><a href="#" class="inactivelinks">Donate</a></h5>
          </div>
          <div class="col-sm-3 padClass">
            <img src="img/volunteering.png" id="icon">
            <h5><a href="#" class="inactivelinks">Volunteer Signup</a></h5>
          </div>
          <div class="col-sm-3 padClass">
            <img src="img/templeexpansion.png" id="icon">
            <h5><a href="TempleExpansion.php" class="mainlinks">
              Temple Expansion</a></h5>
          </div>
          <div class="col-sm-3 padClass">
            <img src="img/school.png" id="icon">
            <h5><a href="https://hskylou.org" class="mainlinks">
            Hindu School</a></h5>
          </div>
      </div>
    </div>
    <!--END ICONS and Links-->
  <div class="container  text-left">
    <div ckass="row">
      <h4><a href="#hidden" data-toggle="collapse" class="links">Care to learn 
        more about Hindu Temple of Kentucky? Click here <img src="img/info.png"  
        id="smlogo"></a></h4>
      <div id="hidden" class="collapse">
        <p>HTKY was founded in 1985 and was expanded and dedicated in 1999. It 
          is the passion and commitment of some early comers to Louisville and 
          their devotion and the untiring efforts over 30+ years, that has 
          helped us realize this dream Temple!
        <br>
        Our Temple is a like a blanket that allows for many heart-warming 
        experiences that are both uplifting and spiritual. It brings our 
        community TOGETHER and importantly helps us practice and live our 
        TRADITION and CULTURE. It enables us to relive those precious moments 
        and leave a legacy for FUTURE GENERATIONS to experience and cherish.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div ckass="row">
      <h4><a href="#newsletter" data-toggle="collapse" class="links">
        Subscribe to Newsletter? Click here <img src="img/email.png"  id="smlogo">
      </a></h4>
      <div id="newsletter" class="collapse">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
          <form action="post">
            <div id="newslettersubmsg"></div>
            <label>Name</label>  
            <input type="text" id="nameNL" name="nameNL" class="form-control" 
            required /> 
            <label>Email</label> 
            <input type="email" id="emailNL" name="emailNL" class="form-control" 
            required /> 
            <br>
            <button type="button" id="btn_subscribe" name="btn_subscribe"  
            class="btn btn-default btn_subscribe">Subscribe</button>
          </form>
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div ckass="row">
      <h4><a href="#messages" data-toggle="collapse" class="links">Want to contact 
        Temple Administrator? Click here <img src="img/requestform.png"  id="smlogo">
      </a></h4>
      <div id="messages" class="collapse">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
          <form action="post">
            <div id="adminmsg"></div>
            <label>Comments *</label>  
            <textarea id="commentsM" name="commentsM" rows="2" class="form-control" 
            required ></textarea> 
            <label>Your name (optional)</label> 
            <input type="text" id="nameM" name="nameM" class="form-control"  /> 
            <label>Your email (optional)</label> 
            <input type="email" id="emailM" name="emailM" class="form-control"  /> 
            <br>
            <button type="button" id="btn_messages" name="btn_messages"  
            class="btn btn-default btn_messages">Send</button>
          </form>
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>

    <?php require 'Footer.php'; ?>

  <script>

  $(document).on('click','.btn_subscribe',function(){
          var name =document.getElementById("nameNL").value;
          var email =document.getElementById("emailNL").value;
          //alert(email);
            $.ajax({
                url:"Newsletter.php",
                method:"POST",
                data:{name:name,email:email},
                dataType:"text",
                success:function(data){
                      $('#newslettersubmsg').html(data);  
                }

            });
      });

  $(document).on('click','.btn_messages',function(){
      var comments =document.getElementById("commentsM").value;
      var name =document.getElementById("nameM").value;
      var email =document.getElementById("emailM").value;
      if(comments == ''){
        alert('Please enter comments');
      }
      else{
      //alert(comments);
        $.ajax({
            url:"Messages.php",
            method:"POST",
            data:{comments:comments,name:name,email:email,act:"send"},
            dataType:"text",
            success:function(data){
                  $('#adminmsg').html(data);  
                  document.getElementById("commentsM").value="";
                  document.getElementById("nameM").value="";
                  document.getElementById("emailM").value="";
            }

        });
      }
    });
    </script>
  </body>
</html>