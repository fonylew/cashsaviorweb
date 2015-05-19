<head>
    <meta charset="utf-8">
    <title>jQuery Popup Overlay</title>

    <!-- Force latest IE, Google Chrome Frame for IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="description" content="jQuery plugin for responsive and accessible modal windows and tooltips." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


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
    @mysql_connect("localhost","zp8461_user","User1234") or die(mysql_error ());
    @mysql_select_db("zp8461_cashsavior") or die (mysql_error());

    ?>

<a class="infoen_open btn btn-round btn-default" href="#infoen">info</a>

<!-- infoen -->
<div id="infoen" class="well" style="max-width:44em;">

    <center>
    <h4>entertain example</h4>
    <br>
    <?php    
        $query = mysql_query("SELECT type.typename, u111111.amount, u111111.date
                              FROM u111111
                              JOIN type ON u111111.typeid = type.typeid
                              AND u111111.subid = type.subid
                              WHERE u111111.typeid =1
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
    <button onclick="myFunction()" class="infoen_close btn btn-default">Done !!</button>
    </center>
</div>

<p id="dothis"></p>

<script>
    $(document).ready(function () {
    $('#infoen').popup();
    });
    </script>
<script>
    function myFunction(){
        var x = document.getElementById("qwerqwer").value;
        alert(x);
        document.getElementById("dothis").innerHTML = x;
    }
</script>

</body>