<html lang="en">
    <meta charset="utf-8">
<?php
	echo "hello";
?>
 <form action="record.php" method="post">
    <?php
    @mysql_connect("localhost","zp8461_user","User1234") or die(mysql_error ());
    @mysql_select_db("zp8461_cashsavior") or die (mysql_error());

    ?>


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
    

    </center>
</div>
	<input type="submit" value ="done !!">

</html>