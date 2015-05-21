<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CashSavior:: Add Record</title>

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/bootstrap.listgroup/1.1.2/listgroup.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
    <form action="record.php" method="post">
        <?php @mysql_connect( "localhost", "zp8461_user", "User1234") or die(mysql_error ()); @mysql_select_db( "zp8461_cashsavior") or die (mysql_error()); ?>

        <h4>Select activity you do !!</h4>
        <center>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <select class="list-group" id="typesel">
                        <option value="entopt">Entertainment</option>
                        <option value="savopt">Saving</option>
                        <option value="invopt">Investment</option>
                        <option value="fixopt">Fixed Cost</option>
                        <option value="incopt">Income</option>
                    </select>
                    <p>Cost:</p>
                    <input type="text" id="cost">
                    <p>Note:</p>
                    <input type="text" id="note">
                    <input type="submit" class="btn-info" value="done !!">
                </div>
                <div class="col-md-1">
                    <h1> > </h1>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 subdiv">
                    <div id="entsel" style="display:none;">
                        <select class="list-group">
                            <?php $sql=mysql_query( "SELECT typename,subid FROM type WHERE typeid = 1 "); while ($row=mysql_fetch_array($sql)){ echo "<option value= ".$row[1]. "> " . $row[0] . "</option>"; } ?>
                        </select>
                    </div>
                    <div id="savsel" style="display:none;">
                        <select class="list-group">
                            <?php $sql=mysql_query( "SELECT typename,subid FROM type WHERE typeid = 2 "); while ($row=mysql_fetch_array($sql)){ echo "<option  value= ".$row[1]. "> " . $row[0] . "</option>"; } ?>
                        </select>
                    </div>
                    <div id="invsel" style="display:none;">
                        <select class="list-group">
                            <?php $sql=mysql_query( "SELECT typename,subid FROM type WHERE typeid = 3 "); while ($row=mysql_fetch_array($sql)){ echo "<option value= ".$row[1]. "> " . $row[0] . "</option>"; } ?>
                        </select>
                    </div>
                </div>
            </div>

        </center>
        <script>
//            $(document).ready(function(){ 
//                $("#typesel").change(function () {
//                    if ($("#entopt").is(":selected")) {
//                        $("#entsel").show();
//                        $("#savsel").hide();
//                        $("#invsel").hide();
//                    } else if ($("#savopt").is(":selected")) {
//                        $("#entsel").hide();
//                        $("#savsel").show();
//                        $("#invsel").hide();
//                    } else if ($("#invopt").is(":selected")) {
//                        $("#entsel").hide();
//                        $("#savsel").hide();
//                        $("#invsel").show();
//                    } else {
//                        $("#entsel").hide();
//                        $("#savsel").hide();
//                        $("#invsel").hide();
//                    }
//                }).trigger("change");
//            });
            $(document).ready(function () {
    $("select").change(function () {
        $("select option:selected").each(function () {
            if ($(this).attr("value") == "entopt") {
                $("#entsel").show();
                $("#savsel").show();
                $("#invsel").show();
            }
            if ($(this).attr("value") == "savopt") {
                        $("#entsel").hide();
                        $("#savsel").show();
                        $("#invsel").hide();
            }
            if ($(this).attr("value") == "invopt") {
                        $("#entsel").hide();
                        $("#savsel").hide();
                        $("#invsel").show();
            }
            else{
                        $("#entsel").hide();
                        $("#savsel").hide();
                        $("#invsel").hide();
            }
        });
    }).trigger("change");
});
        </script>
</body>

</html>