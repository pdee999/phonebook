<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>phonebook</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="favicon.ico">
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
      </div>


      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Add a New Contact</h4>

            <div class="error bg-danger"><span></span></div>

            <form action="" method="" class="addcontactform">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" required>
                    <p class="help-block">Enter phone number in the following format: 0000000000.</p>
                </div>

                <button type="submit" class="btn btn-default addbutton" name="Submit" id="Submit">Submit</button>
                <img src="images/loading.gif" class="loadingImage" />
            </form>
        </div>


          <div class="col-lg-6">
              <h4>Contacts</h4>
              <div id="pbResults">

                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-condensed tablesorter savedcontacts">
                          <thead>
                              <tr>
                                  <th class="nameCol">Name <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span></th>
                                  <th>Phone Number</th>
                                  <th>Delete</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              //include db configuration file
                              include_once("config.php");

                              // query database
                              $sql = "SELECT firstname, lastname, phone, pb_Id FROM `phonebook`.`contacts`";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                      // display query results
                                      echo '<tr><td>' . $row["lastname"]. ', ' . $row["firstname"]. '</td><td>' . $row["phone"]. '</td><td><form action="" method="" class="deletecontactform"><button type="submit" class="btn btn-default" name="Delete" id="Delete-'.$row["pb_Id"].'" class="deletebutton">Delete</button><img src="images/loading.gif" class="loadingImage loadingImage-'.$row["pb_Id"].'" /></form></td></tr>';
                                  }
                                  $result->free();
                              } else {
                                  echo "0 results";
                              }
                              $conn->close();

                              ?>
                          </tbody>
                      </table>
                  </div>




              </div>
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
        <script src="../bower_components/jquery-validate/dist/jquery.validate.js"></script>
        <script src="../bower_components/tablesorter/jquery.tablesorter.js"></script>
        <!-- endbuild -->

        <!-- build:js({app,.tmp}) scripts/main.js -->
        <script src="scripts/main.js"></script>
        <!-- endbuild -->
</body>
</html>
