<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CashSavior:: Add Record</title>

    <link href="bootstrap3/css/custom.css" rel="stylesheet" />
    <link href="assets/css/get-shit-done.css" rel="stylesheet" />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/bootstrap.selectsplitter/0.1.0/bootstrap-selectsplitter.min.js"></script>
    
    <!--datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
    <style>
        #whatever{
            font-size: 1.2rem;
            float: left;
            margin: 5px;
            margin-top: 0px;
        }
        #box{
            width: 50%;
            height: 50%;
            min-width: 400px;
            min-height: 300px;
            border:1px solid #F0F0F0;
            padding:5%;
            background-color: #00BCD4;
            background-color: rgba(0, 188, 212, 0.98);
            border-radius: 15px;
            text-align: center;
            margin-top: 100px;
            margin-left: auto;
            margin-right: auto;
            vertical-align: middle;
        }
        #poi1{
            margin: 5px;
        }
        #subbox{
            text-align: left;
            padding: 5% 50px;
            vertical-align: middle;
            background-color: #B2EBF2;
            background-color: rgba(178, 235, 242, 0.98);
            width: 350px;
            height: 200px;border-radius: 5px;
        }

    </style>
</head>

<body>
    <script>
        window.onload = function () {
            $('select[data-selectsplitter-selector]').selectsplitter();
        }
    </script>
    <form action="record.php" method="post" >
        <div class="container" id="box">
            <div class="row">
                <h3>Select activity you do !!</h3>
            </div>
            <div class="container" id="subbox">
                <div class="row">
                
                    <select name="field" required="true" id="whatever">
                        <optgroup label="Entertainment">

                            <option value="Entertainment:1">อาหารมื้อพิเศษ</option>
                            <option value="Entertainment:2">ขนมและเครื่องดิ่ม</option>
                            <option value="Entertainment:3">ชมภาพยนตร์</option>
                            <option value="Entertainment:5">สินค้าแบรนด์เนม</option>
                            <option value="Entertainment:6">ท่องเที่ยว</option>
                            <option value="Entertainment:7">ทำบุญ</option>
                            <option value="Entertainment:8">ของขวัญ</option>

                        </optgroup>
                        <optgroup label="Saving">
                           <option value="Saving:0">---select---</option> 
                            <option value="Saving:1">ฝากธนาคาร</option>
                            <option value="Saving:2">ซื้อสลากออมสิน</option>
                            <option value="Saving:2">ซื้อพันธบัตรรัฐบาล</option>

                        </optgroup>
                        <optgroup label="Investment">
                            <option value="Investment:0">---select---</option> 
                            <option value="Investment:1">เงินลงทุน</option>
                            <option value="Investment:2">ขยายกิจการ</option>
                            <option value="Investment:3">ซื้อหุ้น</option>

                        </optgroup>
                        <optgroup label="Fixed Cost">
                            <option value="Fixed Cost:0">---select---</option> 
                            <option value="Fixed Cost:1">รายจ่ายประจำ</option>
                            
                        </optgroup>
                        <optgroup label="Income">
                            <option value="Income:1">---select---</option> 
                            <option value="Income:2">รายได้</option>
                            
                        </optgroup>
                    </select>
                </div>
                
                <div class="row">

                    <p>Cost: <input type="text" name="cost"> baht</p>
                </div>
                <div class="row">
                    <p>Date: <input type="text" id="datepicker" name="date"></p>
                </div>
                <div class="row">
                    <input type="submit" value="done !!" class="btn btn-round btn-info">
                </div>
            </div>
        </div>
        
    </form>
</body>

</html>