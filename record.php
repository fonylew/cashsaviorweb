<head>
    <meta charset="utf-8">
    <title>jQuery Popup Overlay</title>

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
    <script>

</script>

</head>
<body>
    <form action="record.php" method="post">
    <?php
    @mysql_connect("localhost","zp8461_user","User1234") or die(mysql_error ());
    @mysql_select_db("zp8461_cashsavior") or die (mysql_error());

    ?>

    <?php
  if (isset($_POST['submit'])) {
    $example = $_POST['cost'];
    $example2 = $_POST['type1'];
    echo $example . " " . $example2;
  }
?>

<a class="recordin_open btn btn-round btn-default" href="#recordin">record</a>

<!-- recordin -->
<div id="recordin" class="well" style="max-width:44em; z-index: 100001;">

    <h4>Select activity you do !!</h4>
    
    
    Entertainment
    <br>
    <select id="type1">
    <?php 

    $sql = mysql_query("SELECT typename,subid FROM type WHERE typeid = 1 ");
    while ($row = mysql_fetch_array($sql)){
    echo "<option value= ".$row[1]."> " . $row[0] . "</option>";
    }
    
    ?>
    </select>
    <br>

    
    Saving
    <br>
    <select id = "type2">
    <?php
    $sql = mysql_query("SELECT typename,subid FROM type WHERE typeid = 2 ");
    while ($row = mysql_fetch_array($sql)){
    echo "<option  value= ".$row[1]."> " . $row[0] . "</option>";
    }
    ?>
    </select>
    
    <br>
    Investment
    <br>
    <select id= "type3">
    <?php
    $sql = mysql_query("SELECT typename,subid FROM type WHERE typeid = 3 ");
    while ($row = mysql_fetch_array($sql)){
    echo "<option value= ".$row[1]."> " . $row[0] . "</option>";
    }
    ?>

    </select>
    <br>
    <input type="text" id="cost">
    <br>
    
    <button onclick="myFunction()" class="recordin_close btn btn-default" type="submit">Done !!</button>
    </center>
</div>


<script>
    $(document).ready(function () {
    $('#recordin').popup();
    });
</script>


</body>