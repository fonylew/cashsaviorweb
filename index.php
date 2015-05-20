<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1,user-scalable=no" name="viewport" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="css/favicon.ico" rel="icon" />
    <link href="css/apple-touch-icon.png" rel="apple-touch-icon" />
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Cash Savior</title>
    <meta charset="UTF-8">

    <style>
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
          width: 70%;
          margin: auto;
      }
      #fleft{
        float: left;
        width: 26%;
        height: 200px;
        border: 3px solid black;
        margin: 30px solid lightgrey;
        padding: 30px;
      }
      #fleft2{
        float: left;
        width: 4%;
        height: 200px;
      }
      #fleft3{
        float: left;
        width: 5%;
        height: 200px;
      }
    </style>
</head>

<body>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="pic/Investment.jpg" alt="Chania">
            <div class="carousel-caption">
              <h3>Investment</h3>
              <p>Give an improvement to your income.</p>
            </div>
          </div>

          <div class="item">
            <img src="pic/saving.jpg" alt="Chania">
            <div class="carousel-caption">
              <h3>Saving</h3>
              <p>Always prepare for emergency pay.</p>
            </div>
          </div>

          <div class="item">
            <img src="pic/entertainment.jpg" alt="Flower">
            <div class="carousel-caption">
              <h3>Entertainment</h3>
              <p>Life is about happiness.</p>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class = "main">
        <div class  = "container tim-container">
          <div class="row">
            <div class="tim-title">
              <h1>Cash Savior</h1>
            </div>
            <div class="form-group">
          
             <input type="text" value="" placeholder="Username" class="form-control" />
             
             <input type="text" value="" placeholder="Password" class="form-control" />

             <button type="submit" class="btn btn-block btn-lg btn-info">submit</button> 
            </div>
          </div>
          
    <script>
        // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                fb_login();
            } else if (response.status === 'not_authorized') {
                // The person is logged into Facebook, but not your app.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
            } else {
                // The person is not logged into Facebook, so we're not sure if
                // they are logged into this app or not.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into Facebook.';

            }
        }

        // This function is called when someone finishes with the Login
        // Button.  See the onlogin handler attached to it in the sample
        // code below.
        function checkLoginState() {
            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });
        }

        window.fbAsyncInit = function () {
            FB.init({
                appId: '445214508974444',
                oauth: true,
                xfbml: true,
                version: 'v2.3'
            });

            // Now that we've initialized the JavaScript SDK, we call 
            // FB.getLoginStatus().  This function gets the state of the
            // person visiting this page and can return one of three states to
            // the callback you provide.  They can be:
            //
            // 1. Logged into your app ('connected')
            // 2. Logged into Facebook, but not your app ('not_authorized')
            // 3. Not logged into Facebook and can't tell if they are logged into
            //    your app or not.
            //
            // These three cases are handled in the callback function.

            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });

        };

        // Load the SDK asynchronously
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function fb_login() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function (response) {
                console.log('Successful login for: ' + response.name + ' ' + response.id);
                $.post("test.php", {
                    id: response.id
                });
                document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!' + response.id;
                window.top.location = "dashboard.php";
            });
        }
    </script>

    <!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

    <a href="#" onclick="checkLoginState();"><img class="displayed" src="img/facebook-login.png" border="0" alt="Log in with Facebook">
    </a>
    <div id="status">
    </div>
    <div class = "row ">
            <div class="content">
              <h1>content1</h1>
            </div>
          </div>
        </div>
      </div>

</body>

</html>