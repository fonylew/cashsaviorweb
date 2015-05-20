<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CashSavior:: Add Record</title>

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/bootstrap.selectsplitter/0.1.0/bootstrap-selectsplitter.min.js"></script>
</head>

<body>
    <script>
        window.onload = function () {
            $('select[data-selectsplitter-selector]').selectsplitter();
        }
    </script>
    <?php echo "hello"; ?>
    <form action="record.php" method="post">
        <?php @mysql_connect( "localhost", "zp8461_user", "User1234") or die(mysql_error ()); @mysql_select_db( "zp8461_cashsavior") or die (mysql_error()); ?>


        <h4>Select activity you do !!</h4>

        <select data-selectsplitter-selector>
            <optgroup label="Entertainment" id="type1">
                <?php $sql=mysql_query( "SELECT typename,subid FROM type WHERE typeid = 1 "); while ($row=mysql_fetch_array($sql)){ echo "<option value= ".$row[1]. "> " . $row[0] . "</option>"; } ?>

            </optgroup>
            <optgroup label="Saving" id="type2">
                <?php $sql=mysql_query( "SELECT typename,subid FROM type WHERE typeid = 2 "); while ($row=mysql_fetch_array($sql)){ echo "<option  value= ".$row[1]. "> " . $row[0] . "</option>"; } ?>

            </optgroup>
            <optgroup label="Investment" id="type3">
                <?php $sql=mysql_query( "SELECT typename,subid FROM type WHERE typeid = 3 "); while ($row=mysql_fetch_array($sql)){ echo "<option value= ".$row[1]. "> " . $row[0] . "</option>"; } ?>

            </optgroup>
            <optgroup label="Fixed Cost" id="type4">

            </optgroup>
            <optgroup label="Income" id="type5">

            </optgroup>
        </select>


        <input type="text" id="cost">

        <input type="submit" value="done !!">
</body>

</html>