<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CashSavior Dashboard</title>

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/get-shit-done.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Font Awesome     -->
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <!-- jQuery Popup Overlay -->
    <script src="jquery.popupoverlay.js"></script>

</head>

<body>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '445214508974444',
                xfbml      : true,
                version    : 'v2.3'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        
        function logout(){
              window.location.replace('index.html')
        }
</script>

    <?php @mysql_connect( "localhost", "zp8461_user", "User1234") or die(mysql_error ()); @mysql_select_db( "zp8461_cashsavior") or die (mysql_error()); ?>
    <?php if( $_GET[ "id"] ){ $userid=$_GET[ 'id']; echo "ID: ". $userid; } if( $_GET[ "name"] ){ $name=$_GET[ 'name']; echo "Welcome ". $name; } ?>
    <?php $selres=mysql_query( "SELECT * FROM users WHERE uid = '$userid'"); $num_rows=mysql_num_rows($selres); $tablename="U" . $userid; 
    if($num_rows !=0 ) { 
    //have user already 
    $sql_create_tb=mysql_query( "CREATE TABLE IF NOT EXISTS $tablename(typeid INT NOT NULL, subid INT NOT NULL, amount INT NOT NULL, date DATE NOT NULL, note VARCHAR(70) NOT NULL)"); 
    } else { 
    //new user 
    $sql_add=mysql_query( "INSERT INTO users VALUES('$userid')"); $sql_create_tb=mysql_query( "CREATE TABLE $tablename(typeid INT NOT NULL, subid INT NOT NULL, amount INT NOT NULL, date DATE NOT NULL, note VARCHAR(70) NOT NULL)"); }
    ?>
       <?php
  // Start the session
    session_start();
    ?>
    <?php
    // Set session variable
    $_SESSION["userid"] = $userid;
    $_SESSION["name"] = $name;
   $_SESSION["tableid"] = $tablename;
    ?>

    <div class="main">
        <div class="container-fluid">
            <div class="row" id="navbar">
                <div class="col col-xs-12">
                    <nav class="navbar navbar-ct-blue navbar-fixed-top">
                        <a class="navbar-brand" href="#">Cash Savior</a>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right" style="padding-right: 20px">
                                <li><a href="#"><?php echo $name ?></a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true" scope="public_profile,email" onlogin="logout();" style="margin-top: 20px; margin-right: 5px;"></div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
            <div class="sidebar" style="position:absolute;
                                        top:0; bottom:0; left:0;
                                        width:15%;
                                        background-color: #80DEEA;
    background-color: rgba(128, 222, 234, 0.98); padding-top: 70px;">
                <ul class="nav navbar-stacked">
                    <li><a href="http://outcube.me/cashsavior/adding.php">Add Transaction</a>
                    </li>
                </ul>
            </div>
            <div class="row" id="leftnav">
                <?php $query=mysql_query( "SELECT sum(amount) FROM $tablename WHERE typeid = 1 OR typeid =2 OR typeid =3 OR typeid = 4 ")or die( "Invalid query: ".mysql_error()); $data5=mysql_fetch_array($query); $sumuse=$data5[0]; ?>
                <?php $query=mysql_query( "SELECT sum(amount) FROM $tablename WHERE typeid =4 ")or die( "Invalid query: " .mysql_error()); $data6=mysql_fetch_array($query); $sumfix=$data6[0]; ?>
                <?php $query=mysql_query( "SELECT sum(amount) FROM $tablename WHERE typeid =5")or die( "Invalid query: " .mysql_error()); $data7=mysql_fetch_array($query); $salary=$data7[0]; $maxfill=( $salary - $sumfix)/4; ?>
                <div class="col col-lg-10 col-lg-offset-2 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 col-xs-offset-3">
                    <div class="container-fluid" style="padding-top:100px; padding-right:20px; left:200;">
                        <div class="row centered-form center-block">
                            <div class="col col-md-12">
                                <nav class="navbar navbar-ct-red">
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li>
                                                <a href="#">
                                                    <?php echo $userid." "."use all (include fixcost)". $sumuse . " /"; echo "fixcost ". $sumfix . " /"; echo "salary". $salary ; echo "maxfill". ($maxfill *4); ?>
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- edit money bar-->
                                        <ul class="nav navbar-nav navbar-right" style="padding-right: 20px">
                                            <a href="http://outcube.me/cashsavior/adding.php" class="btn btn-round btn-default">Add your payment!</a>
                                    </div>

                                    </ul>

                            </div>
                            </nav>
                        </div>
                        <div class="col col-lg-4">


                            <div class="row">
                                <canvas id="entCanvas" class="canvases" width="250" height="250"></canvas>
                            </div>
                            <h4>Entertainment</h4>

                            <pre class="prettyprint prettyprinted" style="min-width:250px; min-height: 200px; padding:5%;">
                                  
                              <?php    
                              $query = mysql_query("SELECT type.typename, $tablename.amount, $tablename.date
                              FROM $tablename
                              JOIN type ON $tablename.typeid = type.typeid
                              AND $tablename.subid = type.subid
                              WHERE $tablename.typeid =1
                              ORDER BY $tablename.date DESC LIMIT 2

                              ") or die("Invalid query: "  .mysql_error());
                              while($data=mysql_fetch_array($query)) {
                                  echo "<br>";
                                  echo $data[0]." ";
                                  echo $data[1]." baht ";
                                  echo $data[2]." ";
                                  
                                  echo "<br>";
                              }
                              ?>

                            <?php
                                    echo "<br>";
                                     $query =mysql_query("SELECT sum(amount) FROM $tablename WHERE typeid = 1")or die("Invalid query: "  .mysql_error());
                                     $data=mysql_fetch_array($query);
                                    echo "Total payment entertainment :". $data[0] ." baht<br>";
                            ?>
                            
                                    </pre>
                            <!-- infoentertain-->
                            <div id="entertain">

                            </div>



                        </div>
                        <div class="col col-lg-4">

                            <div class="row">
                                <canvas id="savCanvas" class="canvases" width="250" height="250"></canvas>

                            </div>
                            <h4>Saving</h4>
                            <pre class="prettyprint prettyprinted" style="min-width:250px; min-height: 200px; padding:5%;">
                                    <?php    
                                      $query = mysql_query("SELECT type.typename, $tablename.amount, $tablename.date
                                      FROM $tablename
                                      JOIN type ON $tablename.typeid = type.typeid
                                      AND $tablename.subid = type.subid
                                      WHERE $tablename.typeid =2
                                      ORDER BY $tablename.date DESC LIMIT 2

                                      ") or die("Invalid query: "  .mysql_error());
                                      while($data=mysql_fetch_array($query)) {
                                      echo "<br>";
                                      echo $data[0]." ";
                                      echo $data[1]." baht ";
                                      echo $data[2]." ";
                                      
                                      echo "<br>";
                                      }
                                      ?>
                                    <?php
                                    echo "<br>";
                                     $query =mysql_query("SELECT sum(amount) FROM $tablename WHERE typeid = 2")or die("Invalid query: "  .mysql_error());
                                     $data=mysql_fetch_array($query);
                                    echo "Total payment saving :". $data[0] ." baht<br>";
                                     ?>

                                        
                                    </pre>
                            <!-- infosaving-->
                            <div id="saving">


                            </div>
                        </div>
                        <div class="col col-lg-4">

                            <div class="row">
                                <canvas id="invCanvas" class="canvases" width="250" height="250"></canvas>

                            </div>
                            <h4>Investment</h4>
                            <pre class="prettyprint prettyprinted" style="min-width:250px; min-height: 200px; padding:5%;">
                                     <?php    
                                          $query = mysql_query("SELECT type.typename, $tablename.amount, $tablename.date
                                          FROM $tablename
                                          JOIN type ON $tablename.typeid = type.typeid
                                          AND $tablename.subid = type.subid
                                          WHERE $tablename.typeid =3
                                          ORDER BY $tablename.date DESC LIMIT 2

                                          ") or die("Invalid query: "  .mysql_error());
                                          while($data=mysql_fetch_array($query)) {
                                          echo "<br>";
                                          echo $data[0]." ";
                                          echo $data[1]." baht ";
                                          echo $data[2]." ";
                                          
                                          echo "<br>";
                                          }
                                          ?>
                                          <?php
                                          echo "<br>";
                                            $query =mysql_query("SELECT sum(amount) FROM $tablename WHERE typeid = 3")or die("Invalid query: "  .mysql_error());
                                            $data=mysql_fetch_array($query);
                                            echo "Total payment investment :". $data[0]." baht<br>";
                                          ?>
                                    </pre>
                            <!-- infoinvest-->

                            <div id="invest">
                            </div>

                            </ul>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php $query=mysql_query( "SELECT sum(amount) FROM $tablename WHERE typeid = 1")or die( "Invalid query: ".mysql_error()); $data2=mysql_fetch_array($query); $ent=$data2[0]; $entper=$ent / $maxfill *100; ?>
    <?php $query=mysql_query( "SELECT sum(amount) FROM $tablename WHERE typeid = 2")or die( "Invalid query: ".mysql_error()); $data3=mysql_fetch_array($query); $sav=$data3[0]; $savper=$sav / $maxfill *100; ?>
    <?php $query=mysql_query( "SELECT sum(amount) FROM $tablename WHERE typeid = 3")or die( "Invalid query: ".mysql_error()); $data4=mysql_fetch_array($query); $inv=$data4[0]; $invper=$inv / ( $maxfill*2 ) *100; ?>

    <div class="footer2" style="margin-top: 20px;
    background-color: #00BCD4;
    background-color: rgba(0, 188, 212, 0.98);
    background-attachment: fixed;
    position: relative;">
        <div class="overlayer">
            <div class="container">
                <div class="row">
                    <div class="credits" style="border-top: 1px solid #BBBBBB;
    margin-top: 85px;
    padding: 20px 0 15px;
    text-align: center;
    color: #EEE;">
                        Outcube.me
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hidden div for displaying mask -->
    <div style="display:none;">
        <img id="entMask" src="img/mask_entertainment.png" width="250" height="250">
        <img id="savMask" src="img/mask_saving.png" width="250" height="250">
        <img id="invMask" src="img/mask_invest.png" width="250" height="250">
    </div>
    <script>
        //percentage value from korn
        var percent_ent=<?php echo $entper ?>;
        var percent_sav=<?php echo $savper ?>;
        var percent_inv=<?php echo $invper ?>;

        function fillent(percent) {
            var ent = document.getElementById("entCanvas");
            var ectx = ent.getContext("2d");
            ectx.beginPath();
            ectx.rect(0, 250 - (percent * 2.5), 250, 1000);
            if (percent > 100) ectx.fillStyle = '#ff0000';
            else ectx.fillStyle = '#00bcd4';
            ectx.fill();
            var emask = document.getElementById("entMask");
            ectx.drawImage(emask, 0, 0);
            return;
        }

        function fillsav(percent) {
            var sav = document.getElementById("savCanvas");
            var sctx = sav.getContext("2d");
            sctx.beginPath();
            sctx.rect(0, 250 - (percent * 2.5), 250, 1000);
            if (percent > 100) sctx.fillStyle = '#ff0000';
            else sctx.fillStyle = '#00bcd4';
            sctx.fill();
            var smask = document.getElementById("savMask");
            sctx.drawImage(smask, 0, 0);
            return;
        }

        function fillinv(percent) {
            var inv = document.getElementById("invCanvas");
            var ictx = inv.getContext("2d");
            ictx.beginPath();
            ictx.rect(0, 250 - (percent * 2.5), 250, 1000);
            if (percent > 100) ictx.fillStyle = '#ff0000';
            else ictx.fillStyle = '#00bcd4';
            ictx.fill();
            var imask = document.getElementById("invMask");
            ictx.drawImage(imask, 0, 0);
            return;
        }
        window.onload = function () {
            var ent = document.getElementById("entCanvas");
            var ectx = ent.getContext("2d");
            var sav = document.getElementById("savCanvas");
            var sctx = sav.getContext("2d");
            var inv = document.getElementById("invCanvas");
            var ictx = inv.getContext("2d");
            //-------- back -------------------
            ectx.beginPath();
            ectx.rect(0, 0, 250, 250);
            ectx.fillStyle = '#dddddd';
            ectx.fill();

            sctx.beginPath();
            sctx.rect(0, 0, 250, 250);
            sctx.fillStyle = '#dddddd';
            sctx.fill();

            ictx.beginPath();
            ictx.rect(0, 0, 250, 250);
            ictx.fillStyle = '#dddddd';
            ictx.fill();
            //----------------------------------
            fillent(percent_ent);
            fillsav(percent_sav);
            fillinv(percent_inv);
        }
    </script>
</body>

<script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/js/gsdk-checkbox.js"></script>
<script src="assets/js/gsdk-radio.js"></script>
<script src="assets/js/gsdk-bootstrapswitch.js"></script>
<script src="assets/js/get-shit-done.js"></script>

<script>
    $(function () {
//        $.post("infosaving.php", {
//                        id: <?php echo $userid ?>
//                    });
        $("#saving").load("infosaving.php");
    });
</script>
<script>
    $(function () {
        $("#invest").load("infoinvest.php");
    });
</script>
<script>
    $(function () {
        $("#entertain").load("infoentertain.php");
    });
</script>

<script>
    $(function () {
        $("#record").load("record.php");
    });
</script>
<script src="assets/js/custom.js"></script>
</html>