<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>facebook login</title>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Log in</button>
  
  <input type="button" onclick="logIn()" class="btn btn-primary" name="login with facebook" value="login with facebook">
</form>

<script>
var person={userId: "", username: "", accessToken: "", picture: "", email: ""};

function logIn()
{
	FB.login(function(response){
		if(response.status=="connected")
		{
			person.userId=response.authResponse.userID;
			person.accessToken=response.authResponse.accessToken;

			FB.api('/me?fields=name,email,picture.type(large)', function (userData){
				person.username = userData.name;
				person.email = userData.email;
				person.picture = userData.picture.data.url;

				$.post("index.php", {userId:person.userId, name:person.username, email:person.email, picture:person.picture});

				window.location="index.php";

			})
		}
	},{scope: 'public_profile, email'})
}


  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1804091813043434',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>

</body>
</html>