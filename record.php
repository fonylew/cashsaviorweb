<html>
<head>
    <title></title>
</head>
<body>
<form action='adding.php' method="post">
    <?php
  // Start the session
    session_start();
    ?>
    <?php
    // Set session variables
   $tablename = $_SESSION["tableid"];
    ?>
 <?php 
    
    $a1 = $_POST["field"];
    $a2 = $_POST["cost"]; 
    $date = $_POST["date"];
    $temp = explode(":", $a1);
    $note ="";
    $type = $temp[0];
    $subid = $temp[1];

    if($type =="Entertainment") $typeid = 1;
    if($type =="Saving") $typeid = 2;
    if($type =="Investment") $typeid = 3;
    if($type =="Fixed Cost") $typeid = 4;
    if($type =="Income") $typeid = 5;

    echo $type;
    echo " already add!! ";
    echo $date;

    header('refresh: 2; url=dashboard.php')
    ?>
    <?php
    @mysql_connect("localhost","zp8461_user","User1234") or die(mysql_error ());
    @mysql_select_db("zp8461_cashsavior") or die (mysql_error());

    ?>
    
    <?php
        $result = mysql_query("INSERT INTO $tablename VALUES('$typeid','$subid','$cost','$date','$note')");

    
    ?>


</body>
</html>

