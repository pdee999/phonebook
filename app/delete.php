<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>phonebook</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css(.) styles/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" />
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css(.tmp) styles/main.css -->
    <link rel="stylesheet" href="styles/main.css">
    <!-- endbuild -->
    <!-- build:js scripts/vendor/modernizr.js -->
    <script src="../bower_components/modernizr/modernizr.js"></script>
    <!-- endbuild -->

  </head>
  <body>
    <!--[if lt IE 10]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <div class="container">
      <div class="header">
        <h3 class="text-muted">Phonebook</h3>
          <?php

          // server information
          $servername = "localhost";
          $username = "pdrittenhouse";
          $password = "password";
          $dbname = "phonebook";

          // create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // delete record
          $del = "DELETE FROM contacts WHERE [id=pb_ID] AND []";

          if ($conn->query($del) === TRUE) {
              echo "Record deleted successfully";
          } else {
              echo "Error deleting record: " . $conn->error;
          }

          $conn->close();
          ?>
      </div>


      <div class="row marketing">
        <div class="col-lg-6">
          <h4></h4>



        </div>


          <div class="col-lg-6">
              <h4>Success</h4>

              Your name is: <?php echo $_POST["firstName"]; ?> <?php echo $_POST["lastName"]; ?><br>
              Your phone number is: <?php echo $_POST["phoneNumber"]; ?>
          </div>


      </div>

      <div class="footer">
        <p><span class="glyphicon glyphicon-heart"></span> from the Yeoman team</p>
      </div>

    </div>


    <!-- build:js(.) scripts/vendor.js -->
    <!-- bower:js -->
    <script src="../bower_components/jquery/dist/jquery.js"></script>
    <!-- endbower -->
    <!-- endbuild -->

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

        <!-- build:js(.) scripts/plugins.js -->
        <script src="../bower_components/bootstrap/js/affix.js"></script>
        <script src="../bower_components/bootstrap/js/alert.js"></script>
        <script src="../bower_components/bootstrap/js/dropdown.js"></script>
        <script src="../bower_components/bootstrap/js/tooltip.js"></script>
        <script src="../bower_components/bootstrap/js/modal.js"></script>
        <script src="../bower_components/bootstrap/js/transition.js"></script>
        <script src="../bower_components/bootstrap/js/button.js"></script>
        <script src="../bower_components/bootstrap/js/popover.js"></script>
        <script src="../bower_components/bootstrap/js/carousel.js"></script>
        <script src="../bower_components/bootstrap/js/scrollspy.js"></script>
        <script src="../bower_components/bootstrap/js/collapse.js"></script>
        <script src="../bower_components/bootstrap/js/tab.js"></script>
        <!-- endbuild -->

        <!-- build:js({app,.tmp}) scripts/main.js -->
        <script src="scripts/main.js"></script>
        <!-- endbuild -->
</body>
</html>
