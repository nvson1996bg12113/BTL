var api;


window.fbAsyncInit = function() {
    FB.init({
      appId      : '977977132406449',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
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

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };

  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {

    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    /*
      json response
        {
          status: 'connected',
          authResponse: {
              accessToken: '...',
              expiresIn:'...',
              reauthorize_required_in:'...'
              signedRequest:'...',
              userID:'...'
          }
    */
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      $("#btn_login").hide();
      api = response;
      console.log(api);
      main();
      testAPI();
      checkAPI();
    } 
    else if(response.status === 'not_authorized')
    {
    	console.log("ban chua dang nhap ung dung");
    }
    else {
    	console.log("nguoi dung chua dang nhap facebook");
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  // Load the SDK asynchronously

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=977977132406449&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      $("#user_name").show().html(response.name);
      console.log('Successful login for: ' + response.name);
    });
  }
  function RequestLoginFB() {
    var scope = ["public_profile","email,user_likes", "ads_management","user_birthday","user_posts","user_photos","user_location","manage_pages","publish_pages","user_tagged_places"];
    window.location = 'http://graph.facebook.com/oauth/authorize?client_id=977977132406449&scope='+scope.toString()+'&redirect_uri=http://localhost/demo/public/admin/shop/facebook&response_type=token';
  }
  function checkAPI()
  {
  	FB.api('/me/permissions',function(response){
  		console.log(JSON.stringify(response));
  	});
  }

  //main

    function main(){
      $("#submit").click(function(){
          $("#access_token").val(api['authResponse']['accessToken']);
          alert("OK");
      });
    }