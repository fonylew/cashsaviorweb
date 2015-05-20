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
    <?php @mysql_connect( "localhost", "zp8461_user", "User1234") or die(mysql_error ()); @mysql_select_db( "zp8461_cashsavior") or die (mysql_error()); ?>
    <div class="main">
        <div class="container-fluid">
            <div class="row" id="navbar">
                <div class="col col-xs-12">
                    <nav class="navbar navbar-ct-blue navbar-fixed-top">
                        <a class="navbar-brand" href="#">Brand</a>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#">test1</a>
                                </li>
                                <li><a href="#">test2</a>
                                </li>
                                <li><a href="#">test3</a>
                                </li>
                                <li><a href="#">test4</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="padding-right: 20px">
                                <li><a href="#">Username</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <button href="#" class="btn btn-round btn-default">LogOut</button>
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
    background-color: rgba(128, 222, 234, 0.98); padding-top: 69px;">
                <ul class="nav navbar-stacked">
                    <li><a href="#">test1</a>
                    </li>
                    <li><a href="#">test2</a>
                    </li>
                    <li><a href="#">test3</a>
                    </li>
                    <li><a href="#">test4</a>
                    </li>
                </ul>
            </div>
            <div class="row" id="leftnav">

                <div class="col col-lg-10 col-lg-offset-2 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 col-xs-offset-3">
                    <div class="container-fluid" style="padding-top:100px; padding-right:20px; left:200;">
                        <div class="row centered-form center-block">
                            <div class="col col-md-12">
                                <nav class="navbar navbar-ct-red">
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li><a href="#">used/Left</a>
                                            </li>
                                        </ul>

                                        <!-- edit money bar-->
                                        <ul class="nav navbar-nav navbar-right" style="padding-right: 20px">
                                            <div id="editbutton">
                                                <button href="#" class="btn btn-round btn-default">Edit</button>
                                            </div>

                                        </ul>

                                    </div>
                                </nav>
                            </div>
                            <div class="col col-md-4">
                                <div class="container">

                                    <div class="row">
                                        <canvas id="entCanvas" class="canvases" width="250" height="250"></canvas>
                                    </div>
                                    <h4>Saving</h4>
                                    <pre class="prettyprint prettyprinted" style="width: 25%;">

                                        
                                    </pre>
                                    <!-- infosaving-->
                                    <div id="saving">

                                    </div>


                                </div>
                            </div>
                            <div class="col col-md-4">
                                <div class="container">
                                    <div class="row">
                                        <canvas id="savCanvas" class="canvases" width="250" height="250"></canvas>

                                    </div>
                                    <h4>Investment</h4>
                                    <pre class="prettyprint prettyprinted" style="width: 25%;">
                                        <ul>
                                        
                                            <li><a>list1</a></li>
                                            <li><a>list2</a></li>
                                            <li><a>list3</a></li>
                                            <li><a>list4</a></li>
                                            <li><a>list5</a></li>
                                            <li><a>list6</a></li>
                                            <li><a>list7</a></li>
                                            <li><a>list8</a></li>
                                             
                                        </ul>
                                    </pre>
                                    <!-- infoinvest-->

                                    <div id="invest">
                                    </div>




                                </div>
                            </div>
                            <div class="col col-md-4">
                                <div class="container">
                                    <div class="row">
                                        <canvas id="invCanvas" class="canvases" width="250" height="250"></canvas>

                                    </div>
                                    <h4>Entertainment</h4>
                                    <a href="http://outcube.me/cashsavior/adding.php">add more record !!</a>
                                    <pre class="prettyprint prettyprinted" style="width: 25%;">
                                  
                              <?php    
                              $query = mysql_query("SELECT type.typename, u111111.amount, u111111.date
                              FROM u111111
                              JOIN type ON u111111.typeid = type.typeid
                              AND u111111.subid = type.subid
                              WHERE u111111.typeid =1
                              ORDER BY u111111.date DESC LIMIT 2

                              ") or die("Invalid query: "  .mysql_error());
                              while($data=mysql_fetch_array($query)) {
                              echo "<br>";
                              echo $data[0]." ";
                              echo $data[1]." ";
                              echo $data[2]." ";
                              
                              echo "<br>";
                              }
                              ?>
                            
                                    </pre>
                                    <!-- infoentertain-->
                                    <div id="entertain">


                                    </div>

                                    </ul>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer2">
        <div class="overlayer">
            <div class="container">
                <div class="row">
                    <div class="credits">
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
        var percent_ent=50;
        var percent_sav=70;
        var percent_inv=90;
        function fillent(percent){
            var ent=document.getElementById("entCanvas");
            var ectx=ent.getContext("2d");
            ectx.beginPath();
            ectx.rect(0, 250-(percent*2.5), 250, 1000);
            if(percent>100) ectx.fillStyle = '#ff0000';
            else ectx.fillStyle = '#00bcd4';
            ectx.fill();
            var emask=document.getElementById("entMask");
            ectx.drawImage(emask,0,0);
            return;
        }
        
        function fillsav(percent){
            var sav=document.getElementById("savCanvas");
            var sctx=sav.getContext("2d");
            sctx.beginPath();
            sctx.rect(0, 250-(percent*2.5), 250, 1000);
            if(percent>100) sctx.fillStyle = '#ff0000';
            else sctx.fillStyle = '#00bcd4';
            sctx.fill();
            var smask=document.getElementById("savMask");
            sctx.drawImage(smask,0,0);
            return;
        }
        
        function fillinv(percent){
            var inv=document.getElementById("invCanvas");
            var ictx=inv.getContext("2d");
            ictx.beginPath();
            ictx.rect(0, 250-(percent*2.5), 250, 1000);
            if(percent>100) ictx.fillStyle = '#ff0000';
            else ictx.fillStyle = '#00bcd4';
            ictx.fill();
            var imask=document.getElementById("invMask");
            ictx.drawImage(imask,0,0);
            return;
        }
        window.onload = function() {
            var ent=document.getElementById("entCanvas");
            var ectx=ent.getContext("2d");
            var sav=document.getElementById("savCanvas");
            var sctx=sav.getContext("2d");
            var inv=document.getElementById("invCanvas");
            var ictx=inv.getContext("2d");
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
        $("#editbutton").load("edit.php");
    });
</script>
<script>
    $(function () {
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