<head>
    <meta charset="utf-8">
    <title>jQuery Popup Overlay</title>

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css" />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/get-shit-done.css" rel="stylesheet" />  
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    
    <link href="bootstrap3/css/custom.css" rel="stylesheet" />



    <!-- jQuery Popup Overlay -->
    <script src="jquery.popupoverlay.js"></script>

    <!-- Custom styles for the demo page -->
    <style>
    img {
        max-width: 100%;
    }
    .well {
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        display:none;
        margin:1em;
    }

    </style>

</head>
<body>
         <?php
  // Start the session
    session_start();
    ?>
    <?php
    // Set session variables
   $_SESSION["tableid"] = $tablename;
    ?>
    <?php
        @mysql_connect("localhost","zp8461_user","User1234") or die(mysql_error ());
        @mysql_select_db("zp8461_cashsavior") or die (mysql_error());
    ?>
<a class="infosav_open btn btn-round btn-info" style="margin-top: 10px; margin-bottom:20px;" href="#infosav">See more</a>

<!-- infosav -->
<div id="infosav" class="well" style="min-width:44em; padding: 2% 2%; padding-top: 0%;">

    <center>
    <h4 style="width: relative; background-color:#4DD0E1; border-radius: 5px; padding: 5%;">saving example</h4>
    <br>
    <?php    
        $query = mysql_query("SELECT type.typename, $tablename.amount, $tablename.date
                              FROM $tablename
                              JOIN type ON $tablename.typeid = type.typeid
                              AND $tablename.subid = type.subid
                              WHERE $tablename.typeid =2
                                ") or die("Invalid query: "  .mysql_error());
        while($data=mysql_fetch_array($query)) {
                              echo "<br>";
                              echo $data[0]." ";
                              echo $data[1]." ";
                              echo $data[2]." ";
                              
                              echo "<br>";
                              }
    ?>
    <br>
    <button onclick="myFunction()" class="infosav_close btn btn-round btn-success btn-lg">Done !!</button>
    </center>
</div>



<script>
    $(document).ready(function () {
    $('#infosav').popup();
    });
    </script>


</body>