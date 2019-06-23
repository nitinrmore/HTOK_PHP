<?php 
/**
 * Head.php
 * Long description for file (if any)...
 * PHP version ?
 * LICENSE: 
 * 
 * @category   Head
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
<head>
  <title>Hindu Temple of Kentucky</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
        <?php  
        if ($currentPage == 'member' 
            || $currentPage == 'reservations' 
            || $currentPage == 'eventcalendar' 
            || $currentPage == 'facilitycalendar'
        ) {  
            ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
  
            <?php
        } else {  
            ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
            <?php
        }  
        ?>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
  

  <style>

    .navbar {
    margin: 0;
    border-radius: 0;
    background-image: linear-gradient(orange, maroon);
    color: #FFF;
    padding: 1% 0;
    font-size: 1.1em;
    border: 0;
    }
    .navbar-brand {
        float: left;
        min-height: 55px;
        padding: 0 15px 5px;
    }
    .navbar-inverse .navbar-nav .active a, 
    .navbar-inverse .navbar-nav .active a:focus,
    .navbar-inverse .navbar-nav .active a:hover {
        color: #FFF;
        opacity: 0.5;
        border-radius: 25%;
    }
    .navbar-inverse .navbar-nav li a {
        color: #D5D5D5;
    }
    .carousel-caption {
        top: 50%;
        transform: translateY(10%);
        text-transform: uppercase;
    }
    .btn {
        font-size: 18px;
        color: #FFF;
        padding: 12px 22px;
        background: maroon;
        border: 2px solid #FFF;
        border-radius: 20;
    }
    .container {
        margin: 4% auto;
    }
    .mainbar {
        margin: 0;
        border-radius: 20;
        background-color: maroon;
        color: #FFF;
        padding: 1% 0;
        font-size: 1.2em;
        height: 300px;
        }
    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px solid maroon;
        position: absolute;
    }
    section {
    float: left;
    width: 45%;
    }
    aside {
    float: right;
    width: 55%;
    }
    #logo {
        max-height: 55px;
        margin: 0 auto;
    }
    #icon {
        max-width: 100px;
        height: 100px;
        margin: 1% auto;
    }
    #cicon {
        width: 400px;
        height: 300px;
        margin: 0 auto;
    }
    #bannericon {
        width: 400px;
        height: 300px;
        margin: 0 auto;
    }
    #deitiesicon {
        width: 250px;
        height: 300px;
        margin: 0 auto;
    }
    #title {
        font-size: 1.7em;
        background: -webkit-linear-gradient(orange,maroon);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    #ico {
        width: 15px;
        height: 16px;
    }
    h4 {
        color: orange;
    }
    footer {
        width: 100%;
        background-color: maroon;
        padding: 1%;
        color: #FFF;
    }
    .fa {
        padding: 15px;
        font-size: 20px;
        color: #FFF;
    }
    .fa:hover {
        color: #D5D5D5;
        text-decoration: none;
    }
    .link {
        padding: 15px;
        color: #FFF;
    }
    .link:hover {
        color: #D5D5D5;
        text-decoration: none;
    }
    .links {
        color: orange;
        align-items: center;
    }
    .links:hover {
        color: #D5D5D5;
        text-decoration: none;
    }
    .mainlinks  {
        padding: 15px;
        font-size: 1.2em;
        color: orange;
        align-items: center;
    }
    .mainlinks:hover {
        color: #D5D5D5;
        text-decoration: none;
    }
    .inactivelinks {
        color: #D5D5D5;
        font-size: 1.2em;
        text-decoration: none;
    }
    .naming  {
        padding: 5px 25px;
        color: orange;
        align-items: center;
    }
    .padClass {
        padding: 1%;
    }
    h5 {
        font-size: 0.75em;
        text-decoration: none;
    }
    h6 {
        text-decoration: none;
    }
    p {
      text-align: justify;
    }
    .pageheading {
        color: orange;
    }
    .panel-primary {
        background-color: maroon;
    }
    textarea { 
        height: auto; 
    }
    .successmessage {
        color: green;
    }
    .errormessage {
        color: red;
    }
    .warningmessage {
        color: maroon;
    }
    .notification .badge {
        position: absolute;
        top: -1px;
        right: -1px;
        padding: 5px 10px;
        border-radius: 50%;
        color: white;
    }
    .btn_select {
        cursor: pointer;
    }
    @media (max-width: 900px) {
        .fa {
        font-size: 20px;
        padding: 10px;
        }
    }

    @media (max-width: 600px) {
        .carousel-caption {
        display: none;
        }
        #icon {
        max-width: 100px;
        }
        h4 {
        font-size: 1em;
        color: orange;
        }
        h5 {
        text-decoration: none;
        }
    }
  
  </style>
</head>
