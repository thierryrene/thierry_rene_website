<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>tests with php</title>
    
    <link href="../bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script type="text/javascript">
        window.fbAsyncInit = function() {
            FB.init({
              appId      : '1000745883418567',
              cookie     : true,
              xfbml      : true,
              version    : 'v3.0'
            });
            FB.AppEvents.logPageView();   
        };
    </script>
</head>
<body>
    
<script>

    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }
    
    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div id=status></div>
    
    <div class="container" style="margin-top: 150px;">
        
            <div class="title text-center text-uppercase">
                <p>instagram graph api</p>
                <hr>
            </div>
            
            <div class="card">
                
                <fb:login-button 
                  scope="public_profile,email"
                  onlogin="checkLoginState();">
                </fb:login-button>
                
            </div>
        
        
    </div>
    
</body>
</html>