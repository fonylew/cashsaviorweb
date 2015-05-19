<head>
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css" />

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

    <!-- jQuery Popup Overlay -->
    <script src="jquery.popupoverlay.js"></script>


</head>
<body>
<button class="edit_open btn btn-round btn-default" href="#edit">Edit</button>

<!-- edit -->
<div id="edit" class="well" style="max-width:44em;">

	<h4>edit example</h4>
    <p>Add your payment !</p>
	 <img src="mm.jpg"  style="width:200px;">
	<br>
	<br>
	TEXT <input type="text" id="qwerqwer" size="20">
	
	<br><br>
    
    <button onclick="myFunction()" class="edit_close btn btn-default">Done !!</button>

</div>

<p id="dothis"></p>

<script>
	$(document).ready(function () {
	$('#edit').popup();
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