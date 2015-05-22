<head>
    <meta charset="utf-8">
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css" />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/get-shit-done.css" rel="stylesheet" />  

    <link href="bootstrap3/css/custom.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" /> 


    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

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
    $userid = $_SESSION["userid"];
    $name = $_SESSION["name"];
   $tablename = $_SESSION["tableid"];
    ?>
    <?php
    @mysql_connect("localhost","zp8461_user","User1234") or die(mysql_error ());
    @mysql_select_db("zp8461_cashsavior") or die (mysql_error());

    ?>
<a class="infoin_open btn btn-round btn-info" style="margin-top: 10px; margin-bottom:20px;" href="#infoin">See more</a>

<!-- infoin -->
<div id="infoin" class="well" style="min-width:44em; padding: 2% 2%; padding-top: 0%;">

    <center>
	<h4 style="width: relative; background-color:#4DD0E1; border-radius: 5px; padding: 5%;">investment examples</h4>
        <br>
    <?php    
        $query = mysql_query("SELECT type.typename, $tablename.amount, $tablename.date
                              FROM $tablename
                              JOIN type ON $tablename.typeid = type.typeid
                              AND $tablename.subid = type.subid
                              WHERE $tablename.typeid =3
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
    <button onclick="myFunction()" class="infoin_close btn btn-success btn-round btn-lg">Done !!</button>
	</center>
</div>


<script>
	$(document).ready(function () {
	$('#infoin').popup();
	});
	</script>


</body>