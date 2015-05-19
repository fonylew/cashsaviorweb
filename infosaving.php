<head>
    <meta charset="utf-8">
    <title>jQuery Popup Overlay</title>

    <!-- Force latest IE, Google Chrome Frame for IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="description" content="jQuery plugin for responsive and accessible modal windows and tooltips." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css" />

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
<body><center>
        <?php
    @mysql_connect("localhost","zp8461_user","User1234") or die(mysql_error ());
    @mysql_select_db("zp8461_cashsavior") or die (mysql_error());

    ?>
<a class="infosav_open btn btn-round btn-default" href="#infosav">info</a>

<!-- infosav -->
<div id="infosav" class="well" style="max-width:44em;">

    <center>
    <h4>saving example</h4>
    <?php    
        $query = mysql_query("SELECT uid FROM users") or die("Invalid query: "  .mysql_error());
    while($data=mysql_fetch_array($query)) {
        $typename = "name" . $data[0];
            echo $typename;
    
        }
    ?>
    <button onclick="myFunction()" class="infosav_close btn btn-default">Done !!</button>
    </center>
</div>

<p id="dothis"></p>

<script>
    $(document).ready(function () {
    $('#infosav').popup();
    });
    </script>
<script>
    function myFunction(){
        var x = document.getElementById("qwerqwer").value;
        alert(x);
        document.getElementById("dothis").innerHTML = x;
    }
</script>
</center>
</body>